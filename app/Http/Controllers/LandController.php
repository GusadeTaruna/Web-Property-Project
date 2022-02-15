<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\ZoningType;
use Illuminate\Support\Facades\File;
use AmrShawky\LaravelCurrency\Facade\Currency;
use Image;

class LandController extends Controller
{
    //
    public function index()
    {
        $land = Property::where('property_type', 2)->get();
        return view('backend.land.land-list', compact('land'));
    }

    public function create()
    {
        $land = Property::all();
        $land_type = ZoningType::all();
        $huruf = "L-";
        $count = Property::selectRaw('SUBSTRING(property_code, 4) as lastcode')->orderBy('lastcode', 'DESC')->where('property_type', '=', '2')->first();

        if (is_null($count)) {
            $landCode = $huruf . sprintf("%03s", 1);
        } else {
            if ($count->lastcode > 0) {
                $landCode = $huruf . sprintf("%03s", $count->lastcode + 1);
            }
        }

        return view('backend.land.land-create', compact('landCode', 'land_type'));
        // dd($propertCode);
    }

    public function store(Request $request)
    {
        // $check_input = $request->filled(['code', 'land_name','land_location','price','currency','status','site_plan','site_area','pln'
        // ,'pdma','imb','description','school','hospital','airport','supermarket','beach','dining']);

        if ($request->btn_submit == "publish_btn") {

            $validatedData = $request->validate(
                [
                    'code' => 'required',
                    'land_name' => 'required',
                    'land_location' => 'required',
                    'price' => 'required',
                    'currency' => 'required',
                    'status' => 'required',
                    'site_area' => 'required',
                    'images' => 'required',
                    'zone_type' => 'required',
                    'images.*' => 'image|mimes:png,jpg,jpeg,svg|max:10000',
                    'images_thumbnail' => 'required',
                    'images_thumbnail.*' => 'image|mimes:png,jpg,jpeg,svg|max:10000'

                ],
                [
                    'code.required' => 'You must enter the code of the land data',
                    'land_name.required' => 'You must enter the name of the land data',
                    'land_location.required' => 'You must enter the location of the land data',
                    'price.required' => 'You must enter the price of the land data',
                    'status.required' => 'You must enter the status of the land data',
                    'site_area.required' => 'You must enter the site area of the land data',
                    'zone_type.required' => 'You must choose the zoning type of the land',
                    'images.required' => 'You must add at least 1 image (Please re-add the image if an error occurs when inputting the form)',
                    'images.*.max' => 'The images must not be greater than 10 MB.',
                    'images_thumbnail.required' => 'You must add at least 1 thumbnail (Please re-add the image if an error occurs when inputting the form)',
                    'images_thumbnail.*.max' => 'The images must not be greater than 10 MB.',
                ]
            );

            // $this->validate($request, 
            // [

            // ],
            // [


            // ]);

            if ($request->hasFile('images')) {
                $counter = 0;
                foreach ($request->file('images') as $image) {
                    $getFileExt = $image->getClientOriginalExtension();
                    $name = time() . 'LND' . $counter++ . '.' . $getFileExt;
                    $destinationPath = public_path() . '/property-image/';

                    $img = Image::make($image->getRealPath());
                    $img->resize(1000, 1000, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save($destinationPath . $name, 80);
                    // $image->move(public_path().'/property-image/',$name); //folder path
                    $data[] = $name;
                }
            }

            if ($request->hasFile('images_thumbnail')) {
                $counter = 0;
                foreach ($request->file('images_thumbnail') as $thumbnail) {
                    $getFileExt = $thumbnail->getClientOriginalExtension();
                    $name = time() . 'LNDT' . $counter++ . '.' . $getFileExt;
                    $destinationPath = public_path() . '/property-image/';

                    $img = Image::make($thumbnail->getRealPath());
                    $img->resize(1000, 1000, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save($destinationPath . $name, 80);
                    // $image->move(public_path().'/property-image/',$name); //folder path
                    $data_thumbnail[] = $name;
                }
            }

            if ($request->price == 0) {
                $price_usd = 0;
            } else {
                $price_usd = Currency::convert()
                    ->from($request->currency)
                    ->to('USD')
                    ->amount($request->price)
                    ->get();
            }

            $property = new Property;
            $property->property_type = 2;
            $property->property_code = $validatedData['code'];
            $property->property_name = $validatedData['land_name'];
            $property->property_location = $validatedData['land_location'];
            $property->property_image = json_encode($data);
            $property->property_thumbnail = json_encode($data_thumbnail);
            $property->currency = $validatedData['currency'];
            $property->price = $validatedData['price'];
            $property->price_usd = $price_usd;
            $property->video_link = $request->video;
            $property->property_status = $validatedData['status'];
            $property->site_plan = $request->site_plan;
            $property->site_area = $validatedData['site_area'];
            // $property->site_dimension = $request->site_dimension;
            $property->power_kv = 0;
            $property->pdma_water = $request->pdma;
            $property->imb = $request->imb;
            if (is_null($request->zone_type) || $request->zone_type == "other") {
                $property->zoning = $request->zone_type_string;
            } else {
                $property->zoning = $request->zone_type;
            }
            // $property->zoning = $request->zone_type;
            $property->description = $request->description;
            $property->bed_qty = 0;
            $property->bath_qty = 0;
            $property->garage_qty = 0;
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
            $property->data_status = "Published";
            $property->save();


            // dd($land);

            // $property->no_telepon = $validatedData['zoning_type'];

            // User::create($validatedData);

            // $request->session()->flash('success', 'Registrasi Berhasil! anda sekarang dapat Log In');

            if (!$property->save()) {
                return back()->with('errorMsg', 'Error adding Data');
            } else {
                return redirect('/admin/land')->with('success', 'Land Data successfully added');
            }
        } elseif ($request->btn_submit == "draft_btn") {

            $this->validate(
                $request,
                [
                    'images_thumbnail.*' => 'image|mimes:png,jpg,jpeg,svg|max:10000',
                    'images.*' => 'image|mimes:png,jpg,jpeg,svg|max:10000'
                ],
                [
                    'images_thumbnail.*.max' => 'The images must not be greater than 10 MB.',
                    'images.*.max' => 'The images must not be greater than 10 MB.'
                ]
            );

            if ($request->hasFile('images')) {
                $counter = 0;
                foreach ($request->file('images') as $image) {
                    $getFileExt = $image->getClientOriginalExtension();
                    $name = time() . 'LND' . $counter++ . '.' . $getFileExt;
                    $destinationPath = public_path() . '/property-image/';

                    $img = Image::make($image->getRealPath());
                    $img->resize(1000, 1000, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save($destinationPath . $name, 80);
                    // $image->move(public_path().'/property-image/',$name); //folder path
                    $data[] = $name;
                }
            }

            if ($request->hasFile('images_thumbnail')) {
                $counter = 0;
                foreach ($request->file('images_thumbnail') as $thumbnail) {
                    $getFileExt = $thumbnail->getClientOriginalExtension();
                    $name = time() . 'LNDT' . $counter++ . '.' . $getFileExt;
                    $destinationPath = public_path() . '/property-image/';

                    $img = Image::make($thumbnail->getRealPath());
                    $img->resize(1000, 1000, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save($destinationPath . $name, 80);
                    // $image->move(public_path().'/property-image/',$name); //folder path
                    $data_thumbnail[] = $name;
                }
            }

            if ($request->price == 0) {
                $price_usd = 0;
            } else {
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
            if (is_null($request->images)) {
                $property->property_image = $request->images;
            } else {
                $property->property_image = json_encode($data);
            }
            if (is_null($request->images_thumbnail)) {
                $property->property_thumbnail = $request->images_thumbnail;
            } else {
                $property->property_thumbnail = json_encode($data_thumbnail);
            }
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
            if (is_null($request->zone_type) || $request->zone_type == "other") {
                $property->zoning = $request->zone_type_string;
            } else {
                $property->zoning = $request->zone_type;
            }
            // $property->zoning = $request->zone_type;
            $property->description = $request->description;
            $property->bed_qty = 0;
            $property->bath_qty = 0;
            $property->garage_qty = 0;
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
            $property->data_status = "Draft";
            $property->save();


            // dd($land);

            // $property->no_telepon = $validatedData['zoning_type'];

            // User::create($validatedData);

            // $request->session()->flash('success', 'Registrasi Berhasil! anda sekarang dapat Log In');

            if (!$property->save()) {
                return back()->with('errorMsg', 'Error adding Data');
            } else {
                return redirect('/admin/land')->with('success', 'Land Data successfully added');
            }
        }

        // return redirect('/admin/dashboard')->with('success', 'Berhasil');

    }

    public function read($id)
    {
        $land = Property::where('property_code', $id)->get();
        return view('backend.land.land-read', compact('land'));
    }

    public function edit($id)
    {
        $land = Property::where('property_code', $id)->get();
        $land_type = ZoningType::all();
        if (is_null($land['0']->property_image)) {
            $count_image = 0;
        } else {
            $count_image = count(json_decode($land['0']->property_image));
        }

        if (is_null($land['0']->property_thumbnail)) {
            $count_thumbnail = 0;
        } else {
            $count_thumbnail = count(json_decode($land['0']->property_thumbnail));
        }
        // dd($count_image);
        return view('backend.land.land-edit', compact('land', 'land_type', 'count_image', 'count_thumbnail'));
        // return response()->json($post, 200); 
    }

    public function update(Request $request, $id)
    {
        $property = Property::findOrFail($id);
        $check_image_db = $property->property_image;
        $check_thumbnail_db = $property->property_thumbnail;

        if ($request->hasFile('images')) {
            request()->validate(
                ['images.*' => 'image|mimes:png,jpg,jpeg,svg|max:10000'],
                ['images.*.max' => 'The images must not be greater than 10 MB.']
            );

            $images = json_decode($property->property_image);
            if ($images) {
                foreach ($images as $image) {

                    $image_path = public_path() . '/property-image/' . $image;

                    if (File::exists($image_path)) {
                        File::delete($image_path);
                    }
                }
            }

            $counter = 0;
            foreach ($request->file('images') as $image) {
                $getFileExt = $image->getClientOriginalExtension();
                $name = time() . 'LND' . $counter++ . '.' . $getFileExt;
                $destinationPath = public_path() . '/property-image/';

                $img = Image::make($image->getRealPath());
                $img->resize(1000, 1000, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationPath . $name, 80);
                // $image->move(public_path().'/property-image/',$name); //folder path
                $data[] = $name;
            }
            $update = Property::where('id', $id)->update([
                'property_image' => json_encode($data)
            ]);
        }

        if ($request->hasFile('images_thumbnail')) {
            request()->validate(
                ['images_thumbnail.*' => 'image|mimes:png,jpg,jpeg,svg|max:10000'],
                ['images_thumbnail.*.max' => 'The images must not be greater than 10 MB.']
            );

            $images_thumbnail = json_decode($property->property_thumbnail);
            if ($images_thumbnail) {
                foreach ($images_thumbnail as $thumbnail) {

                    $image_path = public_path() . '/property-image/' . $thumbnail;

                    if (File::exists($image_path)) {
                        File::delete($image_path);
                    }
                }
            }


            $counter = 0;
            foreach ($request->file('images_thumbnail') as $thumbnail) {
                $getFileExt = $thumbnail->getClientOriginalExtension();
                $name = time() . 'LNDT' . $counter++ . '.' . $getFileExt;
                $destinationPath = public_path() . '/property-image/';

                $img = Image::make($thumbnail->getRealPath());
                $img->resize(1000, 1000, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationPath . $name, 80);
                // $image->move(public_path().'/property-image/',$name); //folder path
                $data_thumbnail[] = $name;
            }
            $update = Property::where('id', $id)->update([
                'property_thumbnail' => json_encode($data_thumbnail)
            ]);
        }

        if ($request->price == 0) {
            $price_usd = 0;
        } else {
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
        if (is_null($request->zone_type) || $request->zone_type == "other") {
            $property->zoning = $request->zone_type_string;
        } else {
            $property->zoning = $request->zone_type;
        }
        // $property->zoning = $request->zone_type;
        $property->description = $request->description;
        $property->bed_qty = 0;
        $property->bath_qty = 0;
        $property->garage_qty = 0;
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

        // $check_input = $request->filled(['code', 'land_name','land_location','price','currency','status','site_plan','site_area'
        // ,'pdma','imb','video','description','school','hospital','airport','supermarket','beach','dining']);
        // if($check_input){
        //     $property->data_status = "Published";
        // }else{
        //     $property->data_status = "Draft";
        // }

        $check_input_publish = $request->filled(['code', 'land_name', 'land_location', 'price', 'currency', 'status', 'site_area']);

        $check_input_optional = $request->filled(['site_plan', 'pdma', 'imb', 'description', 'school', 'hospital', 'airport', 'supermarket', 'beach', 'dining']);

        if ($request->btn_submit == "publish_btn") {
            if (!$check_input_publish) {
                return back()->with('errorMsg', 'Make sure that Land name, location, price, and site area information are filled');
            } elseif (is_null($check_image_db) && !$request->hasFile('images')) {
                return back()->with('errorMsg', 'You must add at least 1 image (Please re-add the image if an error occurs when inputting the form)');
            } else {
                $property->data_status = "Published";
            }
        } elseif ($request->btn_submit == "draft_btn") {
            $property->data_status = "Draft";
        }

        $property->update();
        if ($check_input_publish && !$check_input_optional) {
            return redirect('/admin/land')->with('success', ' Data updated successfully! (some data need to be filled in)');
        } else {
            return redirect('/admin/land')->with('success', ' Data updated successfully!');
        }
    }

    public function destroy($id)
    {
        $property = Property::findOrFail($id);
        $images = json_decode($property->property_image); //mecah array multi image
        if ($images) {
            foreach ($images as $image) {

                $image_path = public_path() . '/property-image/' . $image; //ambil 1 1 image yang ada di array

                if (File::exists($image_path)) { //kalo file imagenya ada
                    File::delete($image_path); //hapus dari folder local
                }
            }
        }

        $thumbnails = json_decode($property->property_thumbnail); //mecah array multi image
        if ($thumbnails) {
            foreach ($thumbnails as $thumbnail) {

                $image_path = public_path() . '/property-image/' . $thumbnail; //ambil 1 1 image yang ada di array

                if (File::exists($image_path)) { //kalo file imagenya ada
                    File::delete($image_path); //hapus dari folder local
                }
            }
        }

        $property->delete();

        if ($property) {
            //redirect dengan pesan sukses
            return redirect('/admin/land')->with('success', ' Data deleted successfully!');
        } else {
            //redirect dengan pesan error
            return redirect('/admin/land')->with('error', 'Error Deleting Data!');
        }
    }
}
