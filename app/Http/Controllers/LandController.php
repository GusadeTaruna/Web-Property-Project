<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\ZoningType;

class LandController extends Controller
{
    //
    public function index(){
        $land = Property::join('zoning_type', 'property_list.zoning', '=', 'zoning_type.id')->where('property_type',2)->get();
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

    	$property = new Property;
        $property->property_type = 2;
    	$property->property_code = $request->code;
		$property->property_name = $request->land_name;
		$property->property_location = $request->land_location;
        $property->property_image = json_encode($data);
		$property->price = $request->price;
		$property->property_status = $request->status;
		$property->site_plan = $request->site_plan;
        $property->site_area = $request->site_area;
        $property->site_dimension = $request->site_dimension;
        $property->power_kv = $request->pln;
        $property->pdma_water = $request->pdma;
        $property->imb = $request->imb;
        $property->zoning = $request->zone_type;
        $property->description = $request->description;
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
}
