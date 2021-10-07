<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('frontend.property-detail');
    }

    public function about(){
        return view('frontend.about');
    }

    public function faq(){
        return view('frontend.faq');
    }
}
