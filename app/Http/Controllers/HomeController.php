<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\ZoningType;
use App\Models\Inbox;
use App\Mail\ContactMail;
use Mail;

class HomeController extends Controller
{
    //
    public function index(){
        return view('frontend.index');
    }

    public function propertyListing(){
        $property = Property::paginate(9);
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

    public function services(){
        return view('frontend.services');
    }

    public function faq(){
        return view('frontend.faq');
    }

    public function contactUs(){
        return view('frontend.contact-us');
    }

    public function sendEmail(Request $request){
        $validatedData = $request->validate([
    		'name' => 'required|max:255',
    		'email' => 'required|email:dns|unique:users',
            'msg' => 'required'
    	]);

        $details = [
            'name' => $validatedData['name'],
            'email_from' =>  $validatedData['email'],
            'msg' => $validatedData['msg'],
        ];

        $inbox = new Inbox;
        $inbox->sender_name = $validatedData['name'];
        $inbox->sender_email = $validatedData['email'];
        $inbox->message = $validatedData['msg'];
        $inbox->save();

        Mail::to('dummy.gusade@gmail.com')->send(new ContactMail($details));
        return back()->with('success','Your message has been sent successfully!');
    }
}
