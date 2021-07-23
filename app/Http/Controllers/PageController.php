<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Tours\Tour;
use App\Models\Tag;
use App\Models\Season;
use App\Models\Complexity;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function home()
    {
        $tours = Tour::with('tags')->get();

        return view('pages.home', [ 'tours' => $tours ]);
    }

    public function about()
    {
        $tours = Tour::with('tags')->get();
    
        return view('pages.about', [ 'tours' => $tours ]);
    }

    public function contacts()
    {
        return view('pages.contacts');
    }

    public function search()
    {
        $tours = Tour::orderBy('discount_price', 'desc')->get();
        $seasons = Season::get();
        $tags = Tag::get();
        $complexities = Complexity::get();

        $min_price = Tour::min('price');
        $max_price = Tour::max('price');

        return view('pages.search', [
            'tours' => $tours,
            'seasons' => $seasons,
            'tags' => $tags,
            'complexities' => $complexities,
            'min_price' => $min_price,
            'max_price' => $max_price
        ]);
    }

    public function tours()
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

    public function tours_show($id)
    {
        $tour = Tour::with('tags')->where('id', $id)->first();

        return view('pages.tours.show', [ 'tour' => $tour ]);
    }

    public function tags_show($id)
    {
        $tag = Tag::with('tours')->where('id', $id)->first();

        return view('pages.tags.show', [ 'tag' => $tag ]);
    }

    public function login()
    {
        return view('pages.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('admin');
        }

        return back()->withErrors(['a' => 'a']);
    }
}
