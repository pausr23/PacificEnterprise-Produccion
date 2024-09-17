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
            <form method="GET" action="{{ route('dishes.inventory') }}" class="grid grid-cols-3 ">

                <div class="grid">
                    <label class="text-white font-main pb-2 font-bold" for="category">Filtrar por:</label>
                    <select class="bg-rose-300 rounded h-8 text-center w-40 text-white" id="category" name="category">
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

        </div>


        <div class="w-[90%] grid gap-16">
            <div class="py-10 rounded-lg">
                <table class="w-full rounded-lg">
                    <thead class="rounded-lg text-white font-main font-bold secondary-color">
                        <tr>
                            <th scope="col" class="rounded-l-lg px-12 py-3">Nombre</th>
                            <th scope="col" class="px-12 py-3">Categoria</th>
                            <th scope="col" class="px-12 py-3">Subcategoria</th>
                            <th scope="col" class="px-12 py-3">Precio Indiviual</th>
                            <th scope="col" class="px-12 py-3 rounded-r-lg">Unidades</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        @foreach ($dishes as $dish)
                            <tr class="border-b text-white text-center border-neutral-200 dark:border-white/10">
                                <td scope="col" class="px-12 py-3">{{ $dish->title }}</td>
                                <td>{{ $dish->category }}</td>
                                <td>{{ $dish->subcategory }}</td>
                                <td>{{ $dish->dish_price }}</td>
                                <td>{{ $dish->units }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                
                </table>
            </div>
        </div>
    </div>
</div>
       
@endsection
