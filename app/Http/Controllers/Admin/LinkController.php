<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LinkType;
use App\Models\Link;
use Illuminate\Support\Str;
use Auth;
use DB;

class LinkController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:link-list', ['only' => ['index']]);
        $this->middleware('permission:link-create', ['only' => ['create','store']]);
        $this->middleware('permission:link-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:link-softdelete', ['only' => ['destroy']]);
        $this->middleware('permission:link-restore', ['only' => ['restore']]);
        $this->middleware('permission:link-delete', ['only' => ['delete']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd('123');
        $LinkType= LinkType::get();
        return view('admin.link.index', compact('LinkType'));
    }
    public function getLinks(Request $request)
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

        $totalRecords = Link::with('linkTypeID')
        ->select('count(*) as allcount')
        ->withTrashed()
        ->leftJoin('link_types','link_types.id','=','links.created_by')
        ->where(function($q) use($searchValue){ 
            $q->where('links.url', 'like', '%' .$searchValue . '%')
            ->orWhere('links.name', 'like', '%' .$searchValue . '%')
            ->orWhere('link_types.name', 'like', '%' .$searchValue . '%');
        })
        ->orderBy('id', 'DESC')
        ->count();

            // ->Where('links.url', 'like', '%' .$searchValue . '%')
            // ->orderBy('id', 'DESC')
            // ->count();

        $totalRecordswithFilter = Link::with('linkTypeID')
            ->select('count(*) as allcount')
            ->withTrashed()
            ->leftJoin('link_types','link_types.id','=','links.created_by')
            ->where(function($q) use($searchValue){ 
                $q->where('links.url', 'like', '%' .$searchValue . '%')
                ->orWhere('links.name', 'like', '%' .$searchValue . '%')
                ->orWhere('link_types.name', 'like', '%' .$searchValue . '%');
            })
            ->orderBy('id', 'DESC')
            ->count();

            // ->Where('links.url', 'like', '%' .$searchValue . '%')
            // ->orderBy('id', 'DESC')
            // ->count();
        // Fetch records
        $records = Link::with('linkTypeID')
        // ::orderBy($columnName,$columnSortOrder)
            ->withTrashed()
            ->leftJoin('link_types','link_types.id','=','links.created_by')
            // ->Where('links.url', 'like', '%' .$searchValue . '%')
            ->where(function($q) use($searchValue){ 
                $q->where('links.url', 'like', '%' .$searchValue . '%')
                ->orWhere('links.name', 'like', '%' .$searchValue . '%')
                ->orWhere('link_types.name', 'like', '%' .$searchValue . '%');
            })
            ->select('links.*')
            ->orderBy('id', 'DESC')
            ->skip($start)
            ->take($rowperpage)
            ->get();
// dd($records);
        $data_arr = array();

        foreach($records as $record){
            $id = $record->id;
            $name = $record->name;
            $url = $record->url;
            $link_type = $record->linkTypeID->name;
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
                "url" => $url,
                "link_type" => $link_type,
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
        $LinkType= LinkType::get();
        $data = Link::orderBy('id', 'DESC')->withTrashed()->get();
        return view('admin.link.create', compact('LinkType','data'));
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
            'url' => 'required',
            'link_type_id' => 'required',
        ]);
        $input = $request->all();

        $link = Link::create($input);
        return redirect()->route('link.index')->with('message','Link Added successfully');

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
        $LinkType= LinkType::get();
        $link = Link::find($id);
        return view('admin.link.edit',compact('LinkType','link'));
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
        $this->validate($request, [
            'url' => 'required',
            'link_type_id' => 'required',
        ]);
        $input = $request->all();
    
        $link = Link::find($id);
        $link->update($input);
        return redirect()->route('link.index')
            ->with('message','Link updated successfully');
    }
    public function delete(Link $link,$id){
        // dd('123');
        $link = Link::where('id', $id)->forceDelete();
        if(isset($link)){
            return redirect()->back()->with('message','Congratulations,Record Deleted Permanently Successfully!');
        }
        else {
            return redirect(route('link.create'))
                ->with('message','There is something wrong Please try again.'); 
        }
    }

    public function restore($id){   
        $restoreLink =Link::onlyTrashed()->find($id);
        if ($restoreLink->restore()) {
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
        Link::find($id)->delete();
        return redirect()->route('link.index')
            ->with('success','Link deleted successfully');
    }
}
