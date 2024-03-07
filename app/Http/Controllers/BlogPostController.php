<?php

namespace App\Http\Controllers;

use App\Models\Blog_Posts;
use App\Models\Category;
use App\Models\Post_Seo;
use App\Models\Sub_Category;
use App\Models\User;
use Illuminate\Support\Str;
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
            'data'      => $data,
            'blogposts' => $blogposts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $categorys      = Category::all();
        $subcategorys   = Sub_Category::all();
        return view('backend.blogpost.blogpost_add', [
            'categorys'     => $categorys,
            'subcategorys'  => $subcategorys,

        ]);
    }

     // ajax url getsubcat
     function getsubcat(Request $request){

        $subcategorys = Sub_Category::where('category_id', $request->category_id)->get();

        $str = '<option value="">-- Select Sub Cateegory --</option>';

        foreach($subcategorys as $subcategory){
            $str .= '<option value="'.$subcategory->id.'">'.$subcategory->name.'</option>';
        }

        echo $str;
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

        $post =  Blog_Posts::create([
            'user_id'           => Auth::user()->id,
            'category_id'       => $request->category_id,
            'sub_category_id'   => $request->sub_category_id,
            'premium'           => $request->blog_type,
            'title'             => $request->title,
            'slug'              => Str::slug($request->title),
            'photo'             => Photo::$name,
            'content'           => $request->content,
            'created_at'        => Carbon::now(),
        ]);
        Post_Seo::insert([
            'post_id'       => $post->id,
            'meta_title'    => $request->meta_title,
            'meta_tags'     => $request->meta_tags,
            'meta_descp'    => $request->meta_descp,
            'created_at'    => Carbon::now(),
        ]);

        Alert::toast('Successfully Added','success');
        return back();
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $blog_post      = Blog_Posts::find($id);
        $categorys      = Category::all();
        $subcategorys   = Sub_Category::all();
        return view('backend.blogpost.blogpost_edit', [
            'blog_post'     =>$blog_post,
            'categorys'     =>$categorys,
            'subcategorys'  =>$subcategorys,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // print_r($request->all());
        // die();
        $file = Blog_Posts::find($id)->photo; //Getting the name of photo
        if (file_exists($request->photo)) {
            Photo::delete('uploads/blog',$file); //Deleteing Photo
            Photo::upload($request->photo ,'uploads/blog','CAT',['500','500']); //Upload new Photo
        }

        Blog_Posts::find($id)->update([
            'category_id'       =>$request->category_id,
            'sub_category_id'   =>$request->sub_category_id,
            'title'             => $request->title,
            'photo'             => (file_exists($request->photo)?Photo::$name : $file), //ternary operator | replace or update photo
            'premium'           => $request->premium,
            'status'            => $request->status,
        ]);
        return redirect()->route('blogpost.index')->with('succ','Blog Post Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //Deleting Photo
        $file = Blog_Posts::find($id)->photo;
        Photo::delete('uploads/blog',$file);

        //Deleting Item
        $data = Blog_Posts::find($id)->delete();
        return back()->with('succ', 'Item Deleted');
    }
}
