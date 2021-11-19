<?php

namespace App\Http\Controllers;

use App\Models\CustomizeAbout;
use App\Models\TeamMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CustomizeAboutPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $team = TeamMember::all();
        return view('backend.custom-page.about-us.team.team-index', compact('team'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.custom-page.about-us.team.team-create');
    }

    public function createPage()
    {
        //
        $about_check = CustomizeAbout::all();
        $about_array = $about_check->toArray();
        // dd($homepage_array);
        if($about_check->isEmpty()){
            $value = [];
            return view('backend.custom-page.about-us.about-create', compact('value'));
        }else{
            $id_about = $about_array[0]['id'];
            $value = CustomizeAbout::where('id',$id_about)->first();

            if ($about_array[0]['team_img']==null){
                $count_image = 0;
            }else{
                $count_image = count(json_decode($about_array[0]['team_img']));
            }

            return view('backend.custom-page.about-us.about-create', compact('value','count_image'));
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
        $this->validate($request, 
        [
            'file_cv' => 'required',
            'profile' => 'required',
            'file_cv.*' => 'mimes:pdf|max:2048',
            'profile.*' => 'image|mimes:png,jpg,jpeg,svg|max:1024'
        ],
        [
            'profile.*.max' => 'The images must not be greater than 1 MB.',
            'file_cv.*.max' => 'CV file size must not be greater than 2 MB.'
        ]);

        //upload cv
        if($request->hasFile('file_cv')){
            foreach($request->file('file_cv') as $cv){
                $getFileExt = $cv->getClientOriginalExtension();
                $cv_name='CV-'.$request->member_name.'-'.time().'.'.$getFileExt;
                $cv->move(public_path().'/about-asset/cv/',$cv_name); //folder path
                $dataCV[] = $cv_name;
            }
        }

        //upload image
        if($request->hasFile('profile')){
            $counter = 0;
            foreach($request->file('profile') as $image){
                $getFileExt = $image->getClientOriginalExtension();
                $name=time().'TEAM'.$counter++.'.'.$getFileExt;
                $image->move(public_path().'/about-asset/',$name); //folder path
                $data[] = $name;
            }
        }

        $team = new TeamMember;
        $team->agent_name = $request->member_name;
    	$team->agent_title = $request->member_dep;
        $team->agent_desc = $request->desc;
        $team->agent_photo = json_encode($data);
        $team->agent_cv = json_encode($dataCV);
        $team->save();

        if(!$team->save()){
            return back()->with('errorMsg', 'Error adding Data');
        }else{
            return redirect('/admin/customize/about-us')->with('success', 'Data successfully added');
        }
    }

    public function storePage(Request $request){
        $about = new CustomizeAbout;
        $about->team_title = $request->team_title;
        $about->team_desc = $request->team_desc;
        $this->validate($request, 
        [
            'team_img.*' => 'image|mimes:png,jpg,jpeg,svg|max:1024'
        ],
        [
            'team_img.*.max' => 'The images must not be greater than 1 MB.'
        ]);
        if($request->hasFile('team_img')){
            $counter = 0;
            foreach($request->file('team_img') as $image){
                $getFileExt = $image->getClientOriginalExtension();
                $name=time().'ABOUT'.$counter++.'.'.$getFileExt;
                $image->move(public_path().'/about-asset/',$name); //folder path
                $data[] = $name;
            }
            $about->team_img = json_encode($data);
        }else{
            $about->team_img = NULL;
        }
        $about->mission_title = $request->mission_title;
        $about->mission_desc = $request->mission_desc;

        if($request->team_title==null && $request->team_desc==null && $request->team_img==null
            && $request->mission_title==null && $request->mission_desc==null){
            return redirect('/admin/customize/about-us/create')->with('errorMsg', 'Nothing to customize');
        }else{
            $about->save();
            return redirect('/admin/customize/about-us/create')->with('success', 'About Us Page successfully edited');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CustomizeAbout  $customizeAbout
     * @return \Illuminate\Http\Response
     */
    public function show(CustomizeAbout $customizeAbout)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CustomizeAbout  $customizeAbout
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $team = TeamMember::where('id',$id)->get();
        return view('backend.custom-page.about-us.team.team-edit', compact('team'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CustomizeAbout  $customizeAbout
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $team = TeamMember::findOrFail($id);

        //check image
        if ($request->hasFile('profile')) {
            request()->validate(
                ['profile.*' => 'image|mimes:png,jpg,jpeg,svg|max:1024'],
                ['profile.*.max' => 'The images must not be greater than 1 MB.']
            );

            $images = json_decode($team->agent_photo);
            foreach($images as $image){

                $image_path = public_path().'/about-asset/'.$image;

                if(File::exists($image_path)) {
                    File::delete($image_path);
                }
            }

            $counter = 0;
            foreach($request->file('profile') as $image){
                $getFileExt = $image->getClientOriginalExtension();
                $name=time().'TEAM'.$counter++.'.'.$getFileExt;
                $image->move(public_path().'/about-asset/',$name); //folder path
                $data[] = $name;
            }
            $update = TeamMember::where('id', $id)->update([
                 'agent_photo' => json_encode($data)
            ]);
        }

        //check cv
        if ($request->hasFile('file_cv')) {
            request()->validate(
                ['file_cv.*' => 'mimes:pdf|max:2048'],
                ['file_cv.*.max' => 'CV file size must not be greater than 2 MB.']
            );

            $cv_file = json_decode($team->agent_cv);
            foreach($cv_file as $cv){

                $cv_path = public_path().'/about-asset/cv/'.$cv;

                if(File::exists($cv_path)) {
                    File::delete($cv_path);
                }
            }

            foreach($request->file('file_cv') as $cv){
                $getFileExt = $cv->getClientOriginalExtension();
                $cv_name='CV-'.$request->member_name.'-'.time().'.'.$getFileExt;
                $cv->move(public_path().'/about-asset/cv/',$cv_name); //folder path
                $dataCV[] = $cv_name;
            }
            $update = TeamMember::where('id', $id)->update([
                 'agent_cv' => json_encode($dataCV)
            ]);
        }

        $team->agent_name = $request->member_name;
    	$team->agent_title = $request->member_dep;
        $team->agent_desc = $request->desc;
        $team->update();

        return redirect('/admin/customize/about-us')->with('success', 'Data successfully updated');

    }

    public function updatePage(Request $request, $id){
        $about = CustomizeAbout::findOrFail($id);

        if ($request->hasFile('team_img')) {
            request()->validate(
                ['team_img.*' => 'image|mimes:png,jpg,jpeg,svg|max:1024'],
                ['team_img.*.max' => 'The images must not be greater than 1 MB.']
            );

            $images_team = json_decode($about->team_img);
            if ($images_team){
                foreach($images_team as $image){

                    $image_path = public_path().'/about-asset/'.$image;

                    if(File::exists($image_path)) {
                        File::delete($image_path);
                    }
                }
                $counter = 0;
                foreach($request->file('team_img') as $image){
                    $getFileExt = $image->getClientOriginalExtension();
                    $name=time().'ABOUT'.$counter++.'.'.$getFileExt;
                    $image->move(public_path().'/about-asset/',$name); //folder path
                    $data[] = $name;
                    $update = CustomizeAbout::where('id', $id)->update([
                        'team_img' => json_encode($data)
                   ]);
                }
            }else{
                $counter = 0;
                foreach($request->file('team_img') as $image){
                    $getFileExt = $image->getClientOriginalExtension();
                    $name=time().'ABOUT'.$counter++.'.'.$getFileExt;
                    $image->move(public_path().'/about-asset/',$name); //folder path
                    $data[] = $name;
                    $update = CustomizeAbout::where('id', $id)->update([
                        'team_img' => json_encode($data)
                   ]);
                }
            }
            
        }

        $about->team_title = $request->team_title;
        $about->team_desc = $request->team_desc;
        $about->mission_title = $request->mission_title;
        $about->mission_desc = $request->mission_desc;
        $about->update();
        return redirect('/admin/customize/about-us/create')->with('success',' About Us Page successfully edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CustomizeAbout  $customizeAbout
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $team = TeamMember::findOrFail($id);
        $images = json_decode($team->agent_photo); //mecah array multi image
        foreach($images as $image){

            $image_path = public_path().'/about-asset/'.$image; //ambil 1 1 image yang ada di array

            if(File::exists($image_path)) { //kalo file imagenya ada
                File::delete($image_path); //hapus dari folder local
            }
        }

        $cv_file = json_decode($team->agent_cv); //mecah array multi image
        foreach($cv_file as $cv){

            $cv_path = public_path().'/about-asset/cv/'.$cv; //ambil 1 1 image yang ada di array

            if(File::exists($cv_path)) { //kalo file imagenya ada
                File::delete($cv_path); //hapus dari folder local
            }
        }

        $team->delete();

        if($team){
         //redirect dengan pesan sukses
            return redirect('/admin/customize/about-us')->with('success',' Data deleted successfully!');
        }else{
        //redirect dengan pesan error
            return redirect('/admin/customize/about-us')->with('errorMsg','Error Deleting Data!');
        }
    }
}
