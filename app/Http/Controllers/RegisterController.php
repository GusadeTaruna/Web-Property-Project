<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
	public function __construct(){
		$this->middleware('auth');
	}

    public function create(){
    	return view('login-register.register',[
    		'title' => 'Register',
    	]);
    }

    public function store(Request $request){
    	
    	$validatedData = $request->validate([
    		'nama' => 'required|max:255',
    		'email' => 'required|email:dns|unique:users',
    		'telephone' => 'required|numeric|min:9',
    		'password' => 'required|min:5|max:255|confirmed'
    	]);

    	$user = new User;
    	$user->name = $validatedData['nama'];
		$user->email = $validatedData['email'];
		$user->no_telepon = $validatedData['telephone'];
		$user->role = 2;
		$user->password = Hash::make($validatedData['password']);
		$user->save();

    	// User::create($validatedData);

    	// $request->session()->flash('success', 'Registrasi Berhasil! anda sekarang dapat Log In');

    	return redirect('/admin/dashboard')->with('success', $validatedData['nama'].' Account has been successfully created!');
    }
}
