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
}
