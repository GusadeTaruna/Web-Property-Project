<?php

namespace App\Http\Controllers;

use App\Models\CustomizeServices;
use App\Models\ServicePage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Image;

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

    public function createPage()
    {
        //
        $service_check = ServicePage::all();
        $service_array = $service_check->toArray();
        // dd($homepage_array);
        if($service_check->isEmpty()){
            $value = [];
            return view('backend.custom-page.services.page-services.page-services-create', compact('value'));
        }else{
            $id_service = $service_array[0]['id'];
            $value = ServicePage::where('id',$id_service)->first();

            if ($service_array[0]['header_img']==null){
                $count_image = 0;
            }else{
                $count_image = count(json_decode($service_array[0]['header_img']));
            }

            return view('backend.custom-page.services.page-services.page-services-create', compact('value','count_image'));
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
        $this->validate($request, 
        [
            'service_image' => 'required',
            'service_image.*' => 'image|mimes:png,jpg,jpeg,svg|max:10000'
        ],
        [
            'service_image.*.max' => 'The images must not be greater than 10 MB.'
        ]);

        if($request->hasFile('service_image')){
            $counter = 0;
            foreach($request->file('service_image') as $image){
                $getFileExt = $image->getClientOriginalExtension();
                $name=time().'SRV'.$counter++.'.'.$getFileExt;
                $destinationPath = public_path().'/service-asset/';
                
                $img = Image::make($image->getRealPath());
                $img->resize(1000, 1000, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationPath . $name, 80);
                // $image->move(public_path().'/service-asset/',$name); //folder path
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

    public function storePage(Request $request){
        $service = new ServicePage;

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
                $name=time().'SER'.$counter++.'.'.$getFileExt;
                $destinationPath = public_path().'/service-asset/';
                
                $img = Image::make($image->getRealPath());
                $img->resize(1000, 1000, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationPath . $name, 80);
                // $image->move(public_path().'/about-asset/',$name); //folder path
                $data[] = $name;
            }
            $service->header_img = json_encode($data);
        }else{
            $service->header_img = NULL;
        }

        if($request->header_img==null){
            return redirect('/admin/customize/services/create/page')->with('errorMsg', 'Nothing to customize');
        }else{
            $service->save();
            return redirect('/admin/customize/services/create/page')->with('success', 'Service Page successfully edited');
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
                ['service_image.*' => 'image|mimes:png,jpg,jpeg,svg|max:10000'],
                ['service_image.*.max' => 'The images must not be greater than 10 MB.']
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
                $destinationPath = public_path().'/service-asset/';
                
                $img = Image::make($image->getRealPath());
                $img->resize(1000, 1000, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationPath . $name, 80);
                // $image->move(public_path().'/service-asset/',$name); //folder path
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

    public function updatePage(Request $request, $id){
        $service = ServicePage::findOrFail($id);

        if ($request->hasFile('header_img')) {
            request()->validate(
                ['header_img.*' => 'image|mimes:png,jpg,jpeg,svg|max:10000'],
                ['header_img.*.max' => 'The images must not be greater than 10 MB.']
            );

            $img_header = json_decode($service->header_img);
            if ($img_header){
                foreach($img_header as $image){

                    $image_path = public_path().'/service-asset/'.$image;

                    if(File::exists($image_path)) {
                        File::delete($image_path);
                    }
                }
                $counter = 0;
                foreach($request->file('header_img') as $image){
                    $getFileExt = $image->getClientOriginalExtension();
                    $name=time().'SER'.$counter++.'.'.$getFileExt;
                    $destinationPath = public_path().'/service-asset/';
                
                    $img = Image::make($image->getRealPath());
                    $img->resize(1000, 1000, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save($destinationPath . $name, 80);
                    // $image->move(public_path().'/about-asset/',$name); //folder path
                    $data[] = $name;
                    $update = ServicePage::where('id', $id)->update([
                        'header_img' => json_encode($data)
                   ]);
                }
            }else{
                $counter = 0;
                foreach($request->file('header_img') as $image){
                    $getFileExt = $image->getClientOriginalExtension();
                    $name=time().'SER'.$counter++.'.'.$getFileExt;
                    $destinationPath = public_path().'/service-asset/';
                
                    $img = Image::make($image->getRealPath());
                    $img->resize(1000, 1000, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save($destinationPath . $name, 80);
                    // $image->move(public_path().'/about-asset/',$name); //folder path
                    $data[] = $name;
                    $update = ServicePage::where('id', $id)->update([
                        'header_img' => json_encode($data)
                   ]);
                }
            }
            
        }
        $service->update();
        return redirect('/admin/customize/services/create/page')->with('success',' Services Page successfully edited');
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
