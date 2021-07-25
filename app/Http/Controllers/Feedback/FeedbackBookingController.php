<?php

namespace App\Http\Controllers\Feedback;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use App\Models\Feedback\FeedbackBooking;
use Illuminate\Support\Facades\Mail;
use App\Models\Tours\Tour;

class FeedbackBookingController extends Controller
{
    public function index()
    {
        return FeedbackBooking::with('tour')->get();
    }

    public function store(Request $request)
    {
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
    
        $req = FeedbackBooking::create([
            'tour_id' => $request->input('tour_id'),
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
        ]);
    
        Mail::raw(
            'Заявка на бронирование | '
            . 'Тур: ' . Tour::where('id', $request->input('tour_id'))->first()->title . ' | '
            . 'Имя: ' . $request->input('name') . ' | '
            . 'Телефон: ' . $request->input('phone') . ' | '
            . 'Почта: ' . $request->input('email')
            , function($message) {
            $message
            ->subject('Новая заявка')
            ->to('sergey.gutovsk@gmail.com');
        });

        return 'OK';
    }
}
