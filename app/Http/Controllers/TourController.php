<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tours\Tour;
use App\Models\Tag;

class TourController extends Controller
{
    // public function index()
    // {
    //     $tours = Tour::get();

    //     return view('pages.tours.index', [ 'tours' => $tours ]);
    // }

    public function popular()
    {
        $tag1 = Tag::with('tours')->where('id', 88)->first();
        $tag2 = Tag::with('tours')->where('id', 87)->first();
        $tag3 = Tag::with('tours')->where('id', 94)->first();

        return view('pages.tours.index', [ 
            'tag1' => $tag1, 
            'tag2' => $tag2, 
            'tag3' => $tag3 
        ]);
    }

    public function show($id)
    {
        $tour = Tour::with('tags')
            ->where('id', $id)
            ->first();
    
        return view('pages.tours.show', [ 'tour' => $tour ]);
    }
}
