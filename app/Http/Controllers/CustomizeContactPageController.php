<?php

namespace App\Http\Controllers;

use App\Models\CustomizeContact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Image;

class CustomizeContactPageController extends Controller
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
        $contact_check = CustomizeContact::all();
        $contact_array = $contact_check->toArray();
        if($contact_check->isEmpty()){
            $value = [];
            return view('backend.custom-page.contact-create', compact('value'));
        }else{
            $id_contact = $contact_array[0]['id'];
            $value = CustomizeContact::where('id',$id_contact)->first();

            if ($contact_array[0]['header_img']==null){
                $count_image = 0;
            }else{
                $count_image = count(json_decode($contact_array[0]['header_img']));
            }

            return view('backend.custom-page.contact-create', compact('value', 'count_image'));
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
        $contact_data = new CustomizeContact;
        $this->validate($request, 
        [
            'header_img.*' => 'image|mimes:png,jpg,jpeg,svg|max:10000',
        ],
        [
            'header_img.*.max' => 'The images must not be greater than 10 MB.',
        ]);

        if($request->hasFile('header_img')){
            $counter = 0;
            foreach($request->file('header_img') as $image){
                $getFileExt = $image->getClientOriginalExtension();
                $name=time().'CT'.$counter++.'.'.$getFileExt;
                $destinationPath = public_path().'/contact-asset/';
                
                $img = Image::make($image->getRealPath());
                $img->resize(1000, 1000, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationPath . $name, 80);
                // $image->move(public_path().'/about-asset/',$name); //folder path
                $data[] = $name;
            }
            $contact_data->header_img = json_encode($data);
        }else{
            $contact_data->header_img = NULL;
        }
        $contact_data->address = $request->address;
    	$contact_data->contact = $request->contact;
        $contact_data->operation_hour = $request->operation_hour;

        if($request->header_img==null && $request->address==null && $request->contact==null && $request->operation_hour==null){
            return redirect('/admin/customize/contact')->with('errorMsg', 'Nothing to customize');
        }else{
            $contact_data->save();
            return redirect('/admin/customize/contact')->with('success', 'Contact Us Page successfully edited');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CustomizeContact  $customizeContact
     * @return \Illuminate\Http\Response
     */
    public function show(CustomizeContact $customizeContact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CustomizeContact  $customizeContact
     * @return \Illuminate\Http\Response
     */
    public function edit(CustomizeContact $customizeContact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CustomizeContact  $customizeContact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $contact_data = CustomizeContact::findOrFail($id);
        if ($request->hasFile('header_img')) {
            request()->validate(
                ['header_img.*' => 'image|mimes:png,jpg,jpeg,svg|max:10000'],
                ['header_img.*.max' => 'The images must not be greater than 10 MB.']
            );

            $img_header = json_decode($contact_data->header_img);
            if ($img_header){
                foreach($img_header as $image){

                    $image_path = public_path().'/contact-asset/'.$image;

                    if(File::exists($image_path)) {
                        File::delete($image_path);
                    }
                }
                $counter = 0;
                foreach($request->file('header_img') as $image){
                    $getFileExt = $image->getClientOriginalExtension();
                    $name=time().'CT'.$counter++.'.'.$getFileExt;
                    $destinationPath = public_path().'/contact-asset/';
                
                    $img = Image::make($image->getRealPath());
                    $img->resize(1000, 1000, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save($destinationPath . $name, 80);
                    // $image->move(public_path().'/about-asset/',$name); //folder path
                    $data[] = $name;
                    $update = CustomizeContact::where('id', $id)->update([
                        'header_img' => json_encode($data)
                   ]);
                }
            }else{
                $counter = 0;
                foreach($request->file('header_img') as $image){
                    $getFileExt = $image->getClientOriginalExtension();
                    $name=time().'CT'.$counter++.'.'.$getFileExt;
                    $destinationPath = public_path().'/contact-asset/';
                
                    $img = Image::make($image->getRealPath());
                    $img->resize(1000, 1000, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save($destinationPath . $name, 80);
                    // $image->move(public_path().'/about-asset/',$name); //folder path
                    $data[] = $name;
                    $update = CustomizeContact::where('id', $id)->update([
                        'header_img' => json_encode($data)
                   ]);
                }
            }
            
        }
        $contact_data->address = $request->address;
    	$contact_data->contact = $request->contact;
        $contact_data->operation_hour = $request->operation_hour;
        $contact_data->update();
        return redirect('/admin/customize/contact')->with('success',' Contact Us Page successfully edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CustomizeContact  $customizeContact
     * @return \Illuminate\Http\Response
     */
    public function destroy(CustomizeContact $customizeContact)
    {
        //
    }
}
