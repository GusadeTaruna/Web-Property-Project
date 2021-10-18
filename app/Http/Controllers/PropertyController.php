<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\PropertyZoningType;

class PropertyController extends Controller
{
    //
    public function index(){
        return view('backend.property.property-list');
    }

    public function create(){
        $property = Property::all();
        $property_type = PropertyZoningType::all();
        $huruf = "PB-";
        $count = Property::count();

        if($count > 0) {
            $propertyCode = $huruf . sprintf("%03s", $count+1);
        }else {
            $propertyCode = $huruf . sprintf("%03s", 1);
        }
        
        return view('backend.property.property-create',compact('propertyCode','property_type'));
        // dd($propertCode);
    }

    public function store(Request $request){

        // $validatedData = $request->validate([
    	// 	'code' => 'required',
    	// 	'property_name' => 'required',
    	// 	'location' => 'required',
    	// 	'price' => 'required',
    	// 	'status' => 'required',
    	// 	'site_plan' => 'required',
    	// 	'site_area' => 'required',
        //     'building_area' => 'required',
        //     'power_kv' => 'required',
        //     'generator' => 'required',
        //     'pdma' => 'required',
        //     'imb' => 'required',
        //     // 'zoning_type' => 'required',
        //     'description' => 'required',
        //     'school' => 'required',
        //     'hospital' => 'required',
        //     'airport' => 'required',
        //     'supermarket' => 'required',
        //     'beach' => 'required',
        //     'dining' => 'required'
    	// ]);

    	$property = new Property;
    	$property->property_code = $request->code;
		$property->property_name = $request->property_name;
		$property->property_location = $request->location;
		$property->price = $request->price;
		$property->property_status = $request->status;
		$property->site_plan = $request->site_plan;
        $property->site_area = $request->site_area;
        $property->building_area = $request->building_area;
        $property->power_kv = $request->power_kv;
        $property->generator_kv = $request->generator;
        $property->pdma_water = $request->pdma;
        $property->imb = $request->imb;
        $property->description = $request->description;
        $property->school_distance = $request->school;
        $property->hospital_distance = $request->hospital;
        $property->airport_distance = $request->airport;
        $property->supermarket_distance = $request->supermarket;
        $property->beach_distance = $request->beach;
        $property->fine_dining_distance = $request->dining;
		$property->save();


        dd($property->id);

        // dd($property);

        // $property->no_telepon = $validatedData['zoning_type'];

    	// User::create($validatedData);

    	// $request->session()->flash('success', 'Registrasi Berhasil! anda sekarang dapat Log In');

    	// return redirect('/admin/dashboard')->with('success', 'Berhasil');

    }
}
