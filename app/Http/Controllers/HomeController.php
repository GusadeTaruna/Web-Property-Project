<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\ZoningType;

class HomeController extends Controller
{
    //
    public function index(){
        return view('frontend.index');
    }

    public function propertyListing(){
        $property = Property::all();
        return view('frontend.property-listing', compact('property'));
    }

    public function propertyDetail($id)
    {
        $property = Property::join('zoning_type', 'property_list.zoning', '=', 'zoning_type.id')->where('property_code',$id)->get();
        // dd($property);
        return view('frontend.property-detail', compact('property'));
    }

    public function about(){
        return view('frontend.about');
    }

    public function faq(){
        return view('frontend.faq');
    }

    public function contactUs(){
        return view('frontend.contact-us');
    }
}
