<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// })->middleware('auth');

Route::get('/', [HomeController::class, 'index']);
Route::get('/property-list', [HomeController::class, 'propertyListing'])->name('property-list');
Route::get('/property-detail', [HomeController::class, 'propertyDetail'])->name('property-detail');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/faq', [HomeController::class, 'faq'])->name('faq');
Route::get('/contact-us', [HomeController::class, 'contactUs'])->name('contact-us');



Route::get('/admin', function(){
    return redirect('/admin/dashboard');
});
Route::get('/admin/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/admin/login', [LoginController::class, 'authenticate']);
Route::post('/admin/logout', [LoginController::class, 'logout']);


Route::get('/admin/register', [RegisterController::class, 'create'])->middleware('superuser');
Route::post('/admin/register', [RegisterController::class, 'store']);


Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');