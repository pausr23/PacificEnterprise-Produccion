<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Models\RegisteredSupplier;

class AdminSupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Obtener el valor del input de búsqueda
        $searchTerm = $request->input('supplier');

        // Query base para obtener los proveedores registrados
        $query = RegisteredSupplier::select(
            'registered_suppliers.id',
            'registered_suppliers.name',
            'registered_suppliers.phone_number',
            'registered_suppliers.email',
            'registered_suppliers.note'
        );

        // Filtrar por nombre de proveedor
        if (!empty($searchTerm)) {
            $query->where('registered_suppliers.name', 'like', '%' . $searchTerm . '%');
        }

        // Obtener los resultados
        $suppliers = $query->get();

        // Contar el total de resultados
        $total = $suppliers->count();

        // Devolver la vista con los proveedores y el total
        return view('suppliers.index', compact('suppliers', 'total'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $suppliers = RegisteredSupplier::all(); // O lo que sea necesario para obtener los proveedores
        return view('suppliers.create', compact('suppliers'));
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:255',
            'email' => 'nullable|string|max:255',
            'note' => 'nullable|string|max:255',
        ]);

        RegisteredSupplier::create([
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'note' => $request->note,
        ]);

        return redirect()->route('suppliers.index')->with('success', 'Proveedor registrado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $supplier = RegisteredSupplier::select(
            'registered_suppliers.name',
            'registered_suppliers.phone_number',
            'registered_suppliers.email',
            'registered_suppliers.note'
        )
        ->where('registered_suppliers.id', $id)
        ->first();
 
        return view('suppliers.show', compact('supplier'));
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $supplier = RegisteredSupplier::find($id);

        return view('suppliers.edit', compact('supplier'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:255',
            'email' => 'nullable|string|max:255',
            'note' => 'required|string|max:255',
        ]);
    
        $supplier = RegisteredSupplier::find($id);
    
        $supplier->update([
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'note' => $request->note,
        ]);

        return redirect()->route('suppliers.index')->with('success', 'Proveedor actualizado correctamente.');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Obtener el proveedor por su ID
        $supplier = RegisteredSupplier::find($id);
    
        if ($supplier) {
            // Eliminar el proveedor
            $supplier->delete();
        }
    
        // Redireccionar a la lista de proveedores con mensaje de éxito
        return redirect()->route('suppliers.index')->with('success', 'Proveedor eliminado correctamente.');
    }
    
}
