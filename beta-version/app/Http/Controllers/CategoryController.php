<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Photo;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Category::where('status', 1)->get();
        return view('backend.category.category_list',[
            'data' => $data,
        ]);
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.category.category_add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // print_r(json_encode($request->all()));

        $request->validate([
            'name'          => 'required',
            'photo'         => 'required',
            'meta_title'    => 'required',
            'meta_tags'     => 'required',
            'meta_descp'    => 'required',
        ]);
        Photo::upload($request->photo ,'uploads/Category','CAT',['500','500']);
        Category::insert([
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

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        echo $id;
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
        echo $id;
    }
}
