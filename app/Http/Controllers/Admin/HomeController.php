<?php

namespace App\Http\Controllers\admin;

use App\Models\Answer;
use App\Models\Clarifi;
use App\Models\Financial;
use App\Models\Usability;
use App\Helpers\FileUpload;
use Illuminate\Http\Request;
use App\Models\UsabilityConnect;
use App\Helpers\ToasterNotification;
use App\Http\Controllers\Controller;


class HomeController extends Controller
{

    # clarifis
    public function Getclarifis()
    {
        $clarifi = Clarifi::find(1);
        return view('backend/clarifi/get_clarifi', compact('clarifi'));
    }

    public function UpdateClarifi(Request $request, $id)
    {
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
    public function GetUsability()
    {
        $usability = Usability::find(1);
        return view('backend/usability/get_usability', compact('usability'));
    }

    public function UpdateUsability(Request $request, $id)
    {
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

    //UsabilityConnect
    public function UsabilityConnect()
    {
        $UsabilityConnect = UsabilityConnect::latest()->get();
        return view('backend/usability/all_connect', compact('UsabilityConnect'));
    }

    // UsabilityConnectCreate
    public function UsabilityConnectCreate()
    {
        return view('backend/usability/create');
    }
    public function UsabilityConnectStore(Request $request)
    {

        $connect = new UsabilityConnect();
        $connect->title = $request->title;
        $connect->description = $request->description;
        $connect->save();

        # notification helper function
        $notification = ToasterNotification::Toaster('Usability Connect Created Successfully', 'success', title: 'Created');
        return redirect()->route('admin.usability-connect')->with($notification);
    }

    // UsabilityConnectEdit
    public function UsabilityConnectEdit($id)
    {
        $connect = UsabilityConnect::find($id);
        return view('backend/usability/edit', compact('connect'));
    }

    // UsabilityConnectUpdate
    public function UsabilityConnectUpdate(Request $request, $id)
    {

        $connect = UsabilityConnect::find($id);
        $connect->title = $request->title;
        $connect->description = $request->description;
        $connect->save();

        # notification helper function
        $notification = ToasterNotification::Toaster('Usability Connect Updated Successfully', 'info
        ', title: 'Updated');
        return redirect()->route('admin.usability-connect')->with($notification);
    }

    // UsabilityConnectDelete
    public function UsabilityConnectDelete($id)
    {
        UsabilityConnect::find($id)->delete();
        # notification helper function
        $notification = ToasterNotification::Toaster('Usability Connect Deleted Successfully', 'error', title: 'Deleted');
        return redirect()->route('admin.usability-connect')->with($notification);
    }

    // UpdateUsabilityConnect For Frontend
    public function UpdateUsabilityConnect(Request $request)
    {
        $connect = UsabilityConnect::find($request->id);
        $connect->{$request->field} = $request->value;
        $connect->save();

        return response()->json(['message' => 'Updated Usability Connect successfully']);
    }

    # ================ Answer ================ #

    // index
    public function answer(){
        $answers = Answer::latest()->get();
        return view('backend/answer/index',compact('answers'));
    }

    // CreateAnswer
     public function CreateAnswer(){
        return view('backend/answer/create');
    }

    // StoreAnswer
    public function StoreAnswer(Request $request)
    {
        $answer = new Answer();
        $answer->title = $request->title;
        $answer->description = $request->description;
        $answer->save();

        # notification helper function
        $notification = ToasterNotification::Toaster('Answer Created Successfully....', 'success', 'Created Answer');
        return redirect()->route('admin.answer')->with($notification);
    }

    // EditAnswer
    public function EditAnswer($id)
    {
        $answer = Answer::find($id);
        return view('backend/answer/edit', compact('answer'));
    }

    // UpdateAnswer
    public function UpdateAnswer(Request $request, $id){

        $answer = Answer::find($id);
        $answer->title = $request->title;
        $answer->description = $request->description;
        $answer->save();

        # notification helper function
        $notification = ToasterNotification::Toaster('Answer Updated Successfully....', 'info', 'Updated Answer');
        return redirect()->route('admin.answer')->with($notification);

    }

    // DestroyAnswer
    public function DestroyAnswer($id)
    {
        $answer = Answer::find($id);
        $answer->delete();

        # notification helper function
        $notification = ToasterNotification::Toaster('Answer Deleted Successfully....', 'error', 'Deleted Answer');
        return redirect()->route('admin.answer')->with($notification);

    }

    # ================ Answer End ================

}
