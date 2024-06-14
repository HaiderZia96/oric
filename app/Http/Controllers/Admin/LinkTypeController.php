<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LinkType;
use Illuminate\Support\Str;
use Auth;
use DB;

class LinkTypeController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:link_type-list', ['only' => ['index']]);
        $this->middleware('permission:link_type-create', ['only' => ['create','store']]);
        $this->middleware('permission:link_type-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:link_type-softdelete', ['only' => ['destroy']]);
        $this->middleware('permission:link_type-restore', ['only' => ['restore']]);
        $this->middleware('permission:link_type-delete', ['only' => ['delete']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.link_type.index');
    }

    public function getLinkTypes(Request $request)
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
        $totalRecords = LinkType::withTrashed()->select('count(*) as allcount')
            ->Where('link_types.name', 'like', '%' .$searchValue . '%')
            ->orderBy('id', 'DESC')
            ->count();

        $totalRecordswithFilter = LinkType::withTrashed()
            ->select('count(*) as allcount')
            ->withTrashed()
            ->Where('link_types.name', 'like', '%' .$searchValue . '%')
            ->orderBy('id', 'DESC')
            ->count();
        // Fetch records
        $records = LinkType::orderBy($columnName,$columnSortOrder)
            ->withTrashed()
            ->Where('link_types.name', 'like', '%' .$searchValue . '%')
            ->select('link_types.*')
            ->orderBy('id', 'DESC')
            ->skip($start)
            ->take($rowperpage)
            ->get();

        $data_arr = array();

        foreach($records as $record){
            $id = $record->id;
            $name = $record->name;
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
        $data = LinkType::orderBy('id', 'DESC')->withTrashed()->get();
        return view('admin.link_type.create', compact('data'));
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
        ]);
        $input = $request->all();

        $link_type = LinkType::create($input);
        return redirect()->route('link_type.index')->with('message','Link Type Added successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $link_type = LinkType::find($id);
        return view('admin.link_type.edit',compact('link_type'));
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
            'name' => 'required',
        ]);
        $input = $request->all();
    
        $link_type = LinkType::find($id);
        $link_type->update($input);
        return redirect()->route('link_type.index')
            ->with('message','LinkType updated successfully');
    }

    public function delete(LinkType $link_type,$id){
        // dd('123');
        $link_type = LinkType::where('id', $id)->forceDelete();
        if(isset($link_type)){
            return redirect()->back()->with('message','Congratulations,Record Deleted Permanently Successfully!');
        }
        else {
            return redirect(route('link_type.create'))
                ->with('message','There is something wrong Please try again.'); 
        }
    }

    public function restore($id){   
        $restoreLinkType =LinkType::onlyTrashed()->find($id);
        if ($restoreLinkType->restore()) {
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
        LinkType::find($id)->delete();
        return redirect()->route('link_type.index')
            ->with('success','Link Type deleted successfully');
    }
}
