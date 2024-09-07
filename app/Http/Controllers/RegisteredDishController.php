<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisteredDishController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $file = $request->file('image');
        $file_name ='activity_' . time() . '.' . $file->geyClientOriginalExtension();
        $path = $file->storeAs('public/images', $file_name);

        RegisteredDish::create([
            'dishes_categories_id' => $request->dishes_categories_id,
            'subcategories_id' => $request->subcategories_id,
            'title' =>$request->title,
            'description' =>$request->description,
            'dish_price' =>$request->dish_price,
            'image'=>$file_name,
        ]);
        return "Dish registered sucesfully";
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $dish = RegisteredDish::select(
            'dishes_categories.name as category',
            'registered_dishes.title',
            'registered_dishes.description',
            'registered_dishes.dish_price',
            'registered_dishes.image',
            'subcategories.name as subcategory'
        )
        ->join('dishes_categories', 'registered_dishes.dishes_categories.id', '=', 'dishes_categories.id')
        ->join('subcategories', 'registered_dishes.subcategories.id', '=', 'subcategories.id')
        ->where('registered_dishes.id', $id)
        ->get();

        $dish[0]->image = "http://pacificenterprise.test/storage/images/".$dish[0]->image;

        return $dish;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
