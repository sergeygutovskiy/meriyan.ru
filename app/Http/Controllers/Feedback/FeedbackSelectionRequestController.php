<?php

namespace App\Http\Controllers\Feedback;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use App\Models\Feedback\FeedbackSelectionRequest;

class FeedbackSelectionRequestController extends Controller
{
    public function index()
    {
        return FeedbackSelectionRequest::get();
    }

    public function store(Request $request)
    {
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
    
        $req = FeedbackSelectionRequest::create([
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
            'wishes' => strlen($request->input('wishes')) ? $request->input('wishes') : ''
        ]);
    
        return 'OK';
    }
}
