<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $categories = Category::latest()->get();
        //  response()->json(Category::latest()->get());
        return view('backend/category/all_category',compact('categories'));
    }


    public function getCategoriesData()
    {
        return response()->json(Category::latest()->get());

        
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
    public function store(Request $request)
    {
        $category = Category::create([
            'category_name' => $request->name,
            'category_slug' => strtolower(str_replace(' ', '-', $request->category_name)),
    ]);

        // $category->category_name = $request->category_name;
        // $category->category_slug = strtolower(str_replace(' ', '-', $request->category_name));
        return response()->json(['message' => 'Category created successfully', 'category' => $category]);

        // $request->validate([
        //     'category_name' => 'required|unique:categories,category_name',
        // ]);

        // Category::create([
        //     'category_name' => $request->category_name,
        // ]);

        // return response()->json(['message' => 'Category added successfully!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        $category = Category::findOrFail($category->id);
        return response()->json($category);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {

        $category = Category::findOrFail($category->id);

        $request->validate([
            'category_name' => 'required|unique:categories,category_name,' . $category->id,
        ]);

        $category->update(['name' => $request->name]);
        
        return response()->json(['message' => 'Category updated successfully', 'category' => $category]);

        // return response()->json(['message' => 'Category updated successfully!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        Category::findOrFail($category->id)->delete();
        return response()->json(['message' => 'Category deleted successfully']);
    }

   
}
