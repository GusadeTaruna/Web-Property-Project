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
        $fact = new Facts;
        $fact->fact_title = $request->article_title;
        $fact->fact_category = $request->article_category;
        $fact->fact_content = $request->article_content;
        /*$imgpath = request()->file('file')->store('uploads', 'public'); 
        return response()->json(['location' => "/storage/$imgpath"]);*/

        if($request->hasFile('file')){
            $mainImage = $request->file('file');
            $filename = time().'.'.$mainImage->extension();
            Image:make($mainImage)->save(public_path().'/fact-asset/'.$filename);

            return json_encode(['location' => asset(public_path().'/fact-asset/'.$filename)]);
        }
    

        $fact->save();
        return redirect('/admin/fact')->with('success', 'Article successfully added');
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
        $fact = Facts::where('id',$id)->get();
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
        $fact = Facts::where('id',$id)->get();
        return view('backend.facts.fact-edit',compact('blog'));
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
