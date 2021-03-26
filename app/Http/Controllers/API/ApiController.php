<?php

namespace App\Http\Controllers\API;

use App\Restaurant;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\Restaurant as RestaurantResource;

class ApiController extends Controller
{
    // public function index()
    // {
    //     return response()->json([
    //         'success' => true,
    //         'data' => Restaurant::with('dishes','types')->get()
    //         ],200
    //     );
    // }

    public function show($id) {
        return Restaurant::with('dishes','types')->findOrFail($id);
        return response()->json($result,Response::HTTP_OK);
    }

    public function index()
    {   
        $selectedTypes = request()->input('types_ids');

        $query = Restaurant::with('types');

        if ($selectedTypes){
            foreach($selectedTypes as $typeID){
                $query->whereHas('types', function($q) use ($typeID){
                    $q->where('id', $typeID);
                });
            }
        }

        $restaurants = $query->get();

        return RestaurantResource::collection($restaurants);  
    }

}
