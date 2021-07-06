<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Http\Controllers\TourController;
use App\Http\Controllers\TagController;

use App\Models\Tours\Tour;
use App\Models\Requests\TourSelection;
use App\Models\Requests\Question;
use App\Models\Requests\TourBooking;

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

Route::prefix('admin')->group(function () {
    Route::view('/',  'pages.admin');
});

Route::prefix('api')->group(function () {
    Route::get('/tours', [ App\Http\Controllers\Admin\TourController::class, 'index' ]);
    Route::post('/tours', [ App\Http\Controllers\Admin\TourController::class, 'store' ]);
    Route::get('/tours/{id}', [ App\Http\Controllers\Admin\TourController::class, 'show' ]);
    Route::post('/tours/{id}', [ App\Http\Controllers\Admin\TourController::class, 'update' ]);

    Route::get('/tags', [ App\Http\Controllers\Admin\TagController::class, 'index' ]);

    Route::get('/seasons', [ App\Http\Controllers\Admin\SeasonController::class, 'index' ]);

    Route::get('/complexities', [ App\Http\Controllers\Admin\ComplexityController::class, 'index' ]);
});

Route::get("/tours", [ TourController::class, 'index' ]);

Route::get('/', function () {
    $tours = Tour::with('tags')->get();

    return view('pages.home', [ 'tours' => $tours ]);
})->name("home");

Route::get('/tours', [ TourController::class, 'popular' ])->name("tours");
Route::get('/tours/{tour}', [ TourController::class, 'show' ])->name('tour.show');

Route::get('/tags/{tag}', [ TagController::class, 'show' ])->name('tag.show');

Route::get('/about', function () {
    $tours = Tour::with('tags')->get();
    
    return view('pages.about', [ 'tours' => $tours ]);
})->name("about");

Route::get('/contacts', function () { return view('pages.contacts'); })->name("contacts");
Route::get('/search', function () { return view('pages.search'); })->name("search");


Route::post("/requests/tour-selections", function (Request $request) {
    $validator = Validator::make($request->all(), [
        'name' => 'required',
        'phone' => 'required',
        'email' => 'required|email',
        'wishes' => ''
    ], $messages = [
        'name.required' => 'Пожалуйста, укажите ваше имя',
        'phone.required' => 'Пожалуйста, укажите ваш телефон',
        'email.required' => 'Пожалуйста, укажите вашу почту',
        'email.email' => 'Почта некоретна'
    ]);
    
    if ($validator->fails()) {    
        return response()->json($validator->messages(),  Response::HTTP_BAD_REQUEST);
    }

    $req = TourSelection::create([
        'name' => $request->input('name'),
        'phone' => $request->input('phone'),
        'email' => $request->input('email'),
        'wishes' => strlen($request->input('wishes')) ? $request->input('wishes') : ''
    ]);

    return "OK";
});

Route::post("/requests/questions", function (Request $request) {
    $validator = Validator::make($request->all(), [
        'name' => 'required',
        'email' => 'required|email',
        'question' => ''
    ], $messages = [
        'name.required' => 'Пожалуйста, укажите ваше имя',
        'email.required' => 'Пожалуйста, укажите вашу почту',
        'email.email' => 'Почта некоретна'
    ]);
    
    if ($validator->fails()) {    
        return response()->json($validator->messages(),  Response::HTTP_BAD_REQUEST);
    }

    $req = Question::create([
        'name' => $request->input('name'),
        'email' => $request->input('email'),
        'question' => strlen($request->input('question')) ? $request->input('question') : ''
    ]);

    return "OK";
});

Route::post("/requests/tour-bookings", function (Request $request) {
    $validator = Validator::make($request->all(), [
        'name' => 'required',
        'phone' => 'required',
        'email' => 'required|email',
    ], $messages = [
        'name.required' => 'Пожалуйста, укажите ваше имя',
        'phone.required' => 'Пожалуйста, укажите ваш телефон',
        'email.required' => 'Пожалуйста, укажите вашу почту',
    ]);
    
    if ($validator->fails()) {    
        return response()->json($validator->messages(),  Response::HTTP_BAD_REQUEST);
    }

    $req = TourBooking::create([
        'name' => $request->input('name'),
        'phone' => $request->input('phone'),
        'email' => $request->input('email'),
    ]);

    return "OK";
});
