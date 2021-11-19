<?php

namespace App\Http\Controllers;

use App\Models\CustomizeContact;
use Illuminate\Http\Request;

class CustomizeContactPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $contact_check = CustomizeContact::all();
        $contact_array = $contact_check->toArray();
        if($contact_check->isEmpty()){
            $value = [];
            return view('backend.custom-page.contact-create', compact('value'));
        }else{
            $id_contact = $contact_array[0]['id'];
            $value = CustomizeContact::where('id',$id_contact)->first();
            return view('backend.custom-page.contact-create', compact('value'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $contact_data = new CustomizeContact;
        $contact_data->address = $request->address;
    	$contact_data->contact = $request->contact;
        $contact_data->operation_hour = $request->operation_hour;

        if($request->address==null && $request->contact==null && $request->operation_hour==null){
            return redirect('/admin/customize/contact')->with('errorMsg', 'Nothing to customize');
        }else{
            $contact_data->save();
            return redirect('/admin/customize/contact')->with('success', 'Contact Us Page successfully edited');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CustomizeContact  $customizeContact
     * @return \Illuminate\Http\Response
     */
    public function show(CustomizeContact $customizeContact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CustomizeContact  $customizeContact
     * @return \Illuminate\Http\Response
     */
    public function edit(CustomizeContact $customizeContact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CustomizeContact  $customizeContact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $contact_data = CustomizeContact::findOrFail($id);
        $contact_data->address = $request->address;
    	$contact_data->contact = $request->contact;
        $contact_data->operation_hour = $request->operation_hour;
        $contact_data->update();
        return redirect('/admin/customize/contact')->with('success',' Contact Us Page successfully edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CustomizeContact  $customizeContact
     * @return \Illuminate\Http\Response
     */
    public function destroy(CustomizeContact $customizeContact)
    {
        //
    }
}
