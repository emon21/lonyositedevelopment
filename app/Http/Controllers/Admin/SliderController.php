<?php

namespace App\Http\Controllers\admin;

use App\Models\Slider;
use App\Helpers\FileUpload;
use Illuminate\Http\Request;
use App\Helpers\ToasterNotification;
use App\Http\Controllers\Controller;

class SliderController extends Controller
{

    # Display a listing of the resource.
    public function index(){
        $sliders = Slider::latest()->get();
        return view('backend/slider/index', compact('sliders'));
    }

    # Show the form for creating a new resource.
    public function create()
    {
        return view('backend/slider/create');
    }

    # Store a newly created resource in storage.

    public function store(Request $request,Slider $slider){

        $slider->title = $request->title;
        $slider->link = $request->link;
        $slider->description = $request->description;
        $slider->status = $request->status;

        # Image Upload using By Helper Function
        if ($request->hasFile('FileUpload')) {
            $slider->photo = FileUpload::uploadImage($request->file('FileUpload'), 'slider');
        }

        $slider->save();

        # notification helper function
        $notification = ToasterNotification::Toaster('Slider Created Successfully....','success','Success');
        return redirect()->route('admin.slider.index')->with($notification);
    }

    # Display the specified resource.
    public function show(Slider $slider){
        
        return view('backend/slider/index', compact('slider'));
    }

    # Show the form for editing the specified resource.
    public function edit(Slider $slider){
       
        return view('backend/slider/edit', compact('slider'));
    }

    # Update the specified resource in storage.
    public function update(Request $request,Slider $slider){

        $slider->title = $request->title;
        $slider->link = $request->link;
        $slider->description = $request->description;
        $slider->status = $request->status;

        # Image Upload using By Helper Function
        if ($request->hasFile('FileUpload')) {

            // old image delete
            FileUpload::deleteImage('uploads/slider/' . $slider->photo);
            // update image
            $slider->photo = FileUpload::uploadImage($request->file('FileUpload'), 'slider');
        }

        $slider->save();

        # notification helper function
        $notification = ToasterNotification::Toaster('Slider Updated Successfully....','success', 'Updated Slider');
        return redirect()->route('admin.slider.index')->with($notification);
    }

    # Remove the specified resource from storage.
    public function destroy(Slider $slider)
    {
        // With image delete
        FileUpload::deleteImage('uploads/slider/' . $slider->photo);

        # notification helper function
        $notification = ToasterNotification::Toaster('Slider Deleted Successfully....','error','Deleted Slider');
        return redirect()->route('admin.slider.index')->with($notification);
    }

    # Frontend Slider Edit EditSlider

    public function EditSlider(Request $request,$id){

        $slider = Slider::findOrFail($id);
        // return view('frontend.components.slider_edit', compact('slider'));

        if($request->has('title')){

            $slider->title = $request->title;

          
            # notification helper function
            // $notification = ToasterNotification::Toaster('Slider Updated Successfully....','success', 'Updated Slider');
            // return redirect()->back()->with($notification);
        }

        if($request->has('description')){
            $slider->description = $request->description;
        }

        $slider->save();
        return response()->json(['message' => 'Slider updated successfully']);
        // return response()->json(['success' => true]);
    }

}
