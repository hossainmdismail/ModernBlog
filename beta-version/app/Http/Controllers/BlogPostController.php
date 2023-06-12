<?php

namespace App\Http\Controllers;

use App\Models\Blog_Posts;
use App\Models\Category;
use App\Models\Sub_Category;
use App\Models\User;
use Illuminate\Http\Request;

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
        print_r($request->all());
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
