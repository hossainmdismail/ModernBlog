<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Sub_Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Photo;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data       = Sub_Category::where('status', 1)->get();
        return view('backend.subcategory.subcategory_list',[
            'data' => $data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorys  = Category::all();
        return view('backend.subcategory.subcategory_add', [
            'categorys' => $categorys,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // print_r(json_encode($request->all()));
        // // echo $request->photo;
        // die();
        // dd($request);

        $request->validate([
            'category_id'   => 'required',
            'name'          => 'required',
            'photo'         => 'required',
            'meta_title'    => 'required',
            'meta_tags'     => 'required',
            'meta_descp'    => 'required',
        ]);
        Photo::upload($request->photo ,'uploads/Subcategory','CAT',['500','500']);
        Sub_Category::insert([
            'category_id'   => $request->category_id,
            'name'          => $request->name,
            'photo'         => Photo::$name,
            'meta_title'    => $request->meta_title,
            'meta_tags'     => $request->meta_tags,
            'meta_descp'    => $request->meta_descp,
            'created_at'    => Carbon::now(),
        ]);
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
        //
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
