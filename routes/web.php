<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\ResetPassword;
use App\Http\Controllers\ChangePassword;            
use App\Http\Controllers\HebergementController;   
use App\Http\Controllers\ReservationsHebergementController;  
      
Route::get('/hebergements', [HebergementController::class,'index'])->name('hebergement.index');
Route::get('/hebergement-create', [HebergementController::class,'create'])->name('hebergement.create');
Route::post('/hebergement-store', [HebergementController::class,'store'])->name('hebergement.store');
Route::delete('/hebergement/{id}', [HebergementController::class,'destroy'])->name('hebergement.destroy');
Route::get('/hebergement-details-{id}', [HebergementController::class,'show'])->name('hebergement.show');
Route::get('/hebergement-edit-{id}', [HebergementController::class,'edit'])->name('hebergement.edit');
Route::put('/hebergement/update/{id}', [HebergementController::class,'update'])->name('hebergement.update');
Route::get('/hebergements-search', [HebergementController::class, 'search'])->name('hebergement.search');
Route::get('/UIDetailsHebergement-{id}', [HebergementController::class, 'detailsHebergement'])->name('hebergement.details'); 
Route::get('/UIhebergements', [HebergementController::class, 'UI_index'])->name('hebergement.UI_index');  

Route::post('/reservations', [ReservationsHebergementController::class, 'store'])->name('reservations.store');
Route::get('/BOReservations', [ReservationsHebergementController::class, 'index_BackOffice'])->name('reservations.index_BackOffice');
Route::get('/MyReservations', [ReservationsHebergementController::class, 'index'])->name('reservations.index');
Route::get('/reservations-{reservation}-payment', [ReservationsHebergementController::class, 'showPaymentForm'])->name('reservations.payment');
Route::post('/reservations/{reservation}/createPaymentIntent', [ReservationsHebergementController::class, 'createPaymentIntent'])
    ->name('reservations.createPaymentIntent');
Route::get('/reservations-{id}', [ReservationsHebergementController::class, 'show'])->name('reservations.details');
Route::get('/reservations/{id}/delete', [ReservationsHebergementController::class, 'delete'])->name('reservations.delete');	


Route::get('/', function () {return redirect('/dashboard');})->middleware('auth');
	Route::get('/register', [RegisterController::class, 'create'])->middleware('guest')->name('register');
	Route::post('/register', [RegisterController::class, 'store'])->middleware('guest')->name('register.perform');
	Route::get('/login', [LoginController::class, 'show'])->middleware('guest')->name('login');
	Route::post('/login', [LoginController::class, 'login'])->middleware('guest')->name('login.perform');
	Route::get('/reset-password', [ResetPassword::class, 'show'])->middleware('guest')->name('reset-password');
	Route::post('/reset-password', [ResetPassword::class, 'send'])->middleware('guest')->name('reset.perform');
	Route::get('/change-password', [ChangePassword::class, 'show'])->middleware('guest')->name('change-password');
	Route::post('/change-password', [ChangePassword::class, 'update'])->middleware('guest')->name('change.perform');
	Route::get('/dashboard', [HomeController::class, 'index'])->name('home')->middleware('auth');
Route::group(['middleware' => 'auth'], function () {
	Route::get('/virtual-reality', [PageController::class, 'vr'])->name('virtual-reality');
	Route::get('/rtl', [PageController::class, 'rtl'])->name('rtl');
	Route::get('/profile', [UserProfileController::class, 'show'])->name('profile');
	Route::post('/profile', [UserProfileController::class, 'update'])->name('profile.update');
	Route::get('/profile-static', [PageController::class, 'profile'])->name('profile-static'); 
	Route::get('/sign-in-static', [PageController::class, 'signin'])->name('sign-in-static');
	Route::get('/sign-up-static', [PageController::class, 'signup'])->name('sign-up-static'); 
	Route::get('/{page}', [PageController::class, 'index'])->name('page');
	Route::post('logout', [LoginController::class, 'logout'])->name('logout');
});