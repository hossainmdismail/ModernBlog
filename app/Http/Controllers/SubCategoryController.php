<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Sub_Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Photo;
use RealRashid\SweetAlert\Facades\Alert;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subcategorys = Sub_Category::all();
        return view('backend.subcategory.subcategory_list',[
            'subcategorys' => $subcategorys,
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
        Alert::toast('Success Toast','success');
        return back();
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $categorys  = Category::all();
        $subCategory = Sub_Category::find($id)->first();
        return view('backend.subcategory.subcategory_edit', [
            'categorys' => $categorys,
            'sub_cat' => $subCategory,
        ]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $file = Sub_Category::find($id)->photo; //Getting the name of photo
        if (file_exists($request->photo)) {
            Photo::delete('uploads/Subcategory',$file); //Deleteing Photo
            Photo::upload($request->photo ,'uploads/Subcategory','CAT',['500','500']); //Upload new Photo
        }

        Sub_Category::find($id)->update([
            'category_id'   =>$request->category_id,
            'name'          => $request->name,
            'photo'         => (file_exists($request->photo)?Photo::$name : $file), //ternary operator | replace or update photo
            'meta_title'    => $request->meta_title,
            'meta_tags'     => $request->meta_tags,
            'meta_descp'    => $request->meta_descp,
        ]);
        return redirect()->route('subcategory.index')->with('succ','Category Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
         //Deleting Photo
         $file = Sub_Category::find($id)->photo;
         Photo::delete('uploads/Subcategory',$file);

         //Deleting Item
         $data = Sub_Category::find($id)->delete();
         return back()->with('succ', 'Item Deleted');
    }
}
