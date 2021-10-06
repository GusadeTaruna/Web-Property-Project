<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function create(){
    	return view('login-register.register',[
    		'title' => 'Register',
    	]);
    }

    public function store(Request $request){
    	
    	$validatedData = $request->validate([
    		'nama' => 'required|max:255',
    		'username' => 'required|min:5|max:100|unique:users',
    		'email' => 'required|email:dns|unique:users',
    		'tanggal' => 'required',
    		'kelamin' => 'required',
    		'telephone' => 'required|numeric|min:9',
    		'password' => 'required|min:5|max:255|confirmed'
    	]);

    	$user = new User;
    	$user->name = $validatedData['nama'];
		$user->username = $validatedData['username'];
		$user->email = $validatedData['email'];
		$user->tanggal_lahir = $validatedData['tanggal'];
		$user->jenis_kelamin = $validatedData['kelamin'];
		$user->no_telepon = $validatedData['telephone'];
		$user->password = Hash::make($validatedData['password']);
		$user->save();

    	// User::create($validatedData);

    	// $request->session()->flash('success', 'Registrasi Berhasil! anda sekarang dapat Log In');

    	return redirect('/login')->with('success', 'Registrasi Berhasil! anda sekarang dapat Log In');
    }
}
