<?php

namespace App\Http\Controllers\admin;

use App\Models\Blog;
use App\Helpers\FileUpload;
use Illuminate\Support\Str;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use App\Helpers\ToasterNotification;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $blogs = Blog::latest()->get();
        // $categories = BlogCategory::withCount('blog')->get();

        // return $categories;
        return view('backend/blog/index',compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = BlogCategory::all();
         return view('backend/blog/create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,Blog $blog)
    {

        $blog->category_id = $request->category;
        $blog->title = $request->name;
        $blog->slug = Str::slug($request->name);
        $blog->description = $request->description;
        
        # Image Upload using By Helper Function
            if ($request->hasFile('photo')) {

                // old image delete
                // FileUpload::deleteImage('uploads/apps/' . $blog->photo->photo);
                // update image
                $blog->photo = FileUpload::uploadImage($request->file('photo'), 'blog');
            }

        $blog->save();

        # notification helper function
        $notification = ToasterNotification::Toaster('Blog Created successfully!', 'success', 'Blog Created');
        return redirect()->route('admin.blog')->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        $categories = BlogCategory::all();
        return view('backend/blog/edit', compact('categories', 'blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        $blog->category_id = $request->category;
        $blog->title = $request->name;
        $blog->slug = Str::slug($request->name);
        $blog->description = $request->description;

        # Image Upload using By Helper Function
        if ($request->hasFile('photo')) {

            // old image delete
            FileUpload::deleteImage('uploads/blog/' . $blog->photo);
            // update image
            $blog->photo = FileUpload::uploadImage($request->file('photo'), 'blog');
        }

        $blog->save();

        # notification helper function
        $notification = ToasterNotification::Toaster('Blog Updated successfully!', 'info', 'Updated');
        return redirect()->route('admin.blog')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        // old image delete
          FileUpload::deleteImage('uploads/blog/' . $blog->photo);
        $blog->delete();

        # notification helper function
        $notification = ToasterNotification::Toaster('Blog Deleted successfully!', 'error', 'Deleted');
        return redirect()->route('admin.blog')->with($notification);
    }
}
