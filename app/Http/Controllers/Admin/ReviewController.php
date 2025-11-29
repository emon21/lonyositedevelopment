<?php

namespace App\Http\Controllers\Admin;

use App\Models\Review;
use App\Helpers\FileUpload;
use Illuminate\Http\Request;
use App\Helpers\ToasterNotification;
use App\Http\Controllers\Controller;

class ReviewController extends Controller
{
    //

    public function index(){
        $reviews = Review::latest()->get();
        return view('backend/review/index',compact('reviews'));
    }

    public function create(){
        return view('backend/review/create');
    }

    public function store(Request $request,Review $review){


        # upload Image

        // Handle Photo Upload
        // $url = null;
        // if ($request->hasFile('photo')) {
        //     $file = $request->file('photo');
        //     $filename = time() . '.' . $file->getClientOriginalExtension();
        //     $url = $file->move('uploads/recipes/', $filename);
        // }

        $review->name = $request->name;
        $review->position = $request->position;
        $review->message = $request->message;
            
        # Image Upload using By Helper Function
    
        if ($request->hasFile('FileUpload')) {
            $review->photo = FileUpload::uploadImage($request->file('FileUpload'), 'review');
        }

        $review->save();

        # notification helper function
        $notification = ToasterNotification::Toaster('Review Created Successfully....','success','Success');

        return redirect()->route('admin.review.index')->with($notification);
    }

    public function show(Review $review){}

    public function edit(Review $review){
        return view('backend/review/edit',compact('review'));
    }

    public function update(Request $request,Review $review){

        $review->name = $request->name;
        $review->position = $request->position;
        $review->message = $request->message;


        # Image Upload using By Helper Function
    
        if ($request->hasFile('FileUpload')) {

            // old image delete
            FileUpload::deleteImage('uploads/review/' . $review->photo);
            // upload new image
            $review->photo = FileUpload::uploadImage($request->file('FileUpload'), 'review');
        }

        $review->save();

        # notification helper function
        $notification = ToasterNotification::Toaster('Review Updated Successfully','success','Update');

        return redirect()->route('admin.review.index')->with($notification);

    }

    public function destroy(Review $review){

        $review->delete();

        // Image Delete using Helper Function
        // FileUpload::deleteImage($review->photo);
        // old image delete
        
        FileUpload::deleteImage('uploads/review/' . $review->photo);
        
        # notification helper function
        $notification = ToasterNotification::Toaster('Review Deleted Successfully', 'error', 'Deleted');

        return redirect()->route('admin.review.index')->with($notification);
      
    }
}
