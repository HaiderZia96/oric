<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Service\TufHttp;
use Illuminate\Support\Facades\Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use URL;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\File;

class NewsEventController extends Controller
{

    function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:news-event-list', ['only' => ['index']]);
        $this->middleware('permission:news-event-create', ['only' => ['create','store']]);
        $this->middleware('permission:news-event-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:news-event-softdelete', ['only' => ['destroy']]);
        $this->middleware('permission:news-event-restore', ['only' => ['restore']]);
        $this->middleware('permission:news-event-delete', ['only' => ['delete']]);
    }

    public function getRecordsForIndex()
    {
        $uri = 'news-events';
        $type = 'GET';
        $options = '';
        $tufHttp = new TufHttp();
        $url = $tufHttp->baseUrl . $uri;
        $data = $tufHttp->tufRequest($url, $type, $options);

        // Convert stdClass objects to associative arrays
        $dataArray = json_decode(json_encode($data), true);
        // If the API returns data in a different format, you may need to format it accordingly before passing it to the view.
        return $dataArray;
    }

    public function index()
    {
        return view('admin.news.index');

    }

    public function getIndex(Request $request){

        $baseUrl = Config::get('services.tuf.tuf_api')."news-events/";
        /**
         * For Live Url Use 5 --- For Local Url Use 7
         */
        $slashNo =  5;
        $requestUrl = URL::full();
        $last = explode("/", $requestUrl, $slashNo+1);
        $sender = Config::get('services.tuf.sender');
        $finalUrl = $baseUrl.$last[$slashNo].'&sender_type='.$sender;
        $type = 'GET';
        $options = '';
        $tufHttp = new TufHttp();
        $this->tufAccessToken = $tufHttp->getTufAccessToken();
        $client = new \GuzzleHttp\Client();
        $res = $client->get($finalUrl, ['headers' =>  [
                        'Accept' => 'application/json',
                        'Authorization' => 'Bearer '.$this->tufAccessToken]
                    ]);
        $contents = $res->getBody();
        $result = json_decode($contents, true);
        return $result['data'];

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = $this->dataAccessibility();
        $dataArr = array(
            'page_title' => 'Add New',
            'title'=>'Add New',
            'indexRoute' => route('news-event.index'),
            'data'=>$data,
            'method' => 'POST',
            'action' => route('news-event.store'),
            'enctype' => 'multipart/form-data', // (Default)Without attachment
            //'enctype' => 'application/x-www-form-urlencoded', // With attachment like file or images in form
        );
        return view('admin.news.create')->with($dataArr);
    }

    public function dataAccessibility(){
        $type = 'GET';
        $options = '';
        $data = [
            'categories' => $this->main('news-categories',$type,$options),
            'societies' => $this->main('news-societies',$type,$options),
            'projects' => $this->main('news-projects',$type,$options),
            'departments' => $this->main('news-departments',$type,$options),
            'faculties' => $this->main('news-faculties',$type,$options),
            'tags' => $this->main('news-tags',$type,$options),
        ];
        return $data;
    }

    public function main($uri,$type,$options){
        $tufHttp = new TufHttp();
        $url = $tufHttp->baseUrl.$uri;
        $data = $tufHttp->tufRequest($url,$type,$options);
        return $data;
    }

    public function upload(Request $request){
        $url = 'news-file-upload';
        $type = 'POST';
        $options=[];
        if($request->hasFile('upload')) {
            $image = $request->file('upload');
            $originName = $image->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $image->getClientOriginalExtension();
            $fileName = $fileName.'.'.$extension;
            $options = [
                'multipart' => [
                    [
                        'name' => 'upload',
                        'contents' => fopen($image->getRealPath(), 'r'),
                        'filename' => $fileName,
                    ],
                    [
                        'name' => 'CKEditorFuncNum',
                        'contents' => $request->get('CKEditorFuncNum'),
                    ]
                ]
            ];
        }
        $tufHttp = new TufHttp();
        $url = $tufHttp->baseUrl.$url;
        $data = $tufHttp->tufRequest($url,$type,$options);
        return $data;
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $url = 'news-events';
        $type = 'POST';

        $filename='';
        if($request->hasFile('thumbnail')) {
            $image = $request->file('thumbnail');
            $filename=$request->thumbnail->getClientOriginalName();
            $thumbnail = fopen($image->getRealPath(), 'r');
        }
        else{
            $thumbnail='';
        }

        if($request->hasFile('cover_image')) {
            $image = $request->file('cover_image');
            $filename=$request->cover_image->getClientOriginalName();
            $cover = fopen($image->getRealPath(), 'r');
        }
        else{
            $cover='';
        }

        $tag=[];
        $getTags = $request->get('tag');
        if(isset($request->tag)){
            foreach($getTags as $getTag){
                $selectedTagsArr[] = $getTag;
            }
            $tagsArr = implode(',', $selectedTagsArr);
            $tag = $tagsArr;
        }
        $options = [
            'multipart' => [
                [
                    'name' => 'news_categories_id',
                    'contents' => $request->get('news_categories_id')
                ],
                [
                    'name' => 'societies_id',
                    'contents' => $request->get('societies_id')
                ],
                [
                    'name' => 'project_id',
                    'contents' => $request->get('project_id')
                ],
                [
                    'name' => 'department_id',
                    'contents' => $request->get('department_id')
                ],
                [
                    'name' => 'dept_faculties_id',
                    'contents' => $request->get('dept_faculties_id')
                ],
                [
                    'name' => 'name',
                    'contents' => $request->get('name')
                ],
                [
                    'name' => 'event_date',
                    'contents' => $request->get('event_date')
                ],
                [
                    'name' => 'thumbnail',
                    'contents' => $thumbnail,
                    'filename' =>$filename
                ],
                [
                    'name' => 'cover_image',
                    'contents' => $cover,
                    'filename' =>$filename
                ],
                [
                    'name' => 'sdgs_category',
                    'contents' => $request->get('sdgs_category')
                ],
                [
                    'name' => 'tag[]',
                    'contents' => $tag
                ],
                [
                    'name' => 'short_description',
                    'contents' => $request->get('short_description')
                ],
                [
                    'name' => 'description',
                    'contents' => $request->get('description')
                ],
                [
                    'name' => 'sender_type',
                    'contents' => Config::get('services.tuf.sender')
                ],
            ]];


        $tufHttp = new TufHttp();
        $url = $tufHttp->baseUrl.$url;
        $data = $tufHttp->tufRequest($url,$type,$options);

        return response()->json(['data' => $data]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = $this->dataAccessibility();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
{
    $data = $this->dataAccessibility();
    $newsEvent = $this->main("news-events/{$id}", 'GET', '');

    $dataArr = array(
        'page_title' => 'Edit News Event',
        'title' => 'Edit News Event',
        'indexRoute' => route('news-event.index'),
        'data' => $data,
        'method' => 'POST',
        'action' => route('news-event.update', $id),
        'enctype' => 'multipart/form-data',
        'newsEvent' => $newsEvent,
    );

    $selectedtags = explode(',', $newsEvent->tag);

    return view('admin.news.edit',compact('selectedtags'))->with($dataArr);
}

public function update(Request $request, $id)
{
    $url = 'news-events/' . $id;
    $type = 'POST'; // Use PUT method for updating the record

    $filename1='';
    $filename2='';

    if($request->hasFile('thumbnail')) {
        $image = $request->file('thumbnail');
        $filename1=$request->thumbnail->getClientOriginalName();
        $thumbnail = fopen($image->getRealPath(), 'r');
    }

    if($request->hasFile('cover_image')) {
        $image1 = $request->file('cover_image');
        $filename2=$request->cover_image->getClientOriginalName();
        $cover = fopen($image1->getRealPath(), 'r');
    }


    $tag = [];
    $getTags = $request->get('tag');
    if (isset($request->tag)) {
        foreach ($getTags as $getTag) {
            $selectedTagsArr[] = $getTag;
        }
        $tagsArr = implode(',', $selectedTagsArr);
        $tag = $tagsArr;
    }

    $options = [
        'multipart' => [
            [
                'name' => 'news_categories_id',
                'contents' => $request->get('news_categories_id')
            ],
            [
                'name' => 'societies_id',
                'contents' => $request->get('societies_id')
            ],
            [
                'name' => 'project_id',
                'contents' => $request->get('project_id')
            ],
            [
                'name' => 'department_id',
                'contents' => $request->get('department_id')
            ],
            [
                'name' => 'dept_faculties_id',
                'contents' => $request->get('dept_faculties_id')
            ],
            [
                'name' => 'name',
                'contents' => $request->get('name')
            ],
            [
                'name' => 'event_date',
                'contents' => $request->get('event_date')
            ],
            [
                'name' => 'sdgs_category',
                'contents' => $request->get('sdgs_category')
            ],
            [
                'name' => 'tag[]',
                'contents' => $tag
            ],
            [
                'name' => 'short_description',
                'contents' => $request->get('short_description')
            ],
            [
                'name' => 'description',
                'contents' => $request->get('description')
            ],
            [
                'name' => 'sender_type',
                'contents' => Config::get('services.tuf.sender')
            ],
        ]
    ];



    if(isset($thumbnail)){
        $old_thumbnail= [
            'name' => 'thumbnail',
            'contents' => (isset($thumbnail) ? $thumbnail:''),
            'filename' => (isset($filename1) ? $filename1:''),
        ];
        array_push($options['multipart'],$old_thumbnail);
        // dd($old_thumbnail);
    }


    if(isset($cover)){
        $old_cover=   [
            'name' => 'cover_image',
            'contents' => (isset($cover) ? $cover:''),
            'filename' => (isset($filename2) ? $filename2:''),
        ];
        array_push($options['multipart'],$old_cover);
        // dd($old_cover);
    }


    $tufHttp = new TufHttp();
    $url = $tufHttp->baseUrl . $url;
    $data = $tufHttp->tufRequest($url, $type, $options);

    return response()->json(['data' => $data]);
}

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy($id)
    // {
    //     $url = 'news-events/' . $id;
    //     $type = 'DELETE'; // Use PUT method for updating the record
    //     $options='';

    //     $newsEvent = $this->main("news-events/{$id}", 'GET', '');
    //     $dataArr = array(
    //         'page_title' => 'Delete News Event',
    //         'title' => 'Delete News Event',
    //         'indexRoute' => route('news-event.index'),
    //         // 'data' => $data,
    //         'method' => 'DELETE',
    //         'action' => route('news-event.destroy', $id),
    //         'enctype' => 'multipart/form-data',
    //         'newsEvent' => $newsEvent,
    //     );

    //     $tufHttp = new TufHttp();
    //     $url = $tufHttp->baseUrl . $url;
    //     $data = $tufHttp->tufRequest($url, $type, $options);

    //     return response()->json(['data' => $data]);
    // }

    public function destroy($id)
    {
        $newsEvent = $this->main("news-events/{$id}", 'DELETE', '');
        if($newsEvent != ""){
            return redirect()->route('news-event.index')
            ->with('message','Record Destroyed successfully');
        }else{
            return redirect()->route('news-event.index')
            ->with('message','There is something wrong please try again!');
        }
    }
        /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        $newsEvent = $this->main("news-events-restore/{$id}", 'GET', '');

        if($newsEvent->deleted_at == null){
            return redirect()->route('news-event.index')
            ->with('message','Record Restored successfully');
        }else{
            return redirect()->route('news-event.index')
            ->with('message','There is something wrong please try again!');
        }
    }

    public function delete($id)
    {
        $getRecordAgainst = $this->main("news-events/{$id}", 'GET', '');

        $thumbnail = $getRecordAgainst->thumbnail;

        $imagePathInFirstApp = "Main/frontend/images/NewsAndEvents/thumbnail/{$thumbnail}";

        if (File::exists($imagePathInFirstApp)) {
            File::delete($imagePathInFirstApp);
        }


        $cover = $getRecordAgainst->cover_image;
        $coverImageInOtherApplication = "Main/frontend/images/NewsAndEvents/coverImages/{$cover}";

        if (File::exists($coverImageInOtherApplication)) {
            File::delete($coverImageInOtherApplication);
        }

        $options = [
            'multipart' => [
                [
                    'name' => 'thumbnail',
                    'contents' => $thumbnail,
                ],
                [
                    'name' => 'cover_image',
                    'contents' => $cover
                ],
            ],
        ];

        $newsEvent = $this->main("news-events-delete/{$id}", 'DELETE', $options);

        if($newsEvent != ""){
            return redirect()->route('news-event.index')
            ->with('message','Record deleted successfully');
        }else{
            return redirect()->route('news-event.index')
            ->with('message','There is something wrong please try again!');
        }
    }
}
