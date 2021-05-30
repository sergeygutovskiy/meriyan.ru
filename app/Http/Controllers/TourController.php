<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tours\Tour;

class TourController extends Controller
{
    public function index()
    {
        $tours = Tour::get();

        return view('pages.tours.index', [ 'tours' => $tours ]);
    }

    public function show($id)
    {
        $tour = Tour::with('tags')
            ->where('id', $id)
            ->first();
    
        return view('pages.tours.show', [ 'tour' => $tour ]);
    }
}
