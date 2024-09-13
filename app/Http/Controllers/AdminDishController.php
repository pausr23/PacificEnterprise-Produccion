<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Models\DishesCategory;
use App\Models\RegisteredDish;
use App\Models\Subcategory;

class AdminDishController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Obtener los valores del input de búsqueda y la categoría seleccionada
        $searchTerm = $request->input('dish');
        $categoryId = $request->input('category');
    
        // Query base
        $query = RegisteredDish::select(
            'registered_dishes.id',
            'dishes_categories.name as category',
            'subcategories.name as subcategory',
            'registered_dishes.title',
            'registered_dishes.description',
            'registered_dishes.dish_price'
        )
        ->join('dishes_categories', 'registered_dishes.dishes_categories_id', '=', 'dishes_categories.id')
        ->join('subcategories', 'registered_dishes.subcategories_id', '=', 'subcategories.id');
    
        // Filtrar por nombre de platillo
        if (!empty($searchTerm)) {
            $query->where('registered_dishes.title', 'like', '%' . $searchTerm . '%');
        }
    
        // Filtrar por categoría si no es "Todo" (que será la opción con valor 0)
        if (!empty($categoryId) && $categoryId != 0) {
            $query->where('dishes_categories.id', $categoryId);
        }
    
        // Obtener los resultados
        $dishes = $query->get();
    
        $categories = DishesCategory::all();
        $subcategories = Subcategory::all();
        $total = $dishes->count(); 
    
        return view('dishes.index', compact('dishes', 'total', 'categories', 'subcategories'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $selectedCategoryId = $request->input('dishes_categories_id');

        $categories = DishesCategory::all();
        $subcategories = Subcategory::all();

        return view('dishes.create', compact('categories', 'subcategories', 'selectedCategoryId'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'dish_price' => 'required|numeric',
            'description' => 'nullable|string',
            'dishes_categories_id' => 'required|exists:dishes_categories,id',
            'subcategories_id' => 'required|exists:subcategories,id',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $file_name = 'default.jpg'; 

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $file_name = 'dish_' . time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/images', $file_name);
        }

        RegisteredDish::create([
            'dishes_categories_id' => $request->dishes_categories_id,
            'subcategories_id' => $request->subcategories_id,
            'title' => $request->title,
            'description' => $request->description,
            'image' => $file_name,
            'dish_price' => $request->dish_price,
        ]);

        return redirect()->route('dishes.index')->with('success', 'Item registrado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $dish = RegisteredDish::select(
            'dishes_categories.name as category',
            'registered_dishes.title as title',
            'registered_dishes.description',
            'registered_dishes.image',
            'registered_dishes.dish_price',
            'subcategories.name as subcategory'
        )
        ->join('dishes_categories', 'registered_dishes.dishes_categories_id', '=', 'dishes_categories.id')
        ->join('subcategories', 'registered_dishes.subcategories_id', '=', 'subcategories.id')
        ->where('registered_dishes.id', $id)
        ->first();

        return view('dishes.show', compact('dish'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $dish = RegisteredDish::find($id);
        $categories = DishesCategory::all();
        $subcategories = Subcategory::all();
        $currentImage = asset('storage/images/' . $dish->image);
        
        return view('dishes.edit', compact('dish', 'categories', 'subcategories', 'currentImage'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'dish_price' => 'required|numeric',
            'description' => 'nullable|string',
            'dishes_categories_id' => 'required|exists:dishes_categories,id',
            'subcategories_id' => 'required|exists:subcategories,id',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $dish = RegisteredDish::find($id);
        $file_name = $dish->image; 

        if ($request->hasFile('image')) {
          
            if (File::exists(public_path('storage/images/' . $file_name)) && $file_name != 'default.jpg') {
                File::delete(public_path('storage/images/' . $file_name));
            }

            $file = $request->file('image');
            $file_name = 'dish_' . time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/images', $file_name);
        }

        $dish->update([
            'dishes_categories_id' => $request->dishes_categories_id,
            'subcategories_id' => $request->subcategories_id,
            'title' => $request->title,
            'description' => $request->description,
            'image' => $file_name,
            'dish_price' => $request->dish_price,
        ]);

        return redirect()->route('dishes.index')->with('success', 'Item actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dish = RegisteredDish::find($id);
        if ($dish) {
            // Eliminar la imagen del disco
            if (File::exists(public_path('storage/images/' . $dish->image)) && $dish->image != 'default.jpg') {
                File::delete(public_path('storage/images/' . $dish->image));
            }
            $dish->delete();
        }

        return redirect()->route('dishes.index')->with('success', 'Item eliminado correctamente.');
    }
}

