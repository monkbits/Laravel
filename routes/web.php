<?php

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
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
Route::get('/listings/create', [ListingController::class, 'create']);


# store listing data

Route::get('/listings', [ListingController::class, 'store']);


# single listing

Route::get('/listings/{listing}', [ListingController::class, 'show']);




//Common Resource Routes
//index -Show all listings
// show - Show single Listing
// Create - Show form to create to create new Listing
// Store - Store new Listing
// Edit - Show form to edit Listing
// update - Update Listing
// destroy - delete Listing