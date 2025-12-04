<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Team;
use App\Models\About;
use App\Models\Review;
use App\Helpers\FileUpload;
use Illuminate\Http\Request;
use App\Helpers\ToasterNotification;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{
    //

    public function index(){}

    public function about(){
        return view('frontend/about');
    }
    public function GetAboutUs(){

        $about = About::first();
        return view('backend/about/get_about',compact('about'));
    }
    
    public function UpdateAbout(Request $request, About $about){


        $about->title = $request->title;
        $about->description = $request->description;

        # Image Upload using By Helper Function
    
        if ($request->hasFile('photo')) {

            // old image delete
            FileUpload::deleteImage('uploads/about/' . $about->photo);
            // upload new image
            $about->photo = FileUpload::uploadImage($request->file('photo'), 'about');
        }

        $about->save();

        # notification helper function
        $notification = ToasterNotification::Toaster('About Updated Successfully','success','Update');

        return redirect()->route('admin.get.about')->with($notification);
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
