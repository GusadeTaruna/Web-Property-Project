<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\LandController;

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

// Route::get('/', function () {
//     return view('coming-soon');
// });

Route::get('/', [HomeController::class, 'index']);
Route::get('/property-list', [HomeController::class, 'propertyListing'])->name('property-list');
Route::get('/property-detail/{id}', [HomeController::class, 'propertyDetail'])->name('property-detail');
Route::get('add-to-cart/{id}', [HomeController::class, 'addToCart'])->name('add.to.cart');
Route::get('remove-from-cart/{id}', [HomeController::class, 'remove'])->name('remove.from.cart');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/services', [HomeController::class, 'services'])->name('services');
// Route::get('/faq', [HomeController::class, 'faq'])->name('faq');
Route::get('/contact-us', [HomeController::class, 'contactUs'])->name('contact-us');
Route::post('/send-message',[HomeController::class, 'sendEmail'])->name('contact.send');
Route::post('/send-message-inquiry',[HomeController::class, 'sendEmailInquiry'])->name('inquiry.send');



Route::get('/admin', function(){
    return redirect('/admin/dashboard');
});
Route::get('/admin/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/admin/login', [LoginController::class, 'authenticate']);
Route::post('/admin/logout', [LoginController::class, 'logout']);


Route::get('/admin/register', [RegisterController::class, 'create'])->middleware('superuser');
Route::post('/admin/register', [RegisterController::class, 'store']);


Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

Route::get('/admin/property', [PropertyController::class, 'index'])->name('property')->middleware('auth');
Route::get('/admin/property/create', [PropertyController::class, 'create'])->name('create-property')->middleware('auth');
Route::post('/admin/property/create', [PropertyController::class, 'store'])->middleware('auth');

Route::get('/admin/property-type', [DashboardController::class, 'propertyType'])->name('property-type')->middleware('auth');
Route::get('/admin/property-categories', [DashboardController::class, 'propertyCategories'])->name('property-cateories')->middleware('auth');

Route::get('/admin/land', [LandController::class, 'index'])->name('land')->middleware('auth');
Route::get('/admin/land/create', [LandController::class, 'create'])->name('create-land')->middleware('auth');
Route::post('/admin/land/create', [LandController::class, 'store'])->middleware('auth');

Route::get('/admin/list-admin', [DashboardController::class, 'adminList'])->name('list-admin')->middleware('auth');

Route::get('/admin/inbox', [DashboardController::class, 'msgInbox'])->name('inbox')->middleware('auth');