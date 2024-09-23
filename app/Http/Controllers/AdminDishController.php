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
        $searchTerm = $request->input('dish');
        $categoryId = $request->input('category');
    
        $query = RegisteredDish::select(
            'registered_dishes.id',
            'dishes_categories.name as category',
            'subcategories.name as subcategory',
            'registered_dishes.title',
            'registered_dishes.units',
            'registered_dishes.description',
            'registered_dishes.dish_price'
        )
        ->join('dishes_categories', 'registered_dishes.dishes_categories_id', '=', 'dishes_categories.id')
        ->join('subcategories', 'registered_dishes.subcategories_id', '=', 'subcategories.id');
    
        if (!empty($searchTerm)) {
            $query->where('registered_dishes.title', 'like', '%' . $searchTerm . '%');
        }
    
        if (!empty($categoryId) && $categoryId != 0) {
            $query->where('dishes_categories.id', $categoryId);
        }

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
            'units' => 'required|integer',
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
            'units' => $request->units,
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
            'registered_dishes.units',
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
            'units' => 'required|integer',
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
            'units' => $request->units,
            'image' => $file_name,
            'dish_price' => $request->dish_price,
        ]);

        return redirect()->route('dishes.index')->with('success', 'Item actualizado correctamente.');
    }

    public function order(Request $request) 
    {
        $searchTerm = $request->input('dish');
        $categoryId = $request->input('category');
        $subcategoryId = $request->input('subcategory');

        $query = RegisteredDish::with('category', 'subcategory'); 

        if (!empty($searchTerm)) {
            $query->where('registered_dishes.title', 'like', '%' . $searchTerm . '%');
        }

        if (!empty($categoryId) && $categoryId != 0) {
            $query->where('dishes_categories.id', $categoryId);
        }

        if (!empty($subcategoryId) && $subcategoryId != 0) {
            $query->where('subcategories.id', $subcategoryId);
        }

        $dishes = $query->get();
        
        $categories = DishesCategory::with('subcategories')->get();

        $subcategories = !empty($categoryId) ? 
            Subcategory::where('dishes_categories_id', $categoryId)->get() : 
            Subcategory::all(); 

        $addedItems = $request->input('addedItems');
        $total = 0;

        if ($addedItems) {
            foreach ($addedItems as $item) {
                $dishId = $item['id'];
                $quantity = $item['quantity'];
                $dish = RegisteredDish::find($dishId);

                if ($dish) {
                    $total += $dish->dish_price * $quantity;
                }
            }
        }

        return view('factures.ordering', compact('dishes', 'total', 'categories', 'subcategories', 'addedItems'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dish = RegisteredDish::find($id);
        if ($dish) {
            if (File::exists(public_path('storage/images/' . $dish->image)) && $dish->image != 'default.jpg') {
                File::delete(public_path('storage/images/' . $dish->image));
            }
            $dish->delete();
        }

        return redirect()->route('dishes.index')->with('success', 'Item eliminado correctamente.');
    }
    

    public function inventory(Request $request)
    {

        $searchTerm = $request->input('dish');
        $categoryId = $request->input('category');
    
        $query = RegisteredDish::select(
            'registered_dishes.id',
            'dishes_categories.name as category',
            'subcategories.name as subcategory',
            'registered_dishes.title',
            'registered_dishes.units',
            'registered_dishes.description',
            'registered_dishes.dish_price'
        )
        ->join('dishes_categories', 'registered_dishes.dishes_categories_id', '=', 'dishes_categories.id')
        ->join('subcategories', 'registered_dishes.subcategories_id', '=', 'subcategories.id');
    
        if (!empty($searchTerm)) {
            $query->where('registered_dishes.title', 'like', '%' . $searchTerm . '%');
        }
    
        if (!empty($categoryId) && $categoryId != 0) {
            $query->where('dishes_categories.id', $categoryId);
        }
    
        $dishes = $query->get();
    
        $categories = DishesCategory::all();
        $subcategories = Subcategory::all();
        $total = $dishes->count(); 
    
        return view('dishes.inventory', compact('dishes', 'total', 'categories', 'subcategories'));
    }
}

