<?php

namespace App\Http\Controllers;

use App\Models\Blog_Posts;
use App\Models\Category;
use App\Models\Post_Seo;
use App\Models\Sub_Category;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Photo;

class BlogPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogposts  = Blog_Posts::all();
        $data       = Blog_Posts::where('status', 1)->get();
        return view('backend.blogpost.blogpost_list',[
            'data' => $data,
            'blogposts' => $blogposts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $categorys  = Category::all();
        $subcategorys  = Sub_Category::all();
        return view('backend.blogpost.blogpost_add', [
            'categorys' => $categorys,
            'subcategorys' => $subcategorys,

        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id'       => 'required|integer',
            'sub_category_id'   => 'required|integer',
            'blog_type'         => 'required|string',
            'title'             => 'required|string',
            'content'           => 'required',
            'photo'             => 'required|mimes:jpg,png,svg,jpeg,webp',
        ]);
        Photo::upload($request->photo ,'uploads/blog','BLOG',['1200','900']);

        Blog_Posts::insert([
            'user_id' => Auth::user()->id,
            'category_id' => $request->category_id,
            'sub_category_id' => $request->sub_category_id,
            'premium' => $request->blog_type,
            'title' => $request->title,
            'photo' => Photo::$name,
            'content' => $request->content,
            'created_at' => Carbon::now(),
        ]);
        // Post_Seo::insert([
        //     ''
        // ]);
        Alert::toast('Successfully Added','success');
        return back();
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
    public function edit(string $id)
    {
        $categorys  = Category::all();
        $subcategorys  = Sub_Category::all();
        return view('backend.blogpost.blogpost_edit', [
            'categorys'=>$categorys,
            'subcategorys'=>$subcategorys,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
