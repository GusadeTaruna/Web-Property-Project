<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\ZoningType;
use Illuminate\Support\Facades\File;
use AmrShawky\LaravelCurrency\Facade\Currency;
use Image;

class PropertyController extends Controller
{
    //
    public function index()
    {
        $property = Property::where('property_type', 1)->get();
        return view('backend.property.property-list', compact('property'));
    }

    public function create()
    {
        $property = Property::all();
        $property_type = ZoningType::all();
        $huruf = "PB-";
        $count = Property::selectRaw('SUBSTRING(property_code, 5) as lastcode')->orderBy('lastcode', 'DESC')->where('property_type', '=', '1')->first();

        if (is_null($count)) {
            $propertyCode = $huruf . sprintf("%03s", 1);
        } else {
            if ($count->lastcode > 0) {
                $propertyCode = $huruf . sprintf("%03s", $count->lastcode + 1);
            }
        }
        // $count = Property::select('id')->orderBy('id', 'DESC')->where('property_type','=','1')->first();

        // if(is_null($count)){
        //     $propertyCode = $huruf . sprintf("%03s", 1);
        // }else{
        //     if($count->id > 0) {
        //         $propertyCode = $huruf . sprintf("%03s", $count->id++);
        //     }
        // }

        return view('backend.property.property-create', compact('propertyCode', 'property_type'));
        // dd($count);
    }

    public function store(Request $request)
    {

        // $check_input = $request->filled(['code', 'property_name','location','price','currency','status','site_plan','site_area','building_area','year_built','description','bed','bath','school','hospital','airport','supermarket','beach','dining']);

        if ($request->btn_submit == "publish_btn") {

            $validatedData = $request->validate(
                [
                    'code' => 'required',
                    'property_name' => 'required',
                    'location' => 'required',
                    'price' => 'required',
                    'currency' => 'required',
                    'status' => 'required',
                    'site_area' => 'required',
                    'zoning_type' => 'required',
                    'images' => 'required',
                    'images.*' => 'image|mimes:png,jpg,jpeg,svg|max:10000',
                    'images_thumbnail' => 'required',
                    'images_thumbnail.*' => 'image|mimes:png,jpg,jpeg,svg|max:10000'
                ],
                [
                    'code.required' => 'You must enter the code of the property data',
                    'property_name.required' => 'You must enter the name of the property data',
                    'location.required' => 'You must enter the location of the property data',
                    'price.required' => 'You must enter the price of the property data',
                    'status.required' => 'You must enter the status of the property data',
                    'site_area.required' => 'You must enter the site area of the property data',
                    'zoning_type.required' => 'You must choose the zoning type of the property',
                    'images.required' => 'You must add at least 1 image (Please re-add the image if an error occurs when inputting the form)',
                    'images.*.max' => 'The images must not be greater than 10 MB.',
                    'images_thumbnail.required' => 'You must add at least 1 thumbnail (Please re-add the image if an error occurs when inputting the form)',
                    'images_thumbnail.*.max' => 'The images must not be greater than 10 MB.',

                ]
            );
            // die(var_dump($request->hasFile('images_thumbnail')));

            if ($request->hasFile('images')) {
                $counter = 0;
                foreach ($request->file('images') as $image) {
                    $getFileExt = $image->getClientOriginalExtension();
                    $name = time() . 'PR' . $counter++ . '.' . $getFileExt;
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
                    $name = time() . 'PRT' . $counter++ . '.' . $getFileExt;
                    $destinationPath = public_path() . '/property-image/';

                    $img = Image::make($thumbnail->getRealPath());
                    $img->resize(1000, 1000, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save($destinationPath . $name, 80);
                    // $image->move(public_path().'/property-image/',$name); //folder path
                    $data_thumbnail[] = $name;
                }
            }

            // dd($request->price);

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
            $property->property_type = 1;
            $property->property_code = $validatedData['code'];
            $property->property_name = $validatedData['property_name'];
            $property->property_location = $validatedData['location'];
            $property->property_image = json_encode($data);
            $property->property_thumbnail = json_encode($data_thumbnail);
            $property->currency = $validatedData['currency'];
            $property->price = $validatedData['price'];
            $property->price_usd = $price_usd;
            $property->video_link = $request->video;
            $property->property_status = $validatedData['status'];
            $property->site_plan = $request->site_plan;
            $property->site_area = $validatedData['site_area'];
            $property->building_area = $request->building_area;
            $property->year_built = $request->year_built;
            $property->power_kv = $request->power_kv;
            $property->generator_kv = $request->generator;

            if (is_null($request->pdma)) {
                $property->pdma_water = "No";
            } else {
                $property->pdma_water = $request->pdma;
            }

            if (is_null($request->imb)) {
                $property->imb = 0;
            } else {
                $property->imb = $request->imb;
            }

            if (is_null($request->zoning_type) || $request->zoning_type == "other") {
                $property->zoning = $request->zoning_type_string;
            } else {
                $property->zoning = $request->zoning_type;
            }

            // $property->zoning = $request->zoning_type;
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
            $property->data_status = "Published";
            $property->save();

            if (!$property->save()) {
                return back()->with('errorMsg', 'Error adding Data');
            } else {
                return redirect('/admin/property')->with('success', 'Property Data successfully added');
            }
        } elseif ($request->btn_submit == "draft_btn") {

            $this->validate(
                $request,
                [
                    'images.*' => 'image|mimes:png,jpg,jpeg,svg|max:10000',
                    'images_thumbnail.*' => 'image|mimes:png,jpg,jpeg,svg|max:10000'
                ],
                [
                    'images.*.max' => 'The images must not be greater than 10 MB.',
                    'images_thumbnail.*.max' => 'The images must not be greater than 10 MB.',
                ]
            );

            if ($request->hasFile('images')) {
                $counter = 0;
                foreach ($request->file('images') as $image) {
                    $getFileExt = $image->getClientOriginalExtension();
                    $name = time() . 'PR' . $counter++ . '.' . $getFileExt;
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
                    $name = time() . 'PRT' . $counter++ . '.' . $getFileExt;
                    $destinationPath = public_path() . '/property-image/';

                    $img = Image::make($thumbnail->getRealPath());
                    $img->resize(1000, 1000, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save($destinationPath . $name, 80);
                    // $image->move(public_path().'/property-image/',$name); //folder path
                    $data_thumbnail[] = $name;
                }
            }

            // dd($request->price);

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
            $property->property_type = 1;
            $property->property_code = $request->code;
            $property->property_name = $request->property_name;
            $property->property_location = $request->location;

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
            $property->building_area = $request->building_area;
            $property->year_built = $request->year_built;
            $property->power_kv = $request->power_kv;
            $property->generator_kv = $request->generator;
            $property->pdma_water = $request->pdma;
            $property->imb = $request->imb;

            if (is_null($request->zoning_type) || $request->zoning_type == "other") {
                $property->zoning = $request->zoning_type_string;
            } else {
                $property->zoning = $request->zoning_type;
            }

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

            if (!$property->save()) {
                return back()->with('errorMsg', 'Error adding Data');
            } else {
                return redirect('/admin/property')->with('success', 'Property Data successfully drafted ');
            }
        }

    }

    public function read($id)
    {
        $property = Property::where('property_code', $id)->get();
        return view('backend.property.property-read', compact('property'));
    }


    public function edit($id)
    {
        $property = Property::where('property_code', $id)->get();
        $property_type = ZoningType::all();
        if (is_null($property['0']->property_image)) {
            $count_image = 0;
        } else {
            $count_image = count(json_decode($property['0']->property_image));
        }

        if (is_null($property['0']->property_thumbnail)) {
            $count_thumbnail = 0;
        } else {
            $count_thumbnail = count(json_decode($property['0']->property_thumbnail));
        }

        // dd($count_image);
        return view('backend.property.property-edit', compact('property', 'property_type', 'count_image', 'count_thumbnail'));
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
                $name = time() . 'PR' . $counter++ . '.' . $getFileExt;
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
                $name = time() . 'PRT' . $counter++ . '.' . $getFileExt;
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
        $property->year_built = $request->year_built;
        $property->power_kv = $request->power_kv;
        $property->generator_kv = $request->generator;
        $property->pdma_water = $request->pdma;
        $property->imb = $request->imb;
        if (is_null($request->zoning_type) || $request->zoning_type == "other") {
            $property->zoning = $request->zoning_type_string;
        } else {
            $property->zoning = $request->zoning_type;
        }
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

        $check_input_publish = $request->filled(['code', 'property_name', 'location', 'price', 'currency', 'status', 'site_area']);

        $check_input_optional = $request->filled(['site_plan', 'building_area', 'year_built', 'description', 'school', 'hospital', 'airport', 'supermarket', 'beach', 'dining']);

        if ($request->btn_submit == "publish_btn") {
            if (!$check_input_publish) {
                return back()->with('errorMsg', 'Make sure that Property name, location, price, and site area information are filled');
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
            return redirect('/admin/property')->with('success', ' Data updated successfully! (some data need to be filled in)');
        } else {
            return redirect('/admin/property')->with('success', ' Data updated successfully!');
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
            return redirect('/admin/property')->with('success', ' Data deleted successfully!');
        } else {
            //redirect dengan pesan error
            return redirect('/admin/property')->with('error', 'Error Deleting Data!');
        }
    }
}
