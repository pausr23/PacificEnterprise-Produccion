@extends('suppliers.layout')

@section('content')

<div class="grid grid-cols-[20%,80%] pl-12">
    <div class="mr-8 ">
        <img class="w-72" src="https://i.ibb.co/KX69vv5/Pacific-Enterprise.png" alt="Pacific-Enterprise" border="0">
        <div class="grid pl-10 pt-12 text-white font-light text-sm font-main ">
            <a class="py-3 mb-6 pl-4 hover:bg-[#323035] focus:bg-[#323035] active:bg-[#323035] block rounded-lg" href="">Panel Principal</a>
            <a class="py-3 mb-6 pl-4 hover:bg-[#323035] focus:bg-[#323035] active:bg-[#323035] block rounded-lg" href="{{ route('factures.ordering') }}">Punto de Venta</a>
            <a class="py-3 mb-6 pl-4 hover:bg-[#323035] focus:bg-[#323035] active:bg-[#323035] block rounded-lg" href="">Órdenes</a>
            <a class="py-3 mb-6 pl-4 hover:bg-[#323035] focus:bg-[#323035] active:bg-[#323035] block rounded-lg" href="{{ route('factures.history') }}">Historial</a>
            <a class="py-3 mb-6 pl-4 hover:bg-[#323035] focus:bg-[#323035] active:bg-[#323035] block rounded-lg" href="{{ route('dishes.index') }}">Admin</a>
            <a class="py-3 mb-6 pl-4 hover:bg-[#323035] focus:bg-[#323035] active:bg-[#323035] block rounded-lg" href="{{ route('dishes.inventory') }}">Inventario</a>
            <a class="py-3 mb-6 pl-4 block rounded-lg secondary-color hover:bg-[#323035] focus:bg-[#323035] active:bg-[#323035] transition-colors duration-300" href="{{ route('suppliers.index') }}">Proveedores</a>

            <a href="{{ route('admin.profile') }}" class="flex cursor-pointer">
                <img class="w-16" src="https://img.icons8.com/?size=100&id=492ILERveW8G&format=png&color=000000" alt="">
                <div class="mt-2 ml-2">
                    <p class="text-lg font-semibold">{{ auth()->user()->name }}</p>
                    <p>@ {{ auth()->user()->username }}</p>
                </div>
            </a>
        </div>
    </div>

    <div>
        <div class="grid grid-cols-[70%,20%]">
            <form method="GET" action="{{ route('suppliers.index') }}" class="grid grid-cols-3 ">
                <div class="grid">
                    <label class="text-white font-main pb-2 font-bold" for="dish">Nombre:</label>
                    <input class="secondary-color rounded text-xs font-light h-8 text-center w-40 text-white" id="supplier" type="text" name="supplier" placeholder="Nombre del proveedor">
                </div>
                <div class="grid content-end">
                    <button type="submit" class="font-bold flex items-center justify-center font-main text-black bg-white h-10 w-28 rounded-xl text-center hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100">Buscar</button>
                </div>
            </form>

            <div class="content-end">
                <a class="font-bold flex items-center justify-center h-12 w-48 secondary-color text-white rounded-xl text-center hover:bg-gray-500 focus:ring-4 focus:outline-none focus:ring-gray-100" href="{{ route('suppliers.create') }}">
                    Agregar un proveedor
                </a>
            </div>
        </div>

        <div class="grid mt-10 grid-cols-3">
            @if($suppliers->isEmpty())
                <div class="col-span-3 text-center mt-10">
                    <p class="text-white font-main text-lg">No hay registro de proveedores.</p>
                </div>
            @else
                @foreach ($suppliers as $supplier)
                    <div class="py-4 rounded-lg secondary-color text-white p-3 flex flex-col w-[300px]"> 
                        <div class="grid grid-cols-3 items-center">
                            <div class="text-center">
                                <h2 class="font-bold text-sm">{{ $supplier->name }}</h2>
                            </div>
                            <div class="flex items-center justify-center">
                                <div class="h-10 w-px bg-neutral-200 mx-2"></div> 
                            </div>
                            <div class="text-center">
                                <p class="text-sm font-bold">{{ $supplier->phone_number }}</p>
                            </div>
                        </div>
                        <hr class="my-2 border-neutral-200">
                        <div class="mt-2 flex-grow">
                            <p class="text-sm">{{ $supplier->note }}</p>
                        </div>
                        <div class="flex justify-center mt-2 space-x-2">
                            <a href="#" class="flex items-center justify-center w-8 h-8 rounded-full bg-cyan-200 hover:bg-cyan-500 focus:ring-4 focus:outline-none focus:ring-cyan-100">
                                <img src="https://i.ibb.co/VpJRvW8/icons8-buscar-en-la-lista-50.png" alt="Ver" class="w-5 h-5">
                            </a>
                            <a href="{{ route('suppliers.edit', $supplier->id) }}" class="flex items-center justify-center w-8 h-8 rounded-full bg-lime-200 hover:bg-lime-500 focus:ring-4 focus:outline-none focus:ring-lime-100">
                                <img src="https://i.ibb.co/NnbsFc6/icons8-modificar-50.png" alt="Editar" class="w-5 h-5">
                            </a>
                            <form action="{{ route('suppliers.destroy', $supplier->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="flex items-center justify-center w-8 h-8 rounded-full bg-rose-300 hover:bg-rose-500 focus:ring-4 focus:outline-none focus:ring-rose-100">
                                    <img src="https://i.ibb.co/DWwV7Sf/icons8-eliminar-50.png" alt="Eliminar" class="w-5 h-5">
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>

@endsection
