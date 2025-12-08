<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Blog;
use App\Models\Team;
use App\Models\About;
use App\Models\Review;
use App\Helpers\FileUpload;
use Illuminate\Http\Request;
use App\Helpers\ToasterNotification;
use App\Http\Controllers\Controller;
use App\Models\BlogCategory;

class FrontendController extends Controller
{
    //

    public function index() {}

    public function about()
    {
        return view('frontend/about');
    }
    public function GetAboutUs()
    {

        $about = About::first();
        return view('backend/about/get_about', compact('about'));
    }

    public function UpdateAbout(Request $request, About $about)
    {


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
        $notification = ToasterNotification::Toaster('About Updated Successfully', 'success', 'Update');

        return redirect()->route('admin.get.about')->with($notification);
    }

    public function Team()
    {
        $teams = Team::latest()->get();
        return view('frontend/team/index', compact('teams'));
    }
    public function SingleTeam(Team $team)
    {

        return view('frontend/team/single-team', compact('team'));
    }

    public function service()
    {
        return view('frontend/service/index');
    }

    public function portfolio()
    {
        return view('frontend/portfolio/index');
    } 
    
    public function category()
    {
        # category with blog;

        $category = BlogCategory::withCount('blog')->get();
     
        return view('frontend/category/index',compact('category'));
    }


    public function CategoryPosts(BlogCategory $category)
    {
        $category = BlogCategory::where('category_slug', $category->category_slug)->first();
        // return $category;

        // পোস্ট + count load
        $category->loadCount('blog');

        $posts = Blog::where('category_id', $category->id)
            ->latest()
            ->get();

        //blog_count

        return view('frontend/category/category', compact('category', 'posts'));
    }

    public function blog()
    {
        $blogs = Blog::latest()->get();
        return view('frontend/blog/index', compact('blogs'));
    }
    public function SingleBlog(Blog $blog)
    {
        # Related Blog on category
        // return $blog; // category_id = 2

       // 1. Category load with blogs

        # Category with blog
        //$category = BlogCategory::with('blog')
                  //  ->where('id', $blog->category_id)
                   // ->inRandomOrder()
                  //  ->first(); // get() নয়, first() লাগে, কারণ একটাই category

                    // একই category এর অন্যান্য ব্লগ (related blog)
    $relatedBlogs = Blog::where('category_id', $blog->category_id)
                        ->where('id', '!=', $blog->id)
                        ->inRandomOrder()
                       // ->take(5) // কতগুলো related blog দেখাতে চান
                        ->get();
                        // return $relatedBlogs;
        
        // $blogs = $category['blog'];

        // 2. Split blogs: first blog & related
       // $blogs = $category->blog->toArray(); // collection to array of single category all blog
        //$firstBlog = $blogs[0] ?? null; // 
       // $relatedBlogs = array_slice($blogs, 1); // প্রথম blog বাদ বাকি সব

        # random blog


        // return $relatedBlogs;

        // 3. Pass to view
        return view('frontend/blog/single-blog', compact('blog', 'relatedBlogs'));

     //   $firstBlog = $blogs[0] ?? null;
       
        // 3. Pass to view
        // return view('frontend/blog/single-blog', compact('category', 'firstBlog', 'relatedBlogs', 'blog'));
    }

    public function career()
    {
        return view('frontend/career/index');
    }

    public function contact()
    {
        return view('frontend/contact');
    }
}
