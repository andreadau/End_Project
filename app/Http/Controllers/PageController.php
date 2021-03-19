<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Restaurant;
use Illuminate\Http\Request;

class PageController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurants = Restaurant::all();
        return view('guests.index', compact('restaurants'));
    }

    
    /**
     * Display the specified resource.
     *
     * @param  \App\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function show(Restaurant $restaurant)
    {
        return view('guests.show', compact('restaurant'));
    }

}
