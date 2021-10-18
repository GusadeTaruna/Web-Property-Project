<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Land;
use App\Models\LandZoningType;

class HomeController extends Controller
{
    //
    public function index(){
        return view('frontend.index');
    }

    public function propertyListing(){
        return view('frontend.property-listing');
    }

    public function propertyDetail(){
        $land = Land::all();
        return view('frontend.property-detail', compact('land'));
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
