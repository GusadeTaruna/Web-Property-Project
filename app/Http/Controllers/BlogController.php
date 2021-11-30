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
        if($request->btn_submit == "publish_btn"){
            $validatedData = $request->validate([
                'article_title' => 'required',
                'article_category' => 'required',
                'article_content' => 'required',
            ],
            [
                'article_title.required' => 'You must enter the article title',
                'article_category.required' => 'You must enter the article category',
                'article_content.required' => 'You must enter the article content',
            ]);

            $blog = new Blog;
            $blog->blog_title = $validatedData['article_title'];
            $blog->blog_category = $validatedData['article_category'];
            $blog->blog_content = $validatedData['article_content'];
            $blog->status = "Published";
            /*$imgpath = request()->file('file')->store('uploads', 'public'); 
            return response()->json(['location' => "/storage/$imgpath"]);*/

            if($request->hasFile('file')){
                $mainImage = $request->file('file');
                $filename = time().'.'.$mainImage->extension();
                Image:make($mainImage)->save(public_path().'/blog-asset/'.$filename);

                return json_encode(['location' => asset(public_path().'/blog-asset/'.$filename)]);
            }
            $blog->save();

            
            if(!$blog->save()){
                return back()->with('errorMsg', 'Error adding Data');
            }else{
                return redirect('/admin/blog')->with('success', 'Article successfully published');
            }
            

        }elseif($request->btn_submit == "draft_btn"){
            $blog = new Blog;
            $blog->blog_title = $request->article_title;
            $blog->blog_category = $request->article_category;
            $blog->blog_content = $request->article_content;
            $blog->status = "Draft";
            /*$imgpath = request()->file('file')->store('uploads', 'public'); 
            return response()->json(['location' => "/storage/$imgpath"]);*/

            // if($request->hasFile('file')){
            //     $mainImage = $request->file('file');
            //     $filename = time().'.'.$mainImage->extension();
            //     Image:make($mainImage)->save(public_path().'/blog-asset/'.$filename);

            //     return json_encode(['location' => asset(public_path().'/blog-asset/'.$filename)]);
            // }
        

            $blog->save();

            if(!$blog->save()){
                return back()->with('errorMsg', 'Error adding Data');
            }else{
                return redirect('/admin/blog')->with('success', 'Article successfully drafted');
            }
            
        }
        
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
    public function edit($id)
    {
        //
        $blog = Blog::where('id',$id)->get();
        return view('backend.blog.blog-edit',compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $blog = Blog::findOrFail($id);
        $blog->blog_title = $request->article_title;
        $blog->blog_category = $request->article_category;
        $blog->blog_content = $request->article_content;
        $check_input = $request->filled(['article_title', 'article_category','article_content']);
        if($check_input){
            $blog->status = "Published";
        }else{
            $blog->status = "Draft";
        }

        $blog->update();

        return redirect('/admin/blog')->with('success', 'Blog article successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $blog = Blog::findOrFail($id);
        $blog->delete();

        if($blog){
         //redirect dengan pesan sukses
         return redirect('/admin/blog')->with('success',' Article data deleted successfully!');
        }else{
        //redirect dengan pesan error
        return redirect('/admin/blog')->with('error','Error Deleting Article!');
        }
    }
}
