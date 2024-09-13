<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\RegisteredDish;

class RegisteredDishController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $dishes = RegisteredDish::select(
            'registered_dishes.id',
            'registered_dishes.title',
            'registered_dishes.image',
            'registered_dishes.dish_price',
            'registered_dishes.description',
            'dishes_categories.name as category',
            'subcategories.name as subcategory',
        )
        ->join('dishes_categories', 'registered_dishes.dishes_categories_id', '=', 'dishes_categories.id')
        ->join('subcategories', 'registered_dishes.subcategories_id', '=', 'subcategories.id')
        ->get();
    
        foreach ($dishes as $dish) {
            $dish->image = "http://pacificenterprise.test/storage/images/".$dish->image;
        }
    
        return $dishes;
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
        $dish = RegisteredDish::select(
            'dishes_categories.name as category',
            'registered_dishes.title',
            'registered_dishes.description',
            'registered_dishes.dish_price',
            'registered_dishes.image',
            'subcategories.name as subcategory'
        )
        ->join('dishes_categories', 'registered_dishes.dishes_categories_id', '=', 'dishes_categories.id')
        ->join('subcategories', 'registered_dishes.subcategories_id', '=', 'subcategories.id')
        ->where('registered_dishes.id', $id)
        ->first();
    
        if (!$dish) {
            return response()->json(['message' => 'Dish not found'], 404);
        }
    
        $dish->image = "http://pacificenterprise.test/storage/images/".$dish->image;
    
        return response()->json($dish);
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
