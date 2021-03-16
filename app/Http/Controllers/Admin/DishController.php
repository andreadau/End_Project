<?php

namespace App\Http\Controllers\Admin;

use App\Dish;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dishes = Dish::all();
        return view('admin.dishes.index', compact('dishes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.dishes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $user = Auth::id();
        $request['slug'] = Str::slug($request->name);
        // $request['user_id'] = $user;
        {
            $validatedData = $request->validate([
                'name' => 'required',
                'slug' => 'required',
                'ingredients' => 'required',
                'visibility' => 'required',
                'price' => 'required',
                'cover' => 'nullable | image',
                'user_id' => 'exists:users,id'
            ]);

            $cover = Storage::put('dish_img', $request->cover);
            $validatedData['cover'] = $cover;
        }

        Dish::create($validatedData);

        return redirect()->route('admin.dishes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function show(Dish $dish)
    {
        // $user = Auth::id();

        // if ($user !== $dish->user_id) {
            // return redirect("/");
        // } else {
            return view('admin.dishes.show', compact('dish'));
        // } 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function edit(Dish $dish)
    {
        // $user = Auth::id();

        // if ($user !== $dish->user_id) {
            // return redirect("/");
        // } else {
            return view('admin.dishes.edit', compact('dish'));
        // }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dish $dish)
    {
        $request['slug'] = Str::slug($request->name);

        if($request->hasFile('cover')){
            Storage::delete($dish->cover);
            $validatedData = $request->validate([
                'name' => 'required',
                'slug' => 'required',
                'ingredients' => 'required',
                'price' => 'required',
                'cover' => 'nullable | image | mimes:jpeg,png,jpg,gif,svg',
                'user_id' => 'exists:users,id'
            ]);
            $cover = Storage::put('dish_img', $request->cover);
            $validatedData['cover'] = $cover;
            $dish->update($validatedData);
        }else{
            $validatedData = $request->validate([
                'name' => 'required',
                'slug' => 'required',
                'ingredients' => 'required',
                'price' => 'required',
                'cover' => 'nullable | image | mimes:jpeg,png,jpg,gif,svg',
                'user_id' => 'exists:users,id'
            ]);
            $dish->update($validatedData);
        }
        return redirect()->route('admin.dishes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dish $dish)
    {
        Storage::delete($dish->cover);

        $dish->delete();
        return redirect()->route('admin.dishes.index');
    }
}
