<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Complexity;

class ApiComplexitiesController extends Controller
{
    public function index()
    {
        return json_encode([
            'status' => 1,
            'data' => [ 'complexities' => Complexity::get() ]
        ]);
    }
}
