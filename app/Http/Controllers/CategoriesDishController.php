<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;


use App\Models\DishesCategory;

class CategoriesDishController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($categoryId)
    {
        $categories = DishesCategory::where('id', $categoryId)
            ->with(['subcategories.dishes' => function ($query) {
                $query->select(
                    'registered_dishes.id',
                    'registered_dishes.title',
                    'registered_dishes.description',
                    'registered_dishes.units',
                    'registered_dishes.dish_price',
                    'registered_dishes.image',
                    'registered_dishes.subcategories_id'
                );
            }])
            ->get();

        foreach ($categories as $category) {
            foreach ($category->subcategories as $subcategory) {
                foreach ($subcategory->dishes as $dish) {
                    $dish->image = "http://projectPlanner.test/storage/images/" . $dish->image;
                }
            }
        }

        return response()->json($categories);
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
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        // Obtener todas las categorías con sus subcategorías
        $categories = DishesCategory::with('subcategories')->get();

        // Devolver los datos en formato JSON
        return response()->json($categories);
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
