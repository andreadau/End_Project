<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        $restaurants = $user->restaurants;
        // $restaurants = Restaurant::all();
        return view('admin.restaurants.index', compact('restaurants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.restaurants.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::id();
        $request['slug'] = Str::slug($request->name);
        $request['user_id'] = $user;

        if(!$request->hasFile('cover')){
            $validatedData = $request->validate([
                'name' => 'required',
                'slug' => 'required',
                'address' => 'required',
                'phone' => 'required',
                'cover' => 'nullable | image',
                'user_id' => 'exists:users,id'
            ]);
        }else{
            $validatedData = $request->validate([
                'name' => 'required',
                'slug' => 'required',
                'address' => 'required',
                'phone' => 'required',
                'cover' => 'nullable | image | mimes:jpeg,png,jpg,gif,svg',
                'user_id' => 'exists:users,id'
            ]);
            $cover = Storage::put('restaurant_img', $request->cover);
            $validatedData['cover'] = $cover;
        }

        Restaurant::create($validatedData);

        return redirect()->route('admin.restaurants.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function show(Restaurant $restaurant)
    {   
        $user = Auth::id();

        if ($user !== $restaurant->user_id) {
            return redirect("/");
        } else {
            return view('admin.restaurants.show', compact('restaurant'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function edit(Restaurant $restaurant)
    {
        $user = Auth::id();

        if ($user !== $restaurant->user_id) {
            return redirect("/");
        } else {
            return view('admin.restaurants.edit', compact('restaurant'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Restaurant $restaurant)
    {
        $request['slug'] = Str::slug($request->name);

        if($request->hasFile('cover')){
            Storage::delete($restaurant->cover);
            $validatedData = $request->validate([
                'name' => 'required',
                'slug' => 'required',
                'address' => 'required',
                'phone' => 'required',
                'cover' => 'nullable | image | mimes:jpeg,png,jpg,gif,svg',
                'user_id' => 'exists:users,id'
            ]);
            $cover = Storage::put('restaurant_img', $request->cover);
            $validatedData['cover'] = $cover;
            $restaurant->update($validatedData);
        }else{
            $validatedData = $request->validate([
                'name' => 'required',
                'slug' => 'required',
                'address' => 'required',
                'phone' => 'required',
                'cover' => 'nullable | image | mimes:jpeg,png,jpg,gif,svg',
                'user_id'=>'exists:user,id',
            ]);
            $restaurant->update($validatedData);
        }
        return redirect()->route('admin.restaurants.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurant $restaurant)
    {
        Storage::delete($restaurant->cover);
        
        $restaurant->delete();
        return redirect()->route('admin.restaurants.index');
    }
}
