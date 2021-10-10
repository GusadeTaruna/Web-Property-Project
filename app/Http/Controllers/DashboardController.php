<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index(){
        return view('backend.index');
    }

    public function listProperty(){
        return view('backend.property.property-list');
    }

    public function propertyType(){
        return view('backend.property.property-type');
    }

    public function propertyCategories(){
        return view('backend.property.property-categories');
    }

    public function adminList(){
        return view('backend.admin.admin-list');
    }
}
