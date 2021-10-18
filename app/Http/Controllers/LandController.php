<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Land;
use App\Models\LandZoningType;

class LandController extends Controller
{
    //
    public function index(){
        return view('backend.land.land-list');
    }

    public function create(){
        $land = Land::all();
        $land_type = LandZoningType::all();
        $huruf = "L-";
        $count = Land::count();

        if($count > 0) {
            $landCode = $huruf . sprintf("%03s", $count+1);
        }else {
            $landCode = $huruf . sprintf("%03s", 1);
        }
        
        return view('backend.land.land-create',compact('landCode','land_type'));
        // dd($propertCode);
    }

    public function store(Request $request){

    	$land = new Land;
    	$land->land_code = $request->code;
		$land->land_name = $request->land_name;
		$land->land_location = $request->land_location;
		$land->price = $request->price;
		$land->land_status = $request->status;
		$land->site_plan = $request->site_plan;
        $land->site_area = $request->site_area;
        $land->site_dimensions = $request->site_dimension;
        $land->power_kv = $request->pln;
        $land->pdma_water = $request->pdma;
        $land->imb = $request->imb;
        $land->description = $request->description;
        $land->school_distance = $request->school;
        $land->hospital_distance = $request->hospital;
        $land->airport_distance = $request->airport;
        $land->supermarket_distance = $request->supermarket;
        $land->beach_distance = $request->beach;
        $land->fine_dining_distance = $request->dining;
		$land->save();


        // dd($land);

        // $property->no_telepon = $validatedData['zoning_type'];

    	// User::create($validatedData);

    	// $request->session()->flash('success', 'Registrasi Berhasil! anda sekarang dapat Log In');

    	return redirect('/admin/dashboard')->with('success', 'Berhasil');

    }
}
