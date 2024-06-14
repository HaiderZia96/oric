<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SuccessStory;
use Illuminate\Support\Str;
use Auth;
use DB;
use Illuminate\Support\Facades\File;


class SuccessStoryController extends Controller
{
    function __construct()
    {     
        $this->middleware('auth');
        $this->middleware('permission:success_story-list');
        $this->middleware('permission:success_story-create', ['only' => ['create','store']]);
        $this->middleware('permission:success_story-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:success_story-softdelete', ['only' => ['destroy']]);
        $this->middleware('permission:success_story-restore', ['only' => ['restore']]);
        $this->middleware('permission:success_story-delete', ['only' => ['delete']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.success_story.index');
    }

    public function getSuccessStories(Request $request)
    {
        $draw = $request->get('draw');
        $start = $request->get("start");
        $rowperpage = $request->get("length"); // Rows display per page

        $columnIndex_arr = $request->get('order');
        $columnName_arr = $request->get('columns');
        $order_arr = $request->get('order');
        $search_arr = $request->get('search');

        $columnIndex = $columnIndex_arr[0]['column']; // Column index
        $columnName = $columnName_arr[$columnIndex]['data']; // Column name
        $columnSortOrder = $order_arr[0]['dir']; // asc or desc
        $searchValue = $search_arr['value']; // Search value

        // Total records
        $totalRecords = SuccessStory::withTrashed()->select('count(*) as allcount')
            ->Where('success_stories.name', 'like', '%' .$searchValue . '%')
            ->Where('success_stories.designation', 'like', '%' .$searchValue . '%')
            ->orderBy('id', 'DESC')
            ->count();

        $totalRecordswithFilter = SuccessStory::withTrashed()
            ->select('count(*) as allcount')
            ->withTrashed()
            ->Where('success_stories.name', 'like', '%' .$searchValue . '%')
            ->Where('success_stories.designation', 'like', '%' .$searchValue . '%')
            ->orderBy('id', 'DESC')
            ->count();
        // Fetch records
        $records = SuccessStory::orderBy($columnName,$columnSortOrder)
            ->withTrashed()
            ->Where('success_stories.name', 'like', '%' .$searchValue . '%')
            ->Where('success_stories.designation', 'like', '%' .$searchValue . '%')
            ->select('success_stories.*')
            ->orderBy('id', 'DESC')
            ->skip($start)
            ->take($rowperpage)
            ->get();

        $data_arr = array();

        foreach($records as $record){
            $id = $record->id;
            $name = $record->name;
            $designation = $record->designation;
            $description = $record->description;
            $image = $record->image;
            $deleted_at = $record->deleted_at;
            if($record->deleted_at == Null){
                $deleted_at = '0';
            }
            if($record->deleted_at != Null){
                $deleted_at = '1';
            }

            $data_arr[] = array(
                "id" => $id,
                "name" => $name,
                "description" => $description,
                "designation" => $designation,
                "image" => $image,
                "deleted_at" => $deleted_at,
            );
        }

        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordswithFilter,
            "aaData" => $data_arr
        );

        echo json_encode($response);
        exit;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = SuccessStory::orderBy('id', 'DESC')->withTrashed()->get();
        return view('admin.success_story.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'designation' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $input = $request->all();
        if ($request->hasFile('image')) {
            $input['image'] = base64_decode($input['image']);
            $input['image'] = date('Y').'/'.time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('/front/img/Success_Story/').date('Y'), $input['image']);
            $input['image'] = $input['image'];
          }

        $success_story = SuccessStory::create($input);
        return redirect()->route('success_story.index')->with('message','Success Story Added successfully');

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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $success_story = SuccessStory::find($id);
        return view('admin.success_story.edit',compact('success_story'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $success_story = SuccessStory::find($id);
        $input = $request->all();
       
        $this->validate($request, [
            'name' => 'required',
            'designation' => 'required',
            'image' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',  
        ]);

        if ($request->hasFile('image')) {
            if(isset($input) && $input['image']){
                $preshowsImage = public_path('/front/img/Success_Story/'.$request->image);
                if (File::exists($preshowsImage)) { // unlink or remove previous image from folder
                    File::delete($preshowsImage);
                }
            }  
            $input['image'] = date('Y').'/'.time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('/front/img/Success_Story/').date('Y'), $input['image']);
            $image = $input['image'];
        }
        else
        {
            $input['image'] = $input['old_image'];
        }
       
        if( $success_story->update($input)){
            // dd($request->all());
            return redirect()->route('success_story.index')
            ->with('message','SuccessStory updated successfully');
            }else{
            return redirect('success_story.index')->with('message','There is something wrong Please try again.');
        }
       
    }
    public function delete(SuccessStory $success_story,$id){
        // dd('123');
        $success_story = SuccessStory::where('id', $id)->forceDelete();
        if(isset($success_story)){
            return redirect()->back()->with('message','Congratulations,Record Deleted Permanently Successfully!');
        }
        else {
            return redirect(route('success_story.create'))
                ->with('message','There is something wrong Please try again.'); 
        }
    }

    public function restore($id){   
        $restoreSuccessStory =SuccessStory::onlyTrashed()->find($id);
        if ($restoreSuccessStory->restore()) {
            return redirect()->back()->with('message','Record Restored successfully!');
        }else {
            return redirect()->back()->with('message','There is something wrong please try again!');
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        SuccessStory::find($id)->delete();
        return redirect()->route('success_story.index')
            ->with('message','Success Story deleted successfully');
    }
}
