<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Property;
use App\Models\ZoningType;

class DashboardController extends Controller
{
    //
    public function index(){
        $property_list = Property::where('property_type',1)->count();
        $land_list = Property::where('property_type',2)->count();
        return view('backend.index', compact('property_list','land_list'));
        // dd($property_list);
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
        $user = User::join('roles', 'users.role', '=', 'roles.id')->get(['users.*', 'roles.nama_role']);
        return view('backend.admin.admin-list',compact('user'));
    }

    public function createProperty(){
        return view('backend.property.property-create');
    }
}
