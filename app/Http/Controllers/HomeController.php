<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\ZoningType;
use App\Models\Inbox;
use App\Models\CustomizeHome;
use App\Models\CustomizeServices;
use App\Models\CustomizeAbout;
use App\Models\TeamMember;
use App\Models\ServicePage;
use App\Models\CustomizeContact;
use App\Models\Blog;
use App\Models\Facts;
use App\Mail\ContactMail;
use App\Mail\InquiryMail;
use Mail;

class HomeController extends Controller
{
    //
    public function index(){
        $homepage_data = CustomizeHome::all();
        $service_data = CustomizeServices::all();
        $listing_data = Property::where('data_status','Published')->orderBy('created_at','desc')->paginate(6);
        // dd($listing_data);
        // if($homepage_data->isEmpty()){}
        return view('frontend.index', compact('homepage_data','listing_data','service_data'));
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
            return $q->where('data_status','Published')->where('property_code', 'like', '%'.$code.'%');
        })
        ->when($type, function ($q) use ($type) {
            return $q->where('data_status','Published')->where('property_type', 'like', '%'.$type.'%');
        })
        ->when($location, function ($q) use ($location) {
            return $q->where('data_status','Published')->where('property_location', 'like', '%'.$location.'%');
        })
        ->when($maximal_price, function ($q) use ($minimal_price,$maximal_price) {
            return $q->where('data_status','Published')->whereBetween('price_usd', [$minimal_price, $maximal_price]);
        })
        ->paginate(9);

        // dd($property);
        if($property->total()>0){
            return view('frontend.property-listing', compact('property'));
        }else{
            return redirect('/property-list')->with('notFound', 'No results found');
        }
    }

    public function search_blog(){
        
        $title = request()->title;
        $category = request()->category;

        $blog_all = Blog::when($title, function ($q) use ($title) {
            return $q->where('status','Published')->where('blog_title', 'like', '%'.$title.'%');
        })
        ->when($category, function ($q) use ($category) {
            return $q->where('status','Published')->where('blog_category', 'like', '%'.$category.'%');
        })
        ->paginate(12);

        // dd($blog_all->total());
        if($blog_all->total()>0){
            return view('frontend.blog', compact('blog_all'));
        }else{
            return redirect('/blog')->with('notFound', 'No results found');
        }
    }


    public function sort_property(Request $request){
        $sort_by = $request->filter_by;
        if($sort_by == "most-recent"){
            $property = Property::where('data_status','Published')->orderBy('created_at','desc')->paginate(9);
        }
        if ($sort_by == "most-viewed"){
            $property = Property::where('data_status','Published')->orderBy('view_count','desc')->paginate(9);
        }
        if ($sort_by == "highest-price"){
            $property = Property::where('data_status','Published')->orderBy('price_usd','desc')->paginate(9);
        }
        if ($sort_by == "lowest-price"){
            $property = Property::where('data_status','Published')->orderBy('price_usd','asc')->paginate(9);
        }
        return view('frontend.property-listing', compact('property'));
    }

    public function propertyListing(){
        $property = Property::where('data_status','Published')->paginate(9);
        return view('frontend.property-listing', compact('property'));
    }

    public function propertyDetail($id)
    {
        $property = Property::where('property_code',$id)->get();
        foreach ($property as $object){ 
            if(is_null($object->view_count)){
                $view_count = 1;
            }else{
                $view_count = $object->view_count + 1;
            }
            // dd($view_count);
            $object->view_count = $view_count;
            $object->update();
        }
        
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
        $about_data = CustomizeAbout::all();
        $team_data = TeamMember::all();
        return view('frontend.about',compact('about_data','team_data'));
    }

    public function services(){
        $services = CustomizeServices::all();
        $header = ServicePage::all();
        return view('frontend.services',compact('services','header'));
    }

    public function faq(){
        return view('frontend.faq');
    }

    public function blog(){
        $blog = Blog::where('status', 'Published')->orderBy('created_at','desc')->first();
        $blog_all = Blog::where('status', 'Published')->paginate(12);
        // dd($blog);
        return view('frontend.blog',compact('blog','blog_all'));
    }

    public function blog_detail($id){
        $blog = Blog::where('id',$id)->where('status', 'Published')->first();
        $blog_all = Blog::where('status', 'Published')->paginate(3);
        // dd($blog);
        return view('frontend.blog-backup',compact('blog','blog_all'));
    }

    public function fact(){
        $fact = Facts::where('status', 'Published')->orderBy('created_at','desc')->first();
        $fact_all = Facts::where('status', 'Published')->paginate(3);
        // dd($blog);
        return view('frontend.facts',compact('fact','fact_all'));
    }

    public function fact_detail($id){
        $fact = Facts::where('id',$id)->where('status', 'Published')->first();
        $fact_all = Facts::where('status', 'Published')->paginate(3);
        // dd($blog);
        return view('frontend.facts',compact('fact','fact_all'));
    }

    public function contactUs(){
        $contact_data = CustomizeContact::all();
        return view('frontend.contact-us',compact('contact_data'));
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
            'contact_method' => 'required',
            'country' => 'required',
            'message' => 'required'
    	]);

        $detailsInquiry = [
            'name' => $validatedData['name'],
            'email' =>  $validatedData['email'],
            'phone' => $validatedData['phone'],
            'contact_method' => implode($request->contact_method,','),
            'country' => $validatedData['country'],
            'inquiry_list' => $request->input('list'),
            'message' => $validatedData['message'],
        ];

        $inbox = new Inbox;
        $inbox->msg_type = "inquiry";
        $inbox->sender_name = $validatedData['name'];
        $inbox->sender_email = $validatedData['email'];
        $inbox->phone = $validatedData['phone'];
        $inbox->contact_method = implode($request->contact_method,',');
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
