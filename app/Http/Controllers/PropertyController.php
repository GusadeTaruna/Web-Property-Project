<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\ZoningType;
use Illuminate\Support\Facades\File;
use AmrShawky\LaravelCurrency\Facade\Currency;

class PropertyController extends Controller
{
    //
    public function index(){
        $property = Property::where('property_type',1)->get();
        return view('backend.property.property-list',compact('property'));
    }

    public function create(){
        $property = Property::all();
        $property_type = ZoningType::all();
        $huruf = "PB-";
        $count = Property::selectRaw('RIGHT(property_code, 1) as lastcode')->orderBy('lastcode', 'DESC')->where('property_type','=','1')->first();

        if(is_null($count)){
            $propertyCode = $huruf . sprintf("%03s", 1);
        }else{
            if($count->lastcode > 0) {
                $propertyCode = $huruf . sprintf("%03s", $count->lastcode+1);
            }
        }
        
        return view('backend.property.property-create',compact('propertyCode','property_type'));
        // dd($count);
    }

    public function store(Request $request){

        $check_input = $request->filled(['code', 'property_name','location','price','currency','status','site_plan','site_area','building_area','power_kv','generator'
        ,'pdma','imb','description','bed','bath','garage','school','hospital','airport','supermarket','beach','dining']);
        if($check_input){

            $validatedData = $request->validate([
                'code' => 'required',
                'property_name' => 'required',
                'location' => 'required',
                'price' => 'required',
                'currency' => 'required',
                'status' => 'required',
                'site_plan' => 'required',
                'site_area' => 'required',
                'building_area' => 'required',
                'power_kv' => 'required',
                'generator' => 'required',
                'pdma' => 'required',
                'imb' => 'required',
                // 'zoning_type' => 'required',
                'description' => 'required',
                'bed' => 'required',
                'bath' => 'required',
                'garage' => 'required',
                'school' => 'required',
                'hospital' => 'required',
                'airport' => 'required',
                'supermarket' => 'required',
                'beach' => 'required',
                'dining' => 'required'
            ],
            [
                'code.required' => 'You must enter the code of the property data',
                'property_name.required' => 'You must enter the name of the property data',
                'location.required' => 'You must enter the location of the property data',
                'price.required' => 'You must enter the price of the property data',
                'status.required' => 'You must enter the status of the property data',
                'site_plan.required' => 'You must enter the site plan of the property data',
                'site_area.required' => 'You must enter the site area of the property data',
                'building_area.required' => 'You must enter the building area of the property data',
                'power_kv.required' => 'You must enter the PLN / Power (kV) of the property data',
                'generator.required' => 'You must enter the Generator (kV) of the property data',
                'pdma.required' => 'You must enter the PDMA Water of the property data',
                'imb.required' => 'You must enter the IMB of the property data',
                'description.required' => 'You must enter the description of the property data',
                'bed.required' => 'You must enter the Bed quantity of the property data',
                'bath.required' => 'You must enter the Bath quantity of the property data',
                'garage.required' => 'You must enter the Garage quantity of the property data',
                'school.required' => 'You must enter the School distance',
                'hospital.required' => 'You must enter the Hospital distance',
                'airport.required' => 'You must enter the Airport distance',
                'supermarket.required' => 'You must enter the Supermarket distance',
                'beach.required' => 'You must enter the Beach distance',
                'dining.required' => 'You must enter the Fine Dining distance'
            ]);
    
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
    
            // dd($request->price);
    
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
            $property->property_type = 1;
            $property->property_code = $validatedData['code'];
            $property->property_name = $validatedData['property_name'];
            $property->property_location = $validatedData['location'];
            $property->property_image = json_encode($data);
            $property->currency = $validatedData['currency'];
            $property->price = $validatedData['price'];
            $property->price_usd = $price_usd;
            $property->video_link = $request->video;
            $property->property_status = $validatedData['status'];
            $property->site_plan = $validatedData['site_plan'];
            $property->site_area = $validatedData['site_area'];
            $property->building_area = $validatedData['building_area'];
            $property->power_kv = $validatedData['power_kv'];
            $property->generator_kv = $validatedData['generator'];
            $property->pdma_water = $validatedData['pdma'];
            $property->imb = $validatedData['imb'];
            $property->zoning = $request->zoning_type;
            $property->description = $validatedData['description'];
            $property->bed_qty = $validatedData['bed'];
            $property->bath_qty = $validatedData['bath'];
            $property->garage_qty = $validatedData['garage'];
            $property->school_distance = $validatedData['school'];
            $property->hospital_distance = $validatedData['hospital'];
            $property->airport_distance = $validatedData['airport'];
            $property->supermarket_distance = $validatedData['supermarket'];
            $property->beach_distance = $validatedData['beach'];
            $property->fine_dining_distance = $validatedData['dining'];
            $property->data_status = "Published";
            $property->save();
    
            if(!$property->save()){
                return back()->with('errorMsg', 'Error adding Data');
            }else{
                return redirect('/admin/property')->with('success', 'Property Data successfully added');
            }

        }else{
            
            $this->validate($request, 
            [
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
    
            // dd($request->price);
    
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
            $property->property_type = 1;
            $property->property_code = $request->code;
            $property->property_name = $request->property_name;
            $property->property_location = $request->location;
    
            if(is_null($request->images)){
                $property->property_image = $request->images;
            }else{
                $property->property_image = json_encode($data);
            }
            
            $property->currency = $request->currency;
            $property->price = $request->price;
            $property->price_usd = $price_usd;
            $property->video_link = $request->video;
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
            $property->bed_qty = $request->bed;
            $property->bath_qty = $request->bath;
            $property->garage_qty = $request->garage;
            $property->school_distance = $request->school;
            $property->hospital_distance = $request->hospital;
            $property->airport_distance = $request->airport;
            $property->supermarket_distance = $request->supermarket;
            $property->beach_distance = $request->beach;
            $property->fine_dining_distance = $request->dining;
            $property->data_status = "Draft";
            $property->save();
    
            if(!$property->save()){
                return back()->with('errorMsg', 'Error adding Data');
            }else{
                return redirect('/admin/property')->with('success', 'Property Data successfully drafted ');
            }
        }


        // dd($property->id);

        // dd($property);

        // $property->no_telepon = $validatedData['zoning_type'];

    	// User::create($validatedData);

    	// $request->session()->flash('success', 'Registrasi Berhasil! anda sekarang dapat Log In');
        
    }

    public function read($id){
        $property = Property::where('property_code',$id)->get();
        return view('backend.property.property-read', compact('property'));
    }


    public function edit($id)
    {
        $property = Property::where('property_code',$id)->get();
        $property_type = ZoningType::all();
        if(is_null($property['0']->property_image)){
            $count_image = 0;
        }else{
            $count_image = count(json_decode($property['0']->property_image));
        }
        
        // dd($count_image);
        return view('backend.property.property-edit', compact('property','property_type','count_image'));
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
            if($images){
                foreach($images as $image){

                    $image_path = public_path().'/property-image/'.$image;
    
                    if(File::exists($image_path)) {
                        File::delete($image_path);
                    }
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

        // dd($price_usd);

        $property->property_type = 1;
        $property->property_code = $request->code;
        $property->property_name = $request->property_name;
        $property->property_location = $request->location;
        $property->currency = $request->currency;
        $property->price = $request->price;
        $property->price_usd = $price_usd;
        $property->video_link = $request->video;
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
        $property->bed_qty = $request->bed;
        $property->bath_qty = $request->bath;
        $property->garage_qty = $request->garage;
        $property->school_distance = $request->school;
        $property->hospital_distance = $request->hospital;
        $property->airport_distance = $request->airport;
        $property->supermarket_distance = $request->supermarket;
        $property->beach_distance = $request->beach;
        $property->fine_dining_distance = $request->dining;

        $check_input = $request->filled(['code', 'property_name','location','price','currency','status','site_plan','site_area','building_area','power_kv','generator'
        ,'pdma','imb','video','description','bed','bath','garage','school','hospital','airport','supermarket','beach','dining']);
        if($check_input){
            $property->data_status = "Published";
        }else{
            $property->data_status = "Draft";
        }
        
        $property->update();

             
       return redirect('/admin/property')->with('success',' Data updated successfully!');
    }

    public function destroy($id)
    {
        $property = Property::findOrFail($id);
        $images = json_decode($property->property_image); //mecah array multi image
        if($images){
            foreach($images as $image){

                $image_path = public_path().'/property-image/'.$image; //ambil 1 1 image yang ada di array
    
                if(File::exists($image_path)) { //kalo file imagenya ada
                    File::delete($image_path); //hapus dari folder local
                }
            }
        }

        $property->delete();

        if($property){
         //redirect dengan pesan sukses
         return redirect('/admin/property')->with('success',' Data deleted successfully!');
        }else{
        //redirect dengan pesan error
        return redirect('/admin/property')->with('error','Error Deleting Data!');
        }
    }
}
