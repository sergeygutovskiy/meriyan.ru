<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Complexity;

class ComplexityController extends Controller
{
    public function index()
    {
        return Complexity::get();
    }
}
