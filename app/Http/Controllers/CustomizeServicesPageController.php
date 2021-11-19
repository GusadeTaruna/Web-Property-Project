<?php

namespace App\Http\Controllers;

use App\Models\CustomizeServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CustomizeServicesPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $services = CustomizeServices::all();
        return view('backend.custom-page.services.service-index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.custom-page.services.service-create');
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
        $this->validate($request, 
        [
            'service_image' => 'required',
            'service_image.*' => 'image|mimes:png,jpg,jpeg,svg|max:1024'
        ],
        [
            'service_image.*.max' => 'The images must not be greater than 1 MB.'
        ]);

        if($request->hasFile('service_image')){
            $counter = 0;
            foreach($request->file('service_image') as $image){
                $getFileExt = $image->getClientOriginalExtension();
                $name=time().'SRV'.$counter++.'.'.$getFileExt;
                $image->move(public_path().'/service-asset/',$name); //folder path
                $data[] = $name;
            }
        }

        $services = new CustomizeServices;
    	$services->service_name = $request->service_name;
        $services->service_desc = $request->service_desc;
        $services->service_img = json_encode($data);
        $services->save();

        if(!$services->save()){
            return back()->with('errorMsg', 'Error adding Data');
        }else{
            return redirect('/admin/customize/services')->with('success', 'Service Data successfully added');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CustomizeServices  $customizeServices
     * @return \Illuminate\Http\Response
     */
    public function show(CustomizeServices $customizeServices)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CustomizeServices  $customizeServices
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $services = CustomizeServices::where('id',$id)->get();
        return view('backend.custom-page.services.service-edit', compact('services'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CustomizeServices  $customizeServices
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $services = CustomizeServices::findOrFail($id);

        if ($request->hasFile('service_image')) {
            request()->validate(
                ['service_image.*' => 'image|mimes:png,jpg,jpeg,svg|max:1024'],
                ['service_image.*.max' => 'The images must not be greater than 1 MB.']
            );

            $images = json_decode($services->service_img);
            foreach($images as $image){

                $image_path = public_path().'/service-asset/'.$image;

                if(File::exists($image_path)) {
                    File::delete($image_path);
                }
            }

            $counter = 0;
            foreach($request->file('service_image') as $image){
                $getFileExt = $image->getClientOriginalExtension();
                $name=time().'SRV'.$counter++.'.'.$getFileExt;
                $image->move(public_path().'/service-asset/',$name); //folder path
                $data[] = $name;
            }
            $update = CustomizeServices::where('id', $id)->update([
                 'service_img' => json_encode($data)
            ]);
        }

        $services->service_name = $request->service_name;
        $services->service_desc = $request->service_desc;
        $services->update();

        return redirect('/admin/customize/services')->with('success', 'Service Data successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CustomizeServices  $customizeServices
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $services = CustomizeServices::findOrFail($id);
        $images = json_decode($services->service_img); //mecah array multi image
        foreach($images as $image){

            $image_path = public_path().'/service-asset/'.$image; //ambil 1 1 image yang ada di array

            if(File::exists($image_path)) { //kalo file imagenya ada
                File::delete($image_path); //hapus dari folder local
            }
        }

        $services->delete();

        if($services){
         //redirect dengan pesan sukses
            return redirect('/admin/customize/services')->with('success',' Data deleted successfully!');
        }else{
        //redirect dengan pesan error
            return redirect('/admin/customize/services')->with('errorMsg','Error Deleting Data!');
        }
    }
}
