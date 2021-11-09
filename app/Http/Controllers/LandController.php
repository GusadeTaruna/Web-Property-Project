<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\ZoningType;
use Illuminate\Support\Facades\File;
use AmrShawky\LaravelCurrency\Facade\Currency;

class LandController extends Controller
{
    //
    public function index(){
        $land = Property::where('property_type',2)->get();
        return view('backend.land.land-list', compact('land'));
    }

    public function create(){
        $land = Property::all();
        $land_type = ZoningType::all();
        $huruf = "L-";
        $count = Property::selectRaw('RIGHT(property_code, 1) as lastcode')->orderBy('lastcode', 'DESC')->where('property_type','=','2')->first();

        if(is_null($count)){
            $landCode = $huruf . sprintf("%03s", 1);
        }else{
            if($count->lastcode > 0) {
                $landCode = $huruf . sprintf("%03s", $count->lastcode+1);
            }
        }

        return view('backend.land.land-create',compact('landCode','land_type'));
        // dd($propertCode);
    }

    public function store(Request $request){

        $this->validate($request, 
        [
            'images' => 'required',
            'images.*' => 'image|mimes:png,jpg,jpeg,svg|max:1024'
        ],
        [
            'images.*.max' => 'The images must not be greater than 1 MB.'
        ]);

        if($request->hasFile('images')){
            $counter = 0;
            foreach($request->file('images') as $image){
                $getFileExt = $image->getClientOriginalExtension();
                $name=time().'LND'.$counter++.'.'.$getFileExt;
                $image->move(public_path().'/property-image/',$name); //folder path
                $data[] = $name;
            }
        }

        if($request->price==0){
            $price_usd = 0;
        }else{
            $price_usd = Currency::convert()
                        ->from($request->currency)
                        ->to('USD')
                        ->amount($request->price)
                        ->get();
        }

    	$property = new Property;
        $property->property_type = 2;
    	$property->property_code = $request->code;
		$property->property_name = $request->land_name;
		$property->property_location = $request->land_location;
        $property->property_image = json_encode($data);
        $property->currency = $request->currency;
		$property->price = $request->price;
        $property->price_usd = $price_usd;
        $property->video_link = $request->video;
		$property->property_status = $request->status;
		$property->site_plan = $request->site_plan;
        $property->site_area = $request->site_area;
        // $property->site_dimension = $request->site_dimension;
        $property->power_kv = $request->pln;
        $property->pdma_water = $request->pdma;
        $property->imb = $request->imb;
        $property->zoning = $request->zone_type;
        $property->description = $request->description;
        $property->bed_qty = $request->bed;
        $property->bath_qty = $request->bath;
        $property->garage_qty = $request->garage;
        $property->school_distance = $request->school;
        $property->hospital_distance = $request->hospital;
        $property->airport_distance = $request->airport;
        $property->supermarket_distance = $request->supermarket;
        $property->beach_distance = $request->beach;
        $property->fine_dining_distance = $request->dining;
        //additional land
        $property->topography_plan = $request->topography;
        $property->soil_test = $request->soil_test;
        $property->slope_ratio = $request->slope_ratio;
        $property->building_ratio = $request->building_ratio;
        $property->rain_avg_year = $request->rain_average;
        $property->humidity_avg_year = $request->humidity_average;
        $property->city_draw = $request->city_draw;
        $property->access_road = $request->access_road;
        $property->access_road_width = $request->road_width;
        $property->surrounding_sites_desc = $request->sites_description;
		$property->save();


        // dd($land);

        // $property->no_telepon = $validatedData['zoning_type'];

    	// User::create($validatedData);

    	// $request->session()->flash('success', 'Registrasi Berhasil! anda sekarang dapat Log In');

        if(!$property->save()){
            return back()->with('errorMsg', 'Error adding Data');
        }else{
            return redirect('/admin/land')->with('success', 'Land Data successfully added');
        }

    	// return redirect('/admin/dashboard')->with('success', 'Berhasil');

    }

    public function read($id){
        $land = Property::where('property_code',$id)->get();
        return view('backend.land.land-read', compact('land'));
    }

    public function edit($id)
    {
        $land = Property::where('property_code',$id)->get();
        $land_type = ZoningType::all();
        $count_image = count(json_decode($land['0']->property_image));
        // dd($count_image);
        return view('backend.land.land-edit', compact('land','land_type','count_image'));
        // return response()->json($post, 200); 
    }

    public function update(Request $request, $id)
    {
        $property = Property::findOrFail($id);


        if ($request->hasFile('images')) {
            request()->validate(
                ['images.*' => 'image|mimes:png,jpg,jpeg,svg|max:1024'],
                ['images.*.max' => 'The images must not be greater than 1 MB.']
            );

            $images = json_decode($property->property_image);
            foreach($images as $image){

                $image_path = public_path().'/property-image/'.$image;

                if(File::exists($image_path)) {
                    File::delete($image_path);
                }
            }

            $counter = 0;
            foreach($request->file('images') as $image){
                $getFileExt = $image->getClientOriginalExtension();
                $name=time().'PR'.$counter++.'.'.$getFileExt;
                $image->move(public_path().'/property-image/',$name); //folder path
                $data[] = $name;
            }
            $update = Property::where('id', $id)->update([
                 'property_image' => json_encode($data)
            ]);
        }

        if($request->price==0){
            $price_usd = 0;
        }else{
            $price_usd = Currency::convert()
                        ->from($request->currency)
                        ->to('USD')
                        ->amount($request->price)
                        ->get();
        }

        $property->property_type = 2;
    	$property->property_code = $request->code;
		$property->property_name = $request->land_name;
		$property->property_location = $request->land_location;
        $property->currency = $request->currency;
		$property->price = $request->price;
        $property->price_usd = $price_usd;
        $property->video_link = $request->video;
		$property->property_status = $request->status;
		$property->site_plan = $request->site_plan;
        $property->site_area = $request->site_area;
        // $property->site_dimension = $request->site_dimension;
        $property->power_kv = $request->pln;
        $property->pdma_water = $request->pdma;
        $property->imb = $request->imb;
        $property->zoning = $request->zone_type;
        $property->description = $request->description;
        $property->bed_qty = $request->bed;
        $property->bath_qty = $request->bath;
        $property->garage_qty = $request->garage;
        $property->school_distance = $request->school;
        $property->hospital_distance = $request->hospital;
        $property->airport_distance = $request->airport;
        $property->supermarket_distance = $request->supermarket;
        $property->beach_distance = $request->beach;
        $property->fine_dining_distance = $request->dining;
        //additional land
        $property->topography_plan = $request->topography;
        $property->soil_test = $request->soil_test;
        $property->slope_ratio = $request->slope_ratio;
        $property->building_ratio = $request->building_ratio;
        $property->rain_avg_year = $request->rain_average;
        $property->humidity_avg_year = $request->humidity_average;
        $property->city_draw = $request->city_draw;
        $property->access_road = $request->access_road;
        $property->access_road_width = $request->road_width;
        $property->surrounding_sites_desc = $request->sites_description;
        $property->update();
             
       return redirect('/admin/land')->with('success',' Data updated successfully!');
    }

    public function destroy($id)
    {
        $property = Property::findOrFail($id);
        $images = json_decode($property->property_image); //mecah array multi image
        foreach($images as $image){

            $image_path = public_path().'/property-image/'.$image; //ambil 1 1 image yang ada di array

            if(File::exists($image_path)) { //kalo file imagenya ada
                File::delete($image_path); //hapus dari folder local
            }
        }

        $property->delete();

        if($property){
         //redirect dengan pesan sukses
         return redirect('/admin/land')->with('success',' Data deleted successfully!');
        }else{
        //redirect dengan pesan error
        return redirect('/admin/land')->with('error','Error Deleting Data!');
        }
    }
}
