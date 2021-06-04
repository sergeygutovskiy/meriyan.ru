<?php

use Illuminate\Support\Facades\Route;
use App\Models\Tours\Tour;
use App\Http\Controllers\TourController;
use App\Http\Controllers\TagController;

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


Route::get("/tours", [ TourController::class, 'index' ]);

Route::get('/', function () {
    $tours = Tour::with('tags')->get();

    return view('pages.home', [ 'tours' => $tours ]);
})->name("home");

Route::get('/tours', [ TourController::class, 'index' ])->name("tours");
Route::get('/tours/{tour}', [ TourController::class, 'show' ])->name('tour.show');

Route::get('/tags/{tag}', [ TagController::class, 'show' ])->name('tag.show');

Route::get('/about', function () {
    $tours = Tour::with('tags')->get();
    
    return view('pages.about', [ 'tours' => $tours ]);
})->name("about");

Route::get('/contacts', function () { return view('pages.contacts'); })->name("contacts");
Route::get('/search', function () { return view('pages.search'); })->name("search");
