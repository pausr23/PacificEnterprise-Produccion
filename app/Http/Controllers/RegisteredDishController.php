<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RegisteredDish;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class RegisteredDishController extends Controller
{
    public function index()
    {
        $dishes = RegisteredDish::select(
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

        // Agregar un dd para verificar los datos recuperados
        if ($dishes->isEmpty()) {
            return response()->json(['message' => 'No dishes found'], 404);
        }

        // Mapear para obtener las URLs de Cloudinary
        $dishes->transform(function ($dish) {
            $dish->image = Cloudinary::getUrl($dish->image); // Obtener la URL de la imagen
            return $dish;
        });

        return response()->json($dishes);
    }

    public function show(string $id)
    {
        $dish = RegisteredDish::select(
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

        if (!$dish) {
            return response()->json(['message' => 'Dish not found'], 404);
        }

        // Genera la URL de Cloudinary para la imagen
        $dish->image = Cloudinary::getUrl($dish->image);

        return response()->json($dish);
    }

    public function getImages()
    {
        $dishes = RegisteredDish::all();

        if ($dishes->isEmpty()) {
            return response()->json(['error' => 'No images found'], 404);
        }

        // Solo devuelves las URLs de Cloudinary
        $images = $dishes->map(function ($dish) {
            return Cloudinary::getUrl($dish->image);
        });

        return response()->json($images);
    }
}
