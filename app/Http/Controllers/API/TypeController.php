<?php

namespace App\Http\Controllers\API;

use App\Type;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function index()
    {
        return response()->json([
            'success' => true,
            'data' => Type::all()
            ], 200);
    }
}
