<?php

namespace App\Http\Controllers\admin;

use Illuminate\Support\Str;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use App\Helpers\ToasterNotification;
use App\Http\Controllers\Controller;

class BlogCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = BlogCategory::latest()->get();
        return view('backend/category/index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, BlogCategory $category)
    {
        
        $category->category_name = $request->category_name;
        $category->category_slug = Str::slug($request->category_name);
        // $category->category_slug = strtolower(str_replace(' ', '-', $request->category_name));

        $category->save();

        # notification helper function
        $notification = ToasterNotification::Toaster('Category Created successfully!', 'success', 'Created');

        return redirect()->route('admin.category')->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(BlogCategory $category) {
        // $category = BlogCategory::find($id);

        return response()->json($category);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $cat = BlogCategory::findOrFail($id);
        return response()->json($cat);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $category = BlogCategory::findOrFail($id);
        $category->category_name = $request->category_name;
        // $category->category_slug = Str::slug($request->category_name);
        $category->category_slug = strtolower(str_replace(' ', '-', $request->category_name));
        $category->save();

        # notification helper function
        // $notification = ToasterNotification::Toaster('Category Updated successfully!', 'success', 'Updated');

        // return redirect()->route('admin.category')->with($notification);

        // $cat = BlogCategory::findOrFail($id);
        // $cat->name = $request->name;
        // $cat->save();

        // return response()->json([
        //     'status' => 'success',
        //     'message' => 'Category Updated'
        // ]);

        // $category->update([
        //     'category_name' => $request->category_name,
        //     'category_slug' => Str::slug($request->category_name),
        // ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Category Updated Successfully',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        // $category->delete();
        BlogCategory::findOrFail($id)->delete();

        # notification helper function
        // $notification = ToasterNotification::Toaster('Category Deleted successfully!', 'error', 'Deleted');

        // return redirect()->route('admin.category')->with($notification);

        return response()->json([
            'success' => true,
            'message' => 'Category Deleted Successfully!'
        ]);
    }
}
