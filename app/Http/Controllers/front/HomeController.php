<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
       return view('front.index');
    }
    public function industry(){
        return view('front.industry_linkages');
    }
    public function academics(){
        return view('front.academic_linkages');
    }
    public function links(){
        return view('front.important_links');
    }
    public function structure(){
        return view('front.management_structure');
    }
    public function contact(){
        return view('front.contact_us');
    }
    public function resource(){
        return view('front.resource');
    }
    public function success(){
        return view('front.success_story');
    }
    public function journal(){
        return view('front.journals');
    }

    public function activity(){
        return view('front.activities');
    }

    public function newsLetter(){
        return view('front.news_letters');
    }
}
