<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PageController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\Feedback\FeedbackBookingController;
use App\Http\Controllers\Feedback\FeedbackQuestionController;
use App\Http\Controllers\Feedback\FeedbackSelectionRequestController;


Route::prefix('admin')->group(function () {
    Route::view('/',  'pages.admin');
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
