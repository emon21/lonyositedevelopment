<?php

namespace App\Http\Controllers\admin;

use App\Models\Clarifi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\ToasterNotification;
use App\Helpers\FileUpload;


class HomeController extends Controller
{
    
    # clarifis
    public function Getclarifis(){
        $clarifi = Clarifi::find(1);
        return view('backend/clarifi/get_clarifi',compact('clarifi'));
    }
    
    public function UpdateClarifi(Request $request,$id){
        $clarifi = Clarifi::find($id);

        $clarifi->title = $request->title;
        $clarifi->description = $request->description;

        # Image Upload using By Helper Function
        if ($request->hasFile('FileUpload')) {

            // old image delete
            FileUpload::deleteImage('uploads/clarifi/' . $clarifi->image);
            // update image
            $clarifi->image = FileUpload::uploadImage($request->file('FileUpload'), 'clarifi');
        }

        $clarifi->save();

        # notification helper function
        $notification = ToasterNotification::Toaster('Clarifi Updated Successfully....', 'success', 'Updated Clarifi');
        return redirect()->route('admin.clarifi.index')->with($notification);

    }

}
