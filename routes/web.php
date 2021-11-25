<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\LandController;
use App\Http\Controllers\CustomizeHomePageController;
use App\Http\Controllers\CustomizeServicesPageController;
use App\Http\Controllers\CustomizeAboutPageController;
use App\Http\Controllers\CustomizeContactPageController;


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
Route::get('/preview', [HomeController::class, 'index']);
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

//searching
Route::get('/search-property', [HomeController::class, 'search_property'])->name('search.property');
//sort by
Route::get('/sort-listing', [HomeController::class, 'sort_property'])->name('sort.property');

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
Route::get('/admin/property/{id}', [PropertyController::class, 'read'])->name('read-property')->middleware('auth');
Route::get('/admin/property/edit/{id}', [PropertyController::class, 'edit'])->name('edit-property')->middleware('auth');
Route::put('/admin/property/update/{id}', [PropertyController::class, 'update'])->name('update-property')->middleware('auth');
Route::delete('/admin/property/delete/{id}', [PropertyController::class, 'destroy'])->name('delete-property')->middleware('auth');

Route::get('/admin/land', [LandController::class, 'index'])->name('land')->middleware('auth');
Route::get('/admin/land/create', [LandController::class, 'create'])->name('create-land')->middleware('auth');
Route::post('/admin/land/create', [LandController::class, 'store'])->middleware('auth');
Route::get('/admin/land/{id}', [LandController::class, 'read'])->name('read-land')->middleware('auth');
Route::get('/admin/land/edit/{id}', [LandController::class, 'edit'])->name('edit-land')->middleware('auth');
Route::put('/admin/land/update/{id}', [LandController::class, 'update'])->name('update-land')->middleware('auth');
Route::delete('/admin/land/delete/{id}', [LandController::class, 'destroy'])->name('delete-land')->middleware('auth');

Route::get('/admin/list-admin', [DashboardController::class, 'adminList'])->name('list-admin')->middleware('auth');
Route::get('/admin/edit/{id}', [RegisterController::class, 'edit'])->name('edit-admin')->middleware('auth');
Route::put('/admin/update/{id}', [RegisterController::class, 'update'])->name('update-admin')->middleware('auth');
Route::delete('/admin/list-admin/delete/{id}', [DashboardController::class, 'adminDestroy'])->name('delete-admin')->middleware('auth');

Route::get('/admin/inbox-contact', [DashboardController::class, 'msgInbox'])->name('contact-inbox')->middleware('auth');
Route::get('/admin/inbox-contact/{id}', [DashboardController::class, 'readMsgInbox'])->name('read-inbox')->middleware('auth');
Route::get('/admin/inbox-respond/{id}', [DashboardController::class, 'inboxResponded'])->name('respond-inbox')->middleware('auth');
Route::delete('/admin/inbox-contact/delete/{id}', [DashboardController::class, 'deleteInbox'])->name('delete-inbox')->middleware('auth');

Route::get('/admin/inbox-inquiry', [DashboardController::class, 'inquiryInbox'])->name('inquiry-inbox')->middleware('auth');
Route::get('/admin/inbox-inquiry/{id}', [DashboardController::class, 'readInquiryInbox'])->name('read-inquiry')->middleware('auth');
Route::get('/admin/inquiry-respond/{id}', [DashboardController::class, 'inquiryResponded'])->name('respond-inquiry')->middleware('auth');
Route::delete('/admin/inbox-inquiry/delete/{id}', [DashboardController::class, 'deleteInquiry'])->name('delete-inquiry')->middleware('auth');

Route::get('/admin/customize/homepage', [CustomizeHomePageController::class, 'create'])->name('customize-homepage')->middleware('auth');
Route::post('/admin/customize/homepage/create', [CustomizeHomePageController::class, 'store'])->middleware('auth');
Route::put('/admin/customize/homepage/update/{id}', [CustomizeHomePageController::class, 'update'])->name('update-homepage')->middleware('auth');

Route::get('/admin/customize/services', [CustomizeServicesPageController::class, 'index'])->name('customize-service')->middleware('auth');
Route::get('/admin/customize/services/create', [CustomizeServicesPageController::class, 'create'])->name('service-create')->middleware('auth');
Route::post('/admin/customize/services/create', [CustomizeServicesPageController::class, 'store'])->middleware('auth');
Route::get('/admin/customize/services/edit/{id}', [CustomizeServicesPageController::class, 'edit'])->name('edit-service')->middleware('auth');
Route::put('/admin/customize/services/update/{id}', [CustomizeServicesPageController::class, 'update'])->name('update-service')->middleware('auth');
Route::delete('/admin/customize/services/delete/{id}', [CustomizeServicesPageController::class, 'destroy'])->name('delete-service')->middleware('auth');

Route::get('/admin/customize/about-us', [CustomizeAboutPageController::class, 'index'])->name('customize-about')->middleware('auth');
Route::get('/admin/customize/about-us/create', [CustomizeAboutPageController::class, 'createPage'])->name('about-create')->middleware('auth');
Route::post('/admin/customize/about-us/create', [CustomizeAboutPageController::class, 'storePage'])->middleware('auth');
Route::put('/admin/customize/about-us/update/{id}', [CustomizeAboutPageController::class, 'updatePage'])->name('update-about')->middleware('auth');

Route::get('/admin/customize/about-us/create/team', [CustomizeAboutPageController::class, 'create'])->name('team-create')->middleware('auth');
Route::post('/admin/customize/about-us/create/team', [CustomizeAboutPageController::class, 'store'])->middleware('auth');
Route::get('/admin/customize/about-us/team/edit/{id}', [CustomizeAboutPageController::class, 'edit'])->name('edit-team')->middleware('auth');
Route::put('/admin/customize/about-us/team/update/{id}', [CustomizeAboutPageController::class, 'update'])->name('update-team')->middleware('auth');
Route::delete('/admin/customize/about-us/team/delete/{id}', [CustomizeAboutPageController::class, 'destroy'])->name('delete-team')->middleware('auth');


Route::get('/admin/customize/contact', [CustomizeContactPageController::class, 'create'])->name('customize-contact')->middleware('auth');
Route::post('/admin/customize/contact/create', [CustomizeContactPageController::class, 'store'])->middleware('auth');
Route::put('/admin/customize/contact/update/{id}', [CustomizeContactPageController::class, 'update'])->name('update-contact')->middleware('auth');

