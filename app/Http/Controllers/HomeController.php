<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\ZoningType;
use App\Models\Inbox;
use App\Mail\ContactMail;
use App\Mail\InquiryMail;
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
        $property = Property::where('property_code',$id)->get();
        // dd($property);
        return view('frontend.property-detail', compact('property'));
    }

    public function addToCart($id)
    {
        $property = Property::findOrFail($id);
          
        $inquiry = session()->get('inquiry', []);
  
        if(isset($inquiry[$id])) {
            // dd(($inquiry[$id]['name']));
            return redirect()->back()->with('errorAddInquiry', $inquiry[$id]['name'].' already in your inquiry list !');
        } else {
            $inquiry[$id] = [
                "name" => $property->property_name,
                "price" => $property->price
            ];
        }
          
        session()->put('inquiry', $inquiry);
        return redirect()->back()->with('success', $inquiry[$id]['name'].' added to inquiry list successfully!');
    }

    public function remove($id)
    {
        if($id) {
            $property = session()->get('inquiry');
            if(isset($property[$id])) {
                unset($property[$id]);
                session()->put('inquiry', $property);
            }
            return redirect()->back()->with('success', 'Property removed from inquiry list successfully');
        }
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

    public function sendEmailInquiry(Request $request){

        $validatedData = $request->validate([
    		'name' => 'required|max:255',
    		'email' => 'required|email:dns|unique:users',
            'phone' => 'required',
            'country' => 'required',
            'message' => 'required'
    	]);

        $detailsInquiry = [
            'name' => $validatedData['name'],
            'email' =>  $validatedData['email'],
            'phone' => $validatedData['phone'],
            'country' => $validatedData['country'],
            'inquiry_list' => $request->input('list'),
            'message' => $validatedData['message'],
        ];

        // dd($detailsInquiry);

        Mail::to('dummy.gusade@gmail.com')->send(new InquiryMail($detailsInquiry));
        return back()->with('success','Your inquiry message has been sent successfully!');
    }
}
