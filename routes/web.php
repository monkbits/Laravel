<?php

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
# all listing
Route::get('/', [ListingController::class, 'index']);


#show create forms
Route::get('/listings/create', [ListingController::class, 'create'])->middleware('auth');


# store listing data

Route::post('/listings', [ListingController::class, 'store'])->middleware('auth');

#Show Edit Form
Route::get('/listings/{listing}/edit',[ListingController::class, 'edit'])->middleware('auth');

#Edit sumbit to update

Route::put('listings/{listing}',[ListingController::class, 'update'])->middleware('auth');

#Delete sumbit to update
Route::delete('listings/{listing}',[ListingController::class, 'destroy'])->middleware('auth');

// manage listing
Route::get('/listings/manage',[ListingController::class,"manage"])->middleware('auth');

# single listing

Route::get('/listings/{listing}', [ListingController::class, 'show']);

# show register/create form

Route::get('/register', [UserController::class, 'create'])->middleware('guest');

#user store

Route::post('/users', [UserController::class, 'store']);

Route::post('/logout',[UserController::class, 'logout'])->middleware('auth');;

Route::get('/login',[UserController::class, 'login'])->name('login')->middleware('guest');

Route::post('/users/authenticate', [UserController::class, 'authenticate']);


//Common Resource Routes
//index -Show all listings
// show - Show single Listing
// Create - Show form to create to create new Listing
// Store - Store new Listing
// Edit - Show form to edit Listing
// update - Update Listing
// destroy - delete Listing