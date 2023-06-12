<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Photo;
use RealRashid\SweetAlert\Facades\Alert;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorys = Category::all();
        $data = Category::where('status', 1)->get();
        return view('backend.category.category_list',[
            'data' => $data,
            'categorys' => $categorys,
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

        Alert::toast('Success Toast','success');

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, string $id)
    {
        // print_r($request->all());
        echo 'Show';
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categorys = Category::where('id', $id)->first();
        return view('backend.category.category_edit', [
            'categorys'=>$categorys,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $file = Category::find($request->id)->photo;

        if (file_exists($request->photo)) {
            Photo::delete('uploads/Category',$file); //Deleteing Photo
            Photo::upload($request->photo ,'uploads/Category','CAT',['500','500']); //Upload new Photo
        }

        Category::find($request->id)->update([
            'name'          => $request->name,
            'photo'         => (file_exists($request->photo)?Photo::$name : $file), //ternary operator | replace or update photo
            'meta_title'    => $request->meta_title,
            'meta_tags'     => $request->meta_tags,
            'meta_descp'    => $request->meta_descp,
        ]);
        return redirect()->route('category.index')->with('succ','Category Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        echo 'hi';
    }
}
