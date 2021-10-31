<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\ZoningType;

class PropertyController extends Controller
{
    //
    public function index(){
        $property = Property::join('zoning_type', 'property_list.zoning', '=', 'zoning_type.id')->where('property_type',1)->get();
        return view('backend.property.property-list',compact('property'));
    }

    public function create(){
        $property = Property::all();
        $property_type = ZoningType::all();
        $huruf = "PB-";
        $count = Property::selectRaw('RIGHT(property_code, 1) as lastcode')->orderBy('lastcode', 'DESC')->first();

        if($count->lastcode > 0) {
            $propertyCode = $huruf . sprintf("%03s", $count->lastcode+1);
        }else {
            $propertyCode = $huruf . sprintf("%03s", 1);
        }
        
        return view('backend.property.property-create',compact('propertyCode','property_type'));
        // dd($count);
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

        //upload image function
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
                $name=time().'PR'.$counter++.'.'.$getFileExt;
                $image->move(public_path().'/property-image/',$name); //folder path
                $data[] = $name;
            }
        }

    	$property = new Property;
        $property->property_type = 1;
    	$property->property_code = $request->code;
		$property->property_name = $request->property_name;
		$property->property_location = $request->location;
        $property->property_image = json_encode($data);
		$property->price = $request->price;
		$property->property_status = $request->status;
		$property->site_plan = $request->site_plan;
        $property->site_area = $request->site_area;
        $property->building_area = $request->building_area;
        $property->power_kv = $request->power_kv;
        $property->generator_kv = $request->generator;
        $property->pdma_water = $request->pdma;
        $property->imb = $request->imb;
        $property->zoning = $request->zoning_type;
        $property->description = $request->description;
        $property->school_distance = $request->school;
        $property->hospital_distance = $request->hospital;
        $property->airport_distance = $request->airport;
        $property->supermarket_distance = $request->supermarket;
        $property->beach_distance = $request->beach;
        $property->fine_dining_distance = $request->dining;
		$property->save();

        if(!$property->save()){
            return back()->with('errorMsg', 'Error adding Data');
        }else{
            return redirect('/admin/property')->with('success', 'Property Data successfully added');
        }

        // dd($property->id);

        // dd($property);

        // $property->no_telepon = $validatedData['zoning_type'];

    	// User::create($validatedData);

    	// $request->session()->flash('success', 'Registrasi Berhasil! anda sekarang dapat Log In');
        
    }
}
