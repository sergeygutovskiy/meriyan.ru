<?php

use Illuminate\Support\Facades\Route;
use App\Models\Tours\Tour;
use App\Models\Tag;

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
    $tours = Tour::with('tags')->get();

    return view('pages.home', [ 'tours' => $tours ]);
})->name("home");

Route::get('/tours', function () {
    $tours = Tour::get();

    return view('pages.tours.index', [ 'tours' => $tours ]);
})->name("tours");

Route::get('/tours/{tour}', function (Tour $tour) {
    $tour = Tour::with('tags')
        ->where('id', $tour->id)
        ->first();
    
    return view('pages.tours.show', [ 'tour' => $tour ]);
})->name('tour.show');

Route::get('/tags/{tag}', function (Tag $tag) {
    $tag = Tag::with('tours')
        ->where('id', $tag->id)
        ->first();

    return view('pages.tags.show', [ 'tag' => $tag ]);
})->name('tag.show');

Route::get('/about', function () {
    $tours = Tour::with('tags')->get();
    
    return view('pages.about', [ 'tours' => $tours ]);
})->name("about");

Route::get('/contacts', function () {
    return view('pages.contacts');
})->name("contacts");
