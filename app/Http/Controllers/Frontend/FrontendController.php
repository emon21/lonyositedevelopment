<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    //

    public function index(){}

    public function about(){
        return view('frontend/about');
    }

    public function team(){
        return view('frontend/team/index');

    }

    public function service(){
        return view('frontend/service/index');

    }

    public function portfolio(){
        return view('frontend/portfolio/index');

    }


    public function blog(){
        return view('frontend/blog/index');

    }

    public function career(){
        return view('frontend/career/index');
    }

    public function contact(){
        return view('frontend/contact');

    }


    
}
