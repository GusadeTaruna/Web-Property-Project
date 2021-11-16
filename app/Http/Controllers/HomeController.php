<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\ZoningType;
use App\Models\Inbox;
use App\Models\CustomizePage;
use App\Mail\ContactMail;
use App\Mail\InquiryMail;
use Mail;

class HomeController extends Controller
{
    //
    public function index(){
        $homepage_data = CustomizePage::all();
        return view('frontend.index', compact('homepage_data'));
    }

    public function search_property(){
        
        $code = request()->code;
        $type = request()->type;
        $location = request()->location;
        $minimal_price = request()->minPrice;
        if(is_null($minimal_price)){
            $minimal_price = 0;
        }
        $maximal_price = request()->maxPrice;

        $property = Property::when($code, function ($q) use ($code) {
            return $q->where('property_code', 'like', '%'.$code.'%');
        })
        ->when($type, function ($q) use ($type) {
            return $q->where('property_type', 'like', '%'.$type.'%');
        })
        ->when($location, function ($q) use ($location) {
            return $q->where('property_location', 'like', '%'.$location.'%');
        })
        ->when($maximal_price, function ($q) use ($minimal_price,$maximal_price) {
            return $q->whereBetween('price_usd', [$minimal_price, $maximal_price]);
        })
        ->paginate(9);

        // dd($property);
        if($property->total()>0){
            return view('frontend.property-listing', compact('property'));
        }else{
            return redirect('/property-list')->with('notFound', 'No results found');
        }
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
                "code" => $property->property_code
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

        Mail::to('info@equatorial-property.com')->send(new ContactMail($details));

        if( count(Mail::failures()) > 0 ) {

            // echo "There was one or more failures. They were: <br />";
         
            // foreach(Mail::failures() as $email_address) {
            //     echo " - $email_address <br />";
            //  }
             return back()->with('errorContact','Something went wrong!');
         } else {
            $inbox = new Inbox;
            $inbox->msg_type = "contact";
            $inbox->sender_name = $validatedData['name'];
            $inbox->sender_email = $validatedData['email'];
            $inbox->message = $validatedData['msg'];
            $inbox->status_msg_seen = 0;
            $inbox->status_msg_respon = 0;
            $inbox->save();
            return back()->with('success','Your message has been sent successfully!');
         }
    }

    public function sendEmailInquiry(Request $request){

        if (is_array($request->input('list'))){
            $list = implode(', ', $request->input('list'));
        }else{
            $list = $request->input('list');
        } 

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

        $inbox = new Inbox;
        $inbox->msg_type = "inquiry";
        $inbox->sender_name = $validatedData['name'];
        $inbox->sender_email = $validatedData['email'];
        $inbox->phone = $validatedData['phone'];
        $inbox->country = $validatedData['country'];
        $inbox->inquiry_list = $list;
        $inbox->message = $validatedData['message'];
        $inbox->status_msg_seen = 0;
        $inbox->status_msg_respon = 0;
        $inbox->save();

        // dd($list);

        Mail::to('info@equatorial-property.com')->send(new InquiryMail($detailsInquiry));
        return back()->with('success','Your inquiry message has been sent successfully!');
    }
}
