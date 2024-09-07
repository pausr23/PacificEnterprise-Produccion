<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class AdminDishController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $dishes = RegisteredDish::select(
            'registered_dishes.id',
            'dishes_categories.name as category',
            'subcategories.name as subcategory',
            'registered_dishes.title',
            'registered_dishes.description',
            'registered_dishes.dish_price'
        )
        ->join('dishes_categories', 'registered_dishes.dishes_categories.id', '=', 'dishes_categories.id')
        ->join('subcategories', 'registered_dishes.subcategories.id', '=', 'subcategories.id')
        ->orderBy('scheduled_at', 'asc')
        ->get();

        $categories = CategoriesDishes::all();
        $subcategories = SubcategoriesDishes::all();
        $total = $dishes->count(); 

        return view('dishes.index', compact('dishes', 'total', 'categories', 'subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = CategoriesDishes::all();
        $subcategories = SubcategoriesDishes::all();

        return view('dishes.create', compact('categories', 'subcategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $file = $request->file('image');
        $file_name = 'dish_' . time() . '.' . $file->getClientOriginalExtension();
        $path = $file->storeAs('public/images', $file_name);

        RegisteredDish::create([
            'dishes_categories_id' => $request->dishes_categories_id,
            'subcategories_id' => $request->subcategories_id,
            'title' => $request->title,
            'description' => $request->description,
            'image' => $file_name,
            'dish_price' => $request->dish_price,
        ]);

        return redirect()->route('dishes.index')->with('success','PLatillo registrado correctamente.');

    }

    public function search(Request $request)
    {
        $query = RegisteredActivity::select(
            'registered_dishes.id',
            'dishes_categories.id as category_id',
            'dishes_categories.name as category',
            'registered_dishes.title',
            'subcategories.name as subcategory'
        )
        ->join('dishes_categories', 'registered_dishes.dishes_categories_id', '=', 'dishes_categories.id')
        ->join('subcategories', 'registered_dishes.subcategories_id', '=', 'subcategories.id');

        if ($request->category != 0) {
            $query->where('dishes_categories.id', $request->category);
        }

        if ($request->has('activity') && !empty($request->activity)) {
            $query->where('registered_dishes.title', 'LIKE', '%' . $request->dish . '%');
        }

        if ($request->has('subcategory') && !empty($request->subcategory)) {
            $query->where('registered_dishes.subcategory_id', $request->subcategory);
        }

        //$dishes = $query->orderBy('scheduled_at', 'asc')->get();
        $total = $dishes->count();

        return view('dishes.results', compact('dishes', 'total'));
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
        ->get();

        return view('dishes.show', compact('dish'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $dish = RegisteredActivity::find($id);
        $categories = CategoriesDishes::all();
        $subcategories = SubcategoriesDishes::all();

        $currentImage = asset('storage/images/' . $dish->image);
        
        return view('dishes.edit', compact('dish', 'categories', 'subcategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $file = $request->file('image');
        $query = RegisteredDish::find($id);

        if ($query) {
            if ($file != null) {
                $file_to_remove = 'storage/images/'.$request->old_image;
                if (File::exists($file_to_remove)) {
                    File::delete($file_to_remove);
                }
                $file_name = 'dish_' . time() . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('public/images', $file_name);
            } else {
                $file_name = $request->old_image;
            }

            $query->update([
                'dishes_categories_id' => $request->dishes_categories_id,
                'subcategories_id' => $request->subcategories_id,
                'title' => $request->title,
                'description' => $request->description,
                'dish_price' => $request->dish_price,
                'image' => $file_name,
            ]);

            return redirect()->route('dishes.index')->with('success','Platillo actualizado correctamente.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $result = RegisteredDish::find($id);
        $result->delete();

        return redirect()->route('dishes.index')->with('success','Platillo eliminado correctamente.');
    }
}
