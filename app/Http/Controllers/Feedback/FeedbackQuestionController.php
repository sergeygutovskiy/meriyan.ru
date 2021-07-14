<?php

namespace App\Http\Controllers\Feedback;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use App\Models\Feedback\FeedbackQuestion;

class FeedbackQuestionController extends Controller
{
    public function index()
    {
        return FeedbackQuestion::get();
    }

    public function store(Request $request)
    {
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
    
        $req = FeedbackQuestion::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'question' => strlen($request->input('question')) ? $request->input('question') : ''
        ]);
    
        return 'OK';
    }
}
