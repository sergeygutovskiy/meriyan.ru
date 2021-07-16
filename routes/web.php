<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PageController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\Feedback\FeedbackBookingController;
use App\Http\Controllers\Feedback\FeedbackQuestionController;
use App\Http\Controllers\Feedback\FeedbackSelectionRequestController;

use App\Http\Controllers\Api\ApiToursController;
use App\Http\Controllers\Api\ApiSeasonsController;
use App\Http\Controllers\Api\ApiComplexitiesController;
use App\Http\Controllers\Api\ApiTagsController;


Route::get('/admin', function() { return view('pages.admin'); });
Route::get('/admin/{any}', function() { return view('pages.admin'); })->where('any', '.*');

Route::prefix('api/v1')->group(function () {
    Route::post('/tours', [ ApiToursController::class, 'store' ]);
    Route::post('/tours/info', [ ApiToursController::class, 'store_info' ]);
    
    Route::get('/tours/{id}', [ ApiToursController::class, 'show' ]);

    Route::get('/tours/{id}/tags', [ ApiToursController::class, 'tags' ]);
    Route::post('/tours/{id}/tags', [ ApiToursController::class, 'store_tags' ]);
    
    Route::get('/tours/{id}/locations', [ ApiToursController::class, 'locations' ]);
    Route::post('/tours/{id}/locations', [ ApiToursController::class, 'store_locations' ]);
    Route::post('/tours/{tour_id}/locations/{id}', [ ApiToursController::class, 'update_locations' ]);
    Route::delete('/tours/{tour_id}/locations/{id}', [ ApiToursController::class, 'delete_locations' ]);

    Route::get('/tours/{id}/services', [ ApiToursController::class, 'services' ]);
    Route::post('/tours/{id}/services', [ ApiToursController::class, 'store_services' ]);
    Route::post('/tours/{tour_id}/services/{id}', [ ApiToursController::class, 'update_services' ]);
    Route::delete('/tours/{tour_id}/services/{id}', [ ApiToursController::class, 'delete_services' ]);

    Route::post('/tours/{id}', [ ApiToursController::class, 'update' ]);
    Route::post('/tours/{id}/info', [ ApiToursController::class, 'update_info' ]);    

    Route::get('/seasons', [ ApiSeasonsController::class, 'index'  ]);
    Route::get('/complexities', [ ApiComplexitiesController::class, 'index'  ]);
    Route::get('/tags', [ ApiTagsController::class, 'index'  ]);
});

Route::prefix('api')->group(function () {
    Route::post('/tours/search', [ App\Http\Controllers\Admin\TourController::class,       'search' ]);
    Route::get( '/tours',        [ App\Http\Controllers\Admin\TourController::class,       'index'  ]);
    Route::post('/tours',        [ App\Http\Controllers\Admin\TourController::class,       'store'  ]);
    Route::get( '/tours/{id}',   [ App\Http\Controllers\Admin\TourController::class,       'show'   ]);
    Route::post('/tours/{id}',   [ App\Http\Controllers\Admin\TourController::class,       'update' ]);

    Route::get( '/tags',         [ App\Http\Controllers\Admin\TagController::class,        'index'  ]);
    Route::get( '/seasons',      [ App\Http\Controllers\Admin\SeasonController::class,     'index'  ]);
    Route::get( '/complexities', [ App\Http\Controllers\Admin\ComplexityController::class, 'index'  ]);
});

Route::get('/',             [ PageController::class, 'home'       ])->name("home");
Route::get('/tours',        [ PageController::class, 'tours'      ])->name("tours");
Route::get('/tours/{tour}', [ PageController::class, 'tours_show' ])->name('tour.show');
Route::get('/tags/{tag}',   [ PageController::class, 'tags_show'  ])->name('tag.show');
Route::get('/about',        [ PageController::class, 'about'      ])->name("about");
Route::get('/contacts',     [ PageController::class, 'contacts'   ])->name("contacts");
Route::get('/search',       [ PageController::class, 'search'     ])->name("search");

Route::get( '/feedback/selection-requests', [ FeedbackSelectionRequestController::class , 'index' ]);
Route::post('/feedback/selection-requests', [ FeedbackSelectionRequestController::class , 'store' ]);
Route::get( '/feedback/booking',            [ FeedbackBookingController::class          , 'index' ]);
Route::post('/feedback/booking',            [ FeedbackBookingController::class          , 'store' ]);
Route::get( '/feedback/questions',          [ FeedbackQuestionController::class         , 'index' ]);
Route::post('/feedback/questions',          [ FeedbackQuestionController::class         , 'store' ]);
