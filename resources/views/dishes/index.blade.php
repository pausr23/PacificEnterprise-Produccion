@extends('dishes.layout')

@section('content')

<div class="grid grid-cols-[20%,80%] pl-12">

    <div class="mr-8">
        <img src="https://i.ibb.co/KX69vv5/Pacific-Enterprise.png" alt="Pacific-Enterprise" border="0">

        <div class="grid pl-12 pt-12 text-white font-light text-sm font-main ">
            <a class="pb-8 hover:bg-gray-600 focus:bg-[#323035] active:bg-[#323035] block" href="">Panel Principal</a>
            <a class="pb-8 hover:bg-gray-600 focus:bg-[#323035] active:bg-[#323035] block" href="">Punto de Venta</a>
            <a class="pb-8 hover:bg-gray-600 focus:bg-[#323035] active:bg-[#323035] block" href="">Historial</a>
            <a class="pb-8 hover:bg-gray-600 focus:bg-[#323035] active:bg-[#323035] block" href="">Admin</a>
            <a class="pb-8 hover:bg-gray-600 focus:bg-[#323035] active:bg-[#323035] block" href="">Inventario</a>
        </div>
        
    </div>

    <div>
        <div class="grid grid-cols-[70%,20%]">
            <form method="GET" action="{{ route('dishes.index') }}" class="grid grid-cols-3 ">
                <div class="grid">
                    <label class="text-white font-main pb-2 font-bold" for="dish">Nombre:</label>
                    <input class="secondary-color rounded text-xs font-light h-8 text-center w-40 text-white" id="dish" type="text" name="dish" placeholder="Nombre de platillo">
                </div>

                <div class="grid">
                    <label class="text-white font-main pb-2 font-bold" for="category">Categoría:</label>
                    <select class="secondary-color rounded h-8 text-center w-40 text-white" id="category" name="category">
                        <option value="0">Todo</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="grid content-end">
                    <button type="submit" class="font-bold flex items-center justify-center font-main text-black bg-white h-10 w-28 rounded-xl text-center hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100">Buscar</button>
                </div>
            </form>

            <div class="content-end">
                <a class="font-bold flex items-center justify-center h-12 w-48 secondary-color text-white rounded-xl text-center hover:bg-gray-500 focus:ring-4 focus:outline-none focus:ring-gray-100" href="{{ route('dishes.create') }}">
                    Agregar un Item
                </a>
            </div>
        </div>


        <div class="w-[90%] grid gap-16">
            <div class="py-10 rounded-lg">
                <table class="w-full rounded-lg">
                    <thead class="rounded-lg text-white font-main font-bold secondary-color">
                        <tr>
                            <th scope="col" class="rounded-l-lg px-12 py-3">Nombre</th>
                            <th scope="col" class="px-12 py-3">Categoria</th>
                            <th scope="col" class="px-12 py-3">Subcategoria</th>
                            <th scope="col" class="rounded-r-lg px-32 py-3">Accion</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        @foreach ($dishes as $dish)
                            <tr class="border-b text-white text-center border-neutral-200 dark:border-white/10">
                                <td>{{ $dish->title }}</td>
                                <td>{{ $dish->category }}</td>
                                <td>{{ $dish->subcategory }}</td>
                                <td class="py-6">
                                    <a class="bg-cyan-200 rounded-lg text-black font-semibold px-4 py-2 me-2 hover:bg-cyan-500 focus:ring-4 focus:outline-none focus:ring-cyan-100" href="">Ver</a>
                                    <a class="bg-lime-200 rounded-lg text-black font-semibold px-4 py-2 me-2 hover:bg-lime-500 focus:ring-4 focus:outline-none focus:ring-lime-100" href="{{ route('dishes.edit', $dish->id) }}">Editar</a>
                                    <form action="{{ route('dishes.destroy', $dish->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="bg-rose-300 rounded-lg text-black font-semibold px-4 py-2 me-2 hover:bg-rose-500 focus:ring-4 focus:outline-none focus:ring-rose-100" type="submit">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                
                </table>
            </div>
        </div>
    </div>
</div>
       
@endsection
