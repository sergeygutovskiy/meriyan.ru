<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
{
    public function show($id)
    {
        $tag = Tag::with('tours')
            ->where('id', $id)
            ->first();

        return view('pages.tags.show', [ 'tag' => $tag ]);
    }
}
