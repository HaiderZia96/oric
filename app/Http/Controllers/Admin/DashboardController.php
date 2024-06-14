<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Link;
use App\Models\LinkType;
use App\Models\SuccessStory;


class DashboardController extends Controller
{
    public function index(){
        $LinkType= LinkType::get();
        $SuccessStory= SuccessStory::get();
        $link_counts = Link::where("link_type_id", 1)->count();
        $download_counts = Link::where("link_type_id", 2)->count();
        $success_counts = SuccessStory::count();
        // dd($link_counts);
        return view('admin.dashboard', compact('link_counts','download_counts','success_counts'));
    }
}
