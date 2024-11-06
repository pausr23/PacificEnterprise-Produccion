<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RegisteredInformation;

class AdminInformationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $information = RegisteredInformation::all();
        return view('information.index', compact('information'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $informationCount = RegisteredInformation::count();
        if ($informationCount > 0) {
            return redirect()->route('information.index')->with('warning', 'Ya hay información registrada. Solo puedes editarla.');
        }
    
        return view('information.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'string',
                'max:255',
                'regex:/^[a-zA-Z0-9.]+@([a-zA-Z0-9]+\.)+[a-zA-Z]{2,6}$/',
            ],
            'number' => 'required|string|min:8|max:8',
            'address' => 'required|string|max:255',
            'note' => 'nullable|string',
        ]);

        RegisteredInformation::create($request->all());

        return redirect()->route('information.index')->with('success', 'Información añadida exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $information = RegisteredInformation::findOrFail($id);
        return view('information.show', compact('information'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $information = RegisteredInformation::find($id);
        return view('information.edit', compact('information'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'string',
                'max:255',
                'regex:/^[a-zA-Z0-9.]+@([a-zA-Z0-9]+\.)+[a-zA-Z]{2,6}$/', 
            ],
            'number' => 'required|string|min:8|max:8',
            'address' => 'required|string|max:255',
            'note' => 'nullable|string',
        ]);

        $information = RegisteredInformation::findOrFail($id);
        $information->update($request->all());

        return redirect()->route('information.index')->with('success', 'Información actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $information = RegisteredInformation::findOrFail($id);
        $information->delete();

        return redirect()->route('information.index')->with('success', 'Información eliminada exitosamente.');
    }
}
