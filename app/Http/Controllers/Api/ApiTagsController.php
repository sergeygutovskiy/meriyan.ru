<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Tag;

class ApiTagsController extends Controller
{
    public function index()
    {
        return json_encode([
            'status' => 1,
            'data' => [ 'tags' => Tag::get() ]
        ]);
    }

    public function update($id, Request $r)
    {
        $tag = Tag::where('id', $id)->first();
        $input = (array) json_decode($r->input('input'));

        $tag->update([
            'description' => $input['description']
        ]);

        return json_encode([
            'status' => 1,
            'data' => []
        ]);
    }
}
