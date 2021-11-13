<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Property;
use App\Models\ZoningType;
use App\Models\Inbox;

class DashboardController extends Controller
{
    //
    public function index(){
        $property_list = Property::where('property_type',1)->count();
        $land_list = Property::where('property_type',2)->count();
        $inbox_list = Inbox::where('status_msg_seen',0)->count();
        return view('backend.index', compact('property_list','land_list','inbox_list'));
        // dd($property_list);
    }

    public function propertyCategories(){
        return view('backend.property.property-categories');
    }

    public function adminList(){
        $user = User::join('roles', 'users.role', '=', 'roles.id')->get(['users.*', 'roles.nama_role']);
        return view('backend.admin.admin-list',compact('user'));
    }

    public function msgInbox(){
        $inbox = Inbox::where('msg_type', '=', 'contact')->get();
        return view('backend.admin.contact-inbox',compact('inbox'));
    }

    public function readMsgInbox($id){
        $message = Inbox::where('id',$id)->get();
        $updateStat = Inbox::findOrFail($id);
        if($updateStat->status_msg_seen==0) {
            $updateStat->status_msg_seen = 1;
            $updateStat->save();
        }
        return view('backend.admin.contact-inbox-read',compact('message'));
    }

    public function inboxResponded($id){
        $updateStat = Inbox::findOrFail($id);
        if($updateStat->status_msg_respon==0) {
            $updateStat->status_msg_respon = 1;
            $updateStat->save();
        }
        return back();
    }

    public function deleteInbox($id){
        $message = Inbox::findOrFail($id);
        $message->delete();

        if($message){
         //redirect dengan pesan sukses
            return redirect('/admin/inbox-contact')->with('success',' Data deleted successfully!');
        }else{
        //redirect dengan pesan error
            return redirect('/admin/inbox-contact')->with('error','Error Deleting Data!');
        }
    }

    public function inquiryInbox(){
        $inbox = Inbox::where('msg_type', '=', 'inquiry')->get();
        return view('backend.admin.inquiry-inbox',compact('inbox'));
    }

    public function readInquiryInbox($id){
        $message = Inbox::where('id',$id)->get();
        $updateStat = Inbox::findOrFail($id);
        if($updateStat->status_msg_seen==0) {
            $updateStat->status_msg_seen = 1;
            $updateStat->save();
        }
        return view('backend.admin.inquiry-inbox-read',compact('message'));
    }

    public function inquiryResponded($id){
        $updateStat = Inbox::findOrFail($id);
        if($updateStat->status_msg_respon==0) {
            $updateStat->status_msg_respon = 1;
            $updateStat->save();
        }
        return back();
    }

    public function deleteInquiry($id){
        $message = Inbox::findOrFail($id);
        $message->delete();

        if($message){
         //redirect dengan pesan sukses
            return redirect('/admin/inbox-inquiry')->with('success',' Data deleted successfully!');
        }else{
        //redirect dengan pesan error
            return redirect('/admin/inbox-inquiry')->with('error','Error Deleting Data!');
        }
    }

    
}
