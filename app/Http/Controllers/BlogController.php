<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $blog = Blog::all();
        return view('backend.blog.blog-index',compact('blog'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.blog.blog-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $blog = new Blog;
        $blog->blog_title = $request->article_title;
        $blog->blog_category = $request->article_category;
        $blog->blog_content = $request->article_content;
        /*$imgpath = request()->file('file')->store('uploads', 'public'); 
        return response()->json(['location' => "/storage/$imgpath"]);*/

        if($request->hasFile('file')){
            $mainImage = $request->file('file');
            $filename = time().'.'.$mainImage->extension();
            Image:make($mainImage)->save(public_path().'/blog-asset/'.$filename);

            return json_encode(['location' => asset(public_path().'/blog-asset/'.$filename)]);
        }
    

        $blog->save();
        return redirect('/admin/blog')->with('success', 'Article successfully added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $blog = Blog::where('id',$id)->get();
        return view('backend.blog.blog-read',compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        //
    }
}
