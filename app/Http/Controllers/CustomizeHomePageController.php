<?php

namespace App\Http\Controllers;

use App\Models\CustomizeHome;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Image;

class CustomizeHomePageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $homepage_check = CustomizeHome::all();
        $homepage_array = $homepage_check->toArray();
        // dd($homepage_array);
        if($homepage_check->isEmpty()){
            $value = [];
            return view('backend.custom-page.home-create', compact('value'));
        }else{
            $id_home = $homepage_array[0]['id'];
            $value = CustomizeHome::where('id',$id_home)->first();
            if ($homepage_array[0]['header_image']==null){
                $count_image_header = 0;
            }else{
                $count_image_header = count(json_decode($homepage_array[0]['header_image']));
                // $count_image_left = count(json_decode($homepage_array[0]['left_section_image_or_vid']));
                // $count_image_right = count(json_decode($homepage_array[0]['right_section_image_or_vid']));
            }

            if (!is_array($homepage_array[0]['right_section_image_or_vid'])){
                $count_image_right = 0;
            }else{
                $count_image_right = count(json_decode($homepage_array[0]['right_section_image_or_vid']));
            }

            if (!is_array($homepage_array[0]['left_section_image_or_vid'])){
                $count_image_left = 0;
            }else{
                $count_image_left = count(json_decode($homepage_array[0]['left_section_image_or_vid']));
            }
            return view('backend.custom-page.home-create', compact('value','count_image_header','count_image_right','count_image_left'));
        }
        
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
        
        $homepage = new CustomizeHome;
        $homepage->header_title = $request->header_title;
        $homepage->header_sub_title = $request->header_sub_title;
        $this->validate($request, 
        [
            'header_image.*' => 'image|mimes:png,jpg,jpeg,svg|max:10000'
        ],
        [
            'header_image.*.max' => 'The images must not be greater than 10 MB.'
        ]);
        if($request->hasFile('header_image')){
            $counter = 0;
            foreach($request->file('header_image') as $image){
                $getFileExt = $image->getClientOriginalExtension();
                $name=time().'HEADER'.$counter++.'.'.$getFileExt;
                $destinationPath = public_path().'/home-asset/';
                
                $img = Image::make($image->getRealPath());
                $img->resize(1000, 1000, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationPath . $name, 80);
                // $image->move(public_path().'/home-asset/',$name); //folder path
                $data[] = $name;
            }
            $homepage->header_image = json_encode($data);
        }else{
            $homepage->header_image = NULL;
        }
        
        $homepage->left_section_title = $request->left_title;
        $homepage->left_section_sub_title = $request->left_desc;

        if($request->right_asset =="images_input_right"){
            $this->validate($request, 
            [
                'image_right.*' => 'image|mimes:png,jpg,jpeg,svg|max:10000'
            ],
            [
                'image_right.*.max' => 'The images must not be greater than 10 MB.'
            ]);

            if($request->hasFile('image_right')){
                $counter = 0;
                foreach($request->file('image_right') as $image){
                    $getFileExt = $image->getClientOriginalExtension();
                    $name=time().'RIGHT'.$counter++.'.'.$getFileExt;
                    $destinationPath = public_path().'/home-asset/';
                
                    $img = Image::make($image->getRealPath());
                    $img->resize(1000, 1000, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save($destinationPath . $name, 80);
                    // $image->move(public_path().'/home-asset/',$name); //folder path
                    $data_right[] = $name;
                }
                $homepage->right_section_image_or_vid = json_encode($data_right);
            }else{
                $homepage->right_section_image_or_vid = NULL;
            }
            
        }elseif($request->right_asset =="video_input_right"){
            $homepage->right_section_image_or_vid = $request->video_right;
        }

        $homepage->right_section_title = $request->right_title;
        $homepage->right_section_sub_title = $request->right_desc;

        if($request->left_asset =="images_input_left"){
            $this->validate($request, 
            [
                'image_left.*' => 'image|mimes:png,jpg,jpeg,svg|max:10000'
            ],
            [
                'image_left.*.max' => 'The images must not be greater than 10 MB.'
            ]);

            if($request->hasFile('image_left')){
                $counter = 0;
                foreach($request->file('image_left') as $image){
                    $getFileExt = $image->getClientOriginalExtension();
                    $name=time().'LEFT'.$counter++.'.'.$getFileExt;
                    $destinationPath = public_path().'/home-asset/';
                
                    $img = Image::make($image->getRealPath());
                    $img->resize(1000, 1000, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save($destinationPath . $name, 80);
                    // $image->move(public_path().'/home-asset/',$name); //folder path
                    $data_left[] = $name;
                }
                $homepage->left_section_image_or_vid = json_encode($data_left);
            }else{
                $homepage->left_section_image_or_vid = NULL;
            }
            
        }elseif($request->left_asset =="video_input_left"){
            $homepage->left_section_image_or_vid = $request->video_left;
        }

        $homepage->center_section_text = $request->center_text;

        if($request->header_title==null && $request->header_sub_title==null && $request->header_image==null
            && $request->left_title==null && $request->left_desc==null && $request->image_right==null && $request->video_right==null
            && $request->right_title==null && $request->right_desc==null && $request->image_left==null && $request->video_left==null
            && $request->center_text==null){
            return redirect('/admin/customize/homepage')->with('errorMsg', 'Nothing to customize');
        }else{
            $homepage->save();
            return redirect('/admin/customize/homepage')->with('success', 'Homepage successfully edited');
        }

        // dd($request->header_title==null && $request->header_sub_title==null && $request->header_image==null
        // && $request->left_title==null && $request->left_desc==null && $request->image_right==null && $request->video_right==null
        // && $request->right_title==null && $request->right_desc==null && $request->image_left==null && $request->video_left==null
        // && $request->center_text==null);
		
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CustomizeHome  $CustomizeHome
     * @return \Illuminate\Http\Response
     */
    public function show(CustomizeHome $CustomizeHome)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CustomizeHome  $CustomizeHome
     * @return \Illuminate\Http\Response
     */
    public function edit(CustomizeHome $CustomizeHome)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CustomizeHome  $CustomizeHome
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $homepage = CustomizeHome::findOrFail($id);

        if ($request->hasFile('header_image')) {
            request()->validate(
                ['header_image.*' => 'image|mimes:png,jpg,jpeg,svg|max:10000'],
                ['header_image.*.max' => 'The images must not be greater than 10 MB.']
            );

            $images_header = json_decode($homepage->header_image);
            if ($images_header){
                foreach($images_header as $image){

                    $image_path = public_path().'/home-asset/'.$image;

                    if(File::exists($image_path)) {
                        File::delete($image_path);
                    }
                }
                $counter = 0;
                foreach($request->file('header_image') as $image){
                    $getFileExt = $image->getClientOriginalExtension();
                    $name=time().'HEADER'.$counter++.'.'.$getFileExt;
                    $destinationPath = public_path().'/home-asset/';
                
                    $img = Image::make($image->getRealPath());
                    $img->resize(1000, 1000, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save($destinationPath . $name, 80);
                    // $image->move(public_path().'/home-asset/',$name); //folder path
                    $data[] = $name;
                    $update = CustomizeHome::where('id', $id)->update([
                        'header_image' => json_encode($data)
                   ]);
                }
            }else{
                $counter = 0;
                foreach($request->file('header_image') as $image){
                    $getFileExt = $image->getClientOriginalExtension();
                    $name=time().'HEADER'.$counter++.'.'.$getFileExt;
                    $destinationPath = public_path().'/home-asset/';
                    $realPath = '/home-asset/';

                    if (!file_exists($destinationPath)) {
                        mkdir($destinationPath, 0775, true);
                    }
                    
                    $img = Image::make($image->getRealPath());
                    $img->resize(1000, 1000, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save($destinationPath . $name, 80);
                    // $image->move(public_path().'/home-asset/',$name); //folder path
                    $data[] = $name;
                    $update = CustomizeHome::where('id', $id)->update([
                        'header_image' => json_encode($data)
                   ]);
                }
            }
            
        }

        if($request->right_asset =="images_input_right"){
            if ($request->hasFile('image_right')) {
                request()->validate(
                    ['image_right.*' => 'image|mimes:png,jpg,jpeg,svg|max:10000'],
                    ['image_right.*.max' => 'The images must not be greater than 10 MB.']
                );

                $images_right = json_decode($homepage->right_section_image_or_vid);
                if ($images_right){
                    foreach($images_right as $image){

                        $image_path = public_path().'/home-asset/'.$image;
    
                        if(File::exists($image_path)) {
                            File::delete($image_path);
                        }
                    }
                    $counter = 0;
                    foreach($request->file('image_right') as $image){
                        $getFileExt = $image->getClientOriginalExtension();
                        $name=time().'RIGHT'.$counter++.'.'.$getFileExt;
                        $destinationPath = public_path().'/home-asset/';
                
                        $img = Image::make($image->getRealPath());
                        $img->resize(1000, 1000, function ($constraint) {
                            $constraint->aspectRatio();
                        })->save($destinationPath . $name, 80);
                        // $image->move(public_path().'/home-asset/',$name); //folder path
                        $data_right[] = $name;
                        $update = CustomizeHome::where('id', $id)->update([
                            'right_section_image_or_vid' => json_encode($data_right)
                        ]);
                    }
                }else{
                    $counter = 0;
                    foreach($request->file('image_right') as $image){
                        $getFileExt = $image->getClientOriginalExtension();
                        $name=time().'RIGHT'.$counter++.'.'.$getFileExt;
                        $destinationPath = public_path().'/home-asset/';
                
                        $img = Image::make($image->getRealPath());
                        $img->resize(1000, 1000, function ($constraint) {
                            $constraint->aspectRatio();
                        })->save($destinationPath . $name, 80);
                        // $image->move(public_path().'/home-asset/',$name); //folder path
                        $data_right[] = $name;
                        $update = CustomizeHome::where('id', $id)->update([
                            'right_section_image_or_vid' => json_encode($data_right)
                        ]);
                    }
                }
                 
            }
        }elseif($request->right_asset =="video_input_right"){
            $images_right = json_decode($homepage->right_section_image_or_vid);
            if ($images_right){
                foreach($images_right as $image){

                    $image_path = public_path().'/home-asset/'.$image;

                    if(File::exists($image_path)) {
                        File::delete($image_path);
                    }
                }
            }
            $homepage->right_section_image_or_vid = $request->video_right;
        }

        if($request->left_asset =="images_input_left"){
            if ($request->hasFile('image_left')) {
                request()->validate(
                    ['image_left.*' => 'image|mimes:png,jpg,jpeg,svg|max:10000'],
                    ['image_left.*.max' => 'The images must not be greater than 10 MB.']
                );
                
                $images_left = json_decode($homepage->left_section_image_or_vid);
                if ($images_left){
                    foreach($images_left as $image){

                        $image_path = public_path().'/home-asset/'.$image;

                        if(File::exists($image_path)) {
                            File::delete($image_path);
                        }
                    }
                    $counter = 0;
                    foreach($request->file('image_left') as $image){
                        $getFileExt = $image->getClientOriginalExtension();
                        $name=time().'LEFT'.$counter++.'.'.$getFileExt;
                        $destinationPath = public_path().'/home-asset/';
                
                        $img = Image::make($image->getRealPath());
                        $img->resize(1000, 1000, function ($constraint) {
                            $constraint->aspectRatio();
                        })->save($destinationPath . $name, 80);
                        // $image->move(public_path().'/home-asset/',$name); //folder path
                        $data_left[] = $name;
                        $update = CustomizeHome::where('id', $id)->update([
                            'left_section_image_or_vid' => json_encode($data_left)
                        ]);
                    }
                    
                }else{
                    $counter = 0;
                    foreach($request->file('image_left') as $image){
                        $getFileExt = $image->getClientOriginalExtension();
                        $name=time().'LEFT'.$counter++.'.'.$getFileExt;
                        $destinationPath = public_path().'/home-asset/';
                
                        $img = Image::make($image->getRealPath());
                        $img->resize(1000, 1000, function ($constraint) {
                            $constraint->aspectRatio();
                        })->save($destinationPath . $name, 80);
                        // $image->move(public_path().'/home-asset/',$name); //folder path
                        $data_left[] = $name;
                        $update = CustomizeHome::where('id', $id)->update([
                            'left_section_image_or_vid' => json_encode($data_left)
                        ]);
                    }
                }
            
            }
        }elseif($request->left_asset =="video_input_left"){
            $images_left = json_decode($homepage->left_section_image_or_vid);
            if ($images_left){
                foreach($images_left as $image){

                    $image_path = public_path().'/home-asset/'.$image;

                    if(File::exists($image_path)) {
                        File::delete($image_path);
                    }
                }
            }
            $homepage->left_section_image_or_vid = $request->video_left;
        }

        $homepage->header_title = $request->header_title;
        $homepage->header_sub_title = $request->header_sub_title;
        $homepage->left_section_title = $request->left_title;
        $homepage->left_section_sub_title = $request->left_desc;
        $homepage->right_section_title = $request->right_title;
        $homepage->right_section_sub_title = $request->right_desc;
        $homepage->center_section_text = $request->center_text;
        $homepage->update();
        return redirect('/admin/customize/homepage')->with('success',' Homepage successfully edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CustomizeHome  $CustomizeHome
     * @return \Illuminate\Http\Response
     */
    public function destroy(CustomizeHome $CustomizeHome)
    {
        //
    }
}
