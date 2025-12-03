<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Team;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{
    //

    public function index(){}

    public function about(){
        return view('frontend/about');
    }

    public function Team(){
        $teams = Team::latest()->get();
        return view('frontend/team/index',compact('teams'));

    } 
    public function SingleTeam(Team $team){
        
        return view('frontend/team/single-team',compact('team'));

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
