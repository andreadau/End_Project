<?php

namespace App\Http\Controllers\API;

use App\Restaurant;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function index()
    {
        return response()->json([
            'success' => true,
            'data' => Restaurant::with('dishes','types')->get()
            ], 200);
    }

    public function show($id) {

        return Restaurant::with('dishes', 'types')->findOrFail($id);
        return response()->json($result,Response::HTTP_OK);
    }
}
