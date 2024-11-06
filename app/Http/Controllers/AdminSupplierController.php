<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RegisteredSupplier;

class AdminSupplierController extends Controller
{

    private const SUCCESS_CREATE_MESSAGE = 'Proveedor registrado correctamente.';
    private const SUCCESS_UPDATE_MESSAGE = 'Proveedor actualizado correctamente.';
    private const SUCCESS_DELETE_MESSAGE = 'Proveedor eliminado correctamente.';

    public function index(Request $request)
    {
        $suppliers = $this->searchSuppliers($request->input('supplier'));
        $total = $suppliers->count();

        return view('suppliers.index', compact('suppliers', 'total'));
    }

    public function create()
    {
        return view('suppliers.create', [
            'suppliers' => RegisteredSupplier::all()
        ]);
    }

    public function store(Request $request)
    {
        $this->validateSupplier($request);

        RegisteredSupplier::create($request->only(['name', 'phone_number', 'email', 'note']));

        return redirect()->route('suppliers.index')->with('success', self::SUCCESS_CREATE_MESSAGE);
    }

    public function show(string $id)
    {
        $supplier = RegisteredSupplier::findOrFail($id);
        return view('suppliers.show', compact('supplier'));
    }

    public function edit(string $id)
    {
        $supplier = RegisteredSupplier::findOrFail($id);
        return view('suppliers.edit', compact('supplier'));
    }

    public function update(Request $request, string $id)
    {
        $this->validateSupplier($request);

        $supplier = RegisteredSupplier::findOrFail($id);
        $supplier->update($request->only(['name', 'phone_number', 'email', 'note']));

        return redirect()->route('suppliers.index')->with('success', self::SUCCESS_UPDATE_MESSAGE);
    }

    public function destroy(string $id)
    {
        $supplier = RegisteredSupplier::findOrFail($id);
        $supplier->delete();

        return redirect()->route('suppliers.index')->with('success', self::SUCCESS_DELETE_MESSAGE);
    }

    private function searchSuppliers(?string $searchTerm)
    {
        $query = RegisteredSupplier::query();

        if (!empty($searchTerm)) {
            $query->where('name', 'like', '%' . $searchTerm . '%');
        }

        return $query->get();
    }

    private function validateSupplier(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone_number' => 'required|string|min:8|max:8',
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                'unique:registered_suppliers,email',
                'regex:/^[A-Za-z0-9.]+@[A-Za-z0-9.]+\.[A-Za-z]{2,}$/',
            ],
            'note' => 'nullable|string|max:255',
        ]);
    }
}
