<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Service\TufHttp;
use Illuminate\Support\Facades\Config;
use Illuminate\Http\Request;
use URL;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\File;

class ResearchPublicationController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:research-publication-list', ['only' => ['index']]);
        $this->middleware('permission:research-publication-create', ['only' => ['create','store']]);
        $this->middleware('permission:research-publication-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:research-publication-softdelete', ['only' => ['destroy']]);
        $this->middleware('permission:research-publication-restore', ['only' => ['restore']]);
        $this->middleware('permission:research-publication-delete', ['only' => ['delete']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.research_publications.index');
    }

    public function getResearchIndex(Request $request){
        $baseUrl = Config::get('services.tuf.tuf_api')."research-publications/";
        /**
         * For Live Url Use 5 --- For Local Url Use 7
         */
        $slashNo =  5;
        $requestUrl = URL::full();
        $last = explode("/", $requestUrl, $slashNo+1);
        $sender = Config::get('services.tuf.sender');
//        $finalUrl = $baseUrl.$last[$slashNo].'&sender_type='.$sender;
        $finalUrl = $baseUrl.$last[$slashNo];
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
            'indexRoute' => route('research-publication.index'),
            'data'=>$data,
            'method' => 'POST',
            'action' => route('research-publication.store'),
            'enctype' => 'multipart/form-data',
        );

        return view('admin.research_publications.create')->with($dataArr);
    }

    public function dataAccessibility(){
        $type = 'GET';
        $options = '';
        $data = [
            'fac_pub_types' => $this->main('research-publications-types',$type,$options),
        ];
        return $data;
    }

    public function main($uri,$type,$options){
        $tufHttp = new TufHttp();
        $url = $tufHttp->baseUrl.$uri;
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
        $url = 'research-publications';
        $type = 'POST';
        $options = [
            'multipart' => [
                [
                    'name' => 'author',
                    'contents' => $request->get('author')
                ],
                [
                    'name' => 'name',
                    'contents' => $request->get('name')
                ],
                [
                    'name' => 'title',
                    'contents' => $request->get('title')
                ],
                [
                    'name' => 'volume_no',
                    'contents' => $request->get('volume_no')
                ],
                [
                    'name' => 'fac_pub_type_id',
                    'contents' => $request->get('fac_pub_type_id')
                ],
                [
                    'name' => 'sdgs_category',
                    'contents' => $request->get('sdgs_category')
                ],
                [
                    'name' => 'DOI',
                    'contents' => $request->get('DOI')
                ],
                [
                    'name' => 'impact_factor',
                    'contents' => $request->get('impact_factor')
                ],
                [
                    'name' => 'scopus_index',
                    'contents' => $request->get('scopus_index')
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
        //
    }

    public function edit($id)
    {
        $data = $this->dataAccessibility();
        $previousResearchRecord = $this->main("research-publications/{$id}", 'GET', '');
        $dataArr = array(
            'page_title' => 'Edit Research & Publications',
            'title' => 'Edit News Event',
            'indexRoute' => route('research-publication.index'),
            'data' => $data,
            'method' => 'POST',
            'action' => route('research-publication.update', $id),
            'enctype' => 'multipart/form-data',
            'previousResearchRecord' => $previousResearchRecord,
        );

        return view('admin.research_publications.edit')->with($dataArr);
    }

    public function update(Request $request, $id)
    {
        $url = 'research-publications/' . $id;
        $type = 'POST';

        $options = [
            'multipart' => [
                [
                    'name' => 'author',
                    'contents' => $request->get('author')
                ],
                [
                    'name' => 'name',
                    'contents' => $request->get('name')
                ],
                [
                    'name' => 'title',
                    'contents' => $request->get('title')
                ],
                [
                    'name' => 'volume_no',
                    'contents' => $request->get('volume_no')
                ],
                [
                    'name' => 'fac_pub_type_id',
                    'contents' => $request->get('fac_pub_type_id')
                ],
                [
                    'name' => 'sdgs_category',
                    'contents' => $request->get('sdgs_category')
                ],
                [
                    'name' => 'DOI',
                    'contents' => $request->get('DOI')
                ],
                [
                    'name' => 'impact_factor',
                    'contents' => $request->get('impact_factor')
                ],
                [
                    'name' => 'scopus_index',
                    'contents' => $request->get('scopus_index')
                ],
                [
                    'name' => 'sender_type',
                    'contents' => Config::get('services.tuf.sender')
                ],
            ],
        ];

        $tufHttp = new TufHttp();
        $url = $tufHttp->baseUrl . $url;
        $data = $tufHttp->tufRequest($url, $type, $options);

        return response()->json(['data' => $data]);
    }

    public function destroy($id)
    {
        $url = 'research-publications/' . $id;
        $type = 'DELETE';
        $options='';

        $destroyPublication = $this->main($url, $type, $options);
        if($destroyPublication != "" && $destroyPublication != null){
            return redirect()->route('research-publication.index')
            ->with('message','Record Destroyed successfully');
        }else{
            return redirect()->route('research-publication.index')
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
        $url = 'research-publications-restore/' . $id;
        $type = 'GET';
        $options='';

        $restorePublication = $this->main($url, $type, $options);
        if($restorePublication == null){
            return redirect()->route('research-publication.index')
            ->with('message','Record Restored successfully');
        }else{
            return redirect()->route('research-publication.index')
            ->with('message','There is something wrong please try again!');
        }
    }

    public function delete($id) {
        $url = 'research-publications-delete/' . $id;
        $type = 'DELETE';
        $options='';

        $publications = $this->main($url, $type, $options);

        if($publications != "" && $publications != null){
            return redirect()->route('research-publication.index')
            ->with('message','Record deleted successfully');
        }else{
            return redirect()->route('research-publication.index')
            ->with('message','There is something wrong please try again!');
        }
    }
}
