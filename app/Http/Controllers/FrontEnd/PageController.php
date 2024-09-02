<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Authors;
use App\Models\Blogs;
use App\Models\Category;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home(){
         $parent_categories = Category::with('banner_image')
            ->where('parent_id', null)
            ->where('status', 1)
            ->select('title', 'slug', 'banner_image_id') // Make sure to select the foreign key, not the related column
            ->get()
            ->map(function ($category) {
                $category->path = $category->banner_image ? $category->banner_image->file_path : null;
                return $category;
            });
         $blogs = Blogs::where('parent_id',null)->where('status',1)->orderby('id','DESC')->paginate(30);
         return view('frontend.pages.home', compact('parent_categories', 'blogs'));
    }

    public function blogDetails($slug)
    {
        $blog = Blogs::where('slug', $slug)->firstorfail();
        $blogs = Blogs::where('parent_id',null)->where('slug','!=', $slug)->paginate(20);
        return view('frontend.pages.blog.details', compact( 'blog','blogs'));
    }

    public function authorDetails($slug)
    {
        $author = Authors::where('slug', $slug)->firstorfail();
        if($author->category->blogs){
            $blogs =$author->category->blogs;
        }else{
            $blogs =[];
        }

        return view('frontend.pages.blog.author', compact( 'blogs','author'));
    }
}
