<?php

namespace App\Http\Controllers\Admin;

use App\Models\Team;
use App\Helpers\FileUpload;
use Illuminate\Http\Request;
use App\Helpers\ToasterNotification;
use App\Http\Controllers\Controller;


class TeamController extends Controller
{
    //


    public function index(){
        $teams = Team::latest()->get();
        return view('backend/team/index',compact('teams'));
    }

    public function create(){
        return view('backend/team/create');
    }

    public function store(Request $request,Team $team){

        # upload Image

        // Handle Photo Upload
        // $url = null;
        // if ($request->hasFile('photo')) {
        //     $file = $request->file('photo');
        //     $filename = time() . '.' . $file->getClientOriginalExtension();
        //     $url = $file->move('uploads/recipes/', $filename);
        // }

        $team->name = $request->name;
        $team->position = $request->position;
        $team->description = $request->message;
            
        # Image Upload using By Helper Function
    
        if ($request->hasFile('FileUpload')) {
            $path = FileUpload::uploadImage($request->file('FileUpload'), 'team');
            $team->photo = $path;
        }

        $team->save();

        # notification helper function
        $notification = ToasterNotification::Toaster('Team Created Successfully....','success','Success');

        return redirect()->route('admin.team')->with($notification);
    }

    public function show(Team $team){}

    public function edit(Team $team){
        return view('backend/team/edit',compact('team'));
    }

    public function update(Request $request,Team $team){

        $team->name = $request->name;
        $team->position = $request->position;
        $team->description = $request->message;

        # Image Upload using By Helper Function
    
        if ($request->hasFile('FileUpload')) {

            // old image delete
            FileUpload::deleteImage('uploads/team/' . $team->photo);
            // upload new image
            $team->photo = FileUpload::uploadImage($request->file('FileUpload'), 'team');
        }

        $team->save();

        # notification helper function
        $notification = ToasterNotification::Toaster('Team Updated Successfully','success','Update');

        return redirect()->route('admin.team')->with($notification);

    }

    public function destroy(Team $team){

        $team->delete();

        // Image Delete using Helper Function
        // FileUpload::deleteImage($team->photo);
        // old image delete
        
        FileUpload::deleteImage('uploads/team/' . $team->photo);
        
        # notification helper function
        $notification = ToasterNotification::Toaster('Team Deleted Successfully', 'error', 'Deleted');

        return redirect()->route('admin.team')->with($notification);
      
    }


}
