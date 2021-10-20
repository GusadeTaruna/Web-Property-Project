<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\ZoningType;

class LandController extends Controller
{
    //
    public function index(){
        return view('backend.land.land-list');
    }

    public function create(){
        $land = Property::all();
        $land_type = ZoningType::all();
        $huruf = "L-";
        $count = Property::where('property_type', 'Land')->count();

        if($count > 0) {
            $landCode = $huruf . sprintf("%03s", $count+1);
        }else {
            $landCode = $huruf . sprintf("%03s", 1);
        }
        
        return view('backend.land.land-create',compact('landCode','land_type'));
        // dd($propertCode);
    }

    public function store(Request $request){

    	$property = new Property;
        $property->property_type = "Land";
    	$property->property_code = $request->code;
		$property->property_name = $request->land_name;
		$property->property_location = $request->land_location;
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
		$property->save();


        // dd($land);

        // $property->no_telepon = $validatedData['zoning_type'];

    	// User::create($validatedData);

    	// $request->session()->flash('success', 'Registrasi Berhasil! anda sekarang dapat Log In');

    	return redirect('/admin/dashboard')->with('success', 'Berhasil');

    }
}
