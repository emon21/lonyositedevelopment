<?php

namespace App\Http\Controllers\admin;

use App\Models\Clarifi;
use App\Models\Financial;
use App\Models\Usability;
use App\Helpers\FileUpload;
use Illuminate\Http\Request;
use App\Helpers\ToasterNotification;
use App\Http\Controllers\Controller;


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

    public function Financial()
    {
        $financial = Financial::with('tabs')->first();
        return view('backend.financial', compact('financial'));
    }

    public function UpdateFinancial(Request $request)
    {
        $financial = Financial::find($request->id);

        $financial->{$request->field} = $request->value;
        $financial->save();

        return response()->json(['message' => 'Updated successfully']);
    }


     # clarifis
    public function GetUsability(){
        $usability = Usability::find(1);
        return view('backend/usability/get_usability',compact('usability'));
    }
    
    public function UpdateUsability(Request $request,$id){
        $usability = Usability::find($id);

        $usability->title = $request->title;
        $usability->description = $request->description;
        $usability->youtube = $request->youtube;
        $usability->link = $request->link;

        # Image Upload using By Helper Function
        if ($request->hasFile('FileUpload')) {

            // old image delete
            FileUpload::deleteImage('uploads/usability/' . $usability->image);
            // update image
            $usability->image = FileUpload::uploadImage($request->file('FileUpload'), 'usability');
        }

        $usability->save();

        # notification helper function
        $notification = ToasterNotification::Toaster('Usability Updated Successfully....', 'success', 'Updated Usability');
        return redirect()->route('admin.get.usability')->with($notification);
    }

}
