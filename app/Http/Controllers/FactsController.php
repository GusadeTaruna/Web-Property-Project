<?php

namespace App\Http\Controllers;

use App\Models\Facts;
use Illuminate\Http\Request;

class FactsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $fact = Facts::all();
        return view('backend.facts.fact-index',compact('fact'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.facts.fact-create');
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
            $fact = new Facts;
            $fact->fact_title = $validatedData['article_title'];
            $fact->fact_category = $validatedData['article_category'];
            $fact->fact_content = $validatedData['article_content'];
            $fact->status = "Published";
            /*$imgpath = request()->file('file')->store('uploads', 'public'); 
            return response()->json(['location' => "/storage/$imgpath"]);*/

            if($request->hasFile('file')){
                $mainImage = $request->file('file');
                $filename = time().'.'.$mainImage->extension();
                Image:make($mainImage)->save(public_path().'/fact-asset/'.$filename);

                return json_encode(['location' => asset(public_path().'/fact-asset/'.$filename)]);
            }

            if(!$fact->save()){
                return back()->with('errorMsg', 'Error adding Data');
            }else{
                return redirect('/admin/fact')->with('success', 'Article successfully published');
            }

        }elseif($request->btn_submit == "draft_btn"){
            $fact = new Facts;
            $fact->fact_title = $request->article_title;
            $fact->fact_category = $request->article_category;
            $fact->fact_content = $request->article_content;
            $fact->status = "Draft";
            /*$imgpath = request()->file('file')->store('uploads', 'public'); 
            return response()->json(['location' => "/storage/$imgpath"]);*/

            // if($request->hasFile('file')){
            //     $mainImage = $request->file('file');
            //     $filename = time().'.'.$mainImage->extension();
            //     Image:make($mainImage)->save(public_path().'/blog-asset/'.$filename);

            //     return json_encode(['location' => asset(public_path().'/blog-asset/'.$filename)]);
            // }
        

            $fact->save();

            if(!$fact->save()){
                return back()->with('errorMsg', 'Error adding Data');
            }else{
                return redirect('/admin/blog')->with('success', 'Article successfully drafted');
            }
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Facts  $facts
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $fact = Facts::findOrFail($id)->where('id',$id)->get();
        return view('backend.facts.fact-read',compact('fact'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Facts  $facts
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $fact = Facts::findOrFail($id)->where('id',$id)->get();
        return view('backend.facts.fact-edit',compact('fact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Facts  $facts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //
        $fact = Facts::findOrFail($id);
        $fact->fact_title = $request->article_title;
        $fact->fact_category = $request->article_category;
        $fact->fact_content = $request->article_content;
        $check_input = $request->filled(['article_title', 'article_category','article_content']);
        if($check_input){
            $fact->status = "Published";
        }else{
            $fact->status = "Draft";
        }

        $fact->update();

        return redirect('/admin/fact')->with('success', 'Fact article successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Facts  $facts
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $fact = Facts::findOrFail($id);
        $fact->delete();

        if($fact){
         //redirect dengan pesan sukses
         return redirect('/admin/fact')->with('success',' Article data deleted successfully!');
        }else{
        //redirect dengan pesan error
        return redirect('/admin/fact')->with('error','Error Deleting Article!');
        }
    }
}
