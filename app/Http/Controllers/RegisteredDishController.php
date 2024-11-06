<?php

namespace App\Http\Controllers;

use App\Models\RegisteredDish;

class RegisteredDishController extends Controller
{
    private const DISH_NOT_FOUND_MESSAGE = 'Dish not found';
    private const NO_DISHES_FOUND_MESSAGE = 'No dishes found';

    public function index()
    {
        $dishes = $this->getDishesWithRelations();

        return $dishes->isEmpty()
            ? response()->json(['message' => self::NO_DISHES_FOUND_MESSAGE], 404)
            : response()->json($dishes);
    }

    public function show(string $id)
    {
        $dish = $this->getDishById($id);

        return $dish
            ? response()->json($dish)
            : response()->json(['message' => self::DISH_NOT_FOUND_MESSAGE], 404);
    }

    private function getDishesWithRelations()
    {
        return RegisteredDish::select(
                'registered_dishes.id',
                'registered_dishes.title',
                'registered_dishes.image',
                'registered_dishes.sale_price',
                'registered_dishes.description',
                'dishes_categories.id as category_id',
                'dishes_categories.name as category',
                'subcategories.id as subcategory_id',
                'subcategories.name as subcategory'
            )
            ->join('dishes_categories', 'registered_dishes.dishes_categories_id', '=', 'dishes_categories.id')
            ->join('subcategories', 'registered_dishes.subcategories_id', '=', 'subcategories.id')
            ->get();
    }

    private function getDishById(string $id)
    {
        return RegisteredDish::select(
                'dishes_categories.name as category',
                'registered_dishes.title',
                'registered_dishes.description',
                'registered_dishes.sale_price',
                'registered_dishes.image',
                'subcategories.name as subcategory'
            )
            ->join('dishes_categories', 'registered_dishes.dishes_categories_id', '=', 'dishes_categories.id')
            ->join('subcategories', 'registered_dishes.subcategories_id', '=', 'subcategories.id')
            ->where('registered_dishes.id', $id)
            ->first();
    }
}
