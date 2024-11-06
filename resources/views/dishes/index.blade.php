@extends('dishes.layout')

@section('content')

<div class="grid lg:grid-cols-[20%,80%] pl-6">

    <!-- Menú lateral -->
    <div class="mr-5">
        @include('components.sidebar-link')
    </div>

    <div>
        <!-- Formulario de búsqueda y enlace de agregar nuevo item -->
        <div class="grid grid-cols-[70%,30%] mt-8 lg:mt-0 xxs:grid-cols-1">
            <!-- Formulario de búsqueda -->
            <form method="GET" action="{{ route('dishes.index') }}" class="grid grid-cols-3">
                <!-- Campo de nombre del platillo -->
                <div class="grid">
                    <label class="text-white font-main pb-2 font-bold" for="dish">Nombre:</label>
                    <input
                        class="secondary-color rounded text-xs xxs:text-[.5rem] font-light h-8 text-center lg:w-40 sm:w-28 xxs:w-20 p-2 text-white"
                        id="dish" type="text" name="dish" placeholder="Nombre de item">
                </div>

                <!-- Campo de categoría -->
                <div class="grid">
                    <label class="text-white font-main pb-2 font-bold" for="category">Categoría:</label>
                    <select class="secondary-color rounded h-8 text-center lg:w-40 sm:w-20 text-white" id="category" name="category">
                        <option class="lg:text-base sm:text-xs" value="0">Todo</option>
                        @foreach ($categories as $category)
                            <option class="lg:text-base sm:text-xs" value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Botón de búsqueda -->
                <div class="grid content-end">
                    <button type="submit"
                        class="font-bold flex items-center justify-center font-main text-black bg-white h-10 xxs:text-xs xxs:h-10 lg:w-28 sm:w-20 xxs:p-2 ml-5 mr-5 rounded-xl text-center hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100">
                        Buscar
                    </button>
                </div>
            </form>

            <!-- Enlace para agregar nuevo item -->
            <div class="content-end">
                <a class="font-bold flex items-center justify-center h-12 ml-[8%] mt-4 lg:w-48 sm:w-32 xxs:w-72 lg:text-base sm:text-sm xxs:text-xs secondary-color text-white rounded-xl text-center hover:bg-gray-500 focus:ring-4 focus:outline-none focus:ring-gray-100"
                    href="{{ route('dishes.create') }}">
                    Agregar un Item
                </a>
            </div>
        </div>

        <!-- Tabla de platillos -->
        <div class="w-[90%] ml-8 lg:ml-0 xxs:ml-[3%] grid gap-16">
            <div class="py-10 rounded-lg">
                <table class="w-full rounded-lg">
                    <!-- Encabezado de la tabla -->
                    <thead class="rounded-lg text-white font-main font-bold secondary-color">
                        <tr>
                            <th scope="col" class="rounded-l-lg px-1 py-3 xxs:py-0.5 sm:px-12 lg:text-base xxs:text-[0.5rem]">Nombre</th>
                            <th scope="col" class="px-1 py-3 xxs:py-0.5 lg:text-base xxs:text-[0.5rem]">Categoría</th>
                            <th scope="col" class="px-5 py-3 xxs:py-0.5 lg:text-base xxs:text-[0.5rem]">Subcategoría</th>
                            <th scope="col" class="rounded-r-lg px-12 py-3 xxs:py-0.5 lg:text-base xxs:text-[0.5rem]">Acción</th>
                        </tr>
                    </thead>

                    <!-- Cuerpo de la tabla con los platillos -->
                    <tbody>
                        @foreach ($dishes as $dish)
                            <tr class="border-b text-white text-center border-neutral-200 dark:border-white/10">
                                <td class="px-1 xxs:text-[0.5rem]">{{ $dish->title }}</td>
                                <td class="px-2 xxs:text-[0.5rem]">{{ $dish->category }}</td>
                                <td class="px-2 xxs:text-[0.5rem]">{{ $dish->subcategory }}</td>
                                <td class="py-6 xxs:text-[0.5rem]">
                                    <!-- Acciones: Ver, Editar, Eliminar -->
                                    <a class="bg-cyan-200 rounded-lg text-black font-semibold px-4 xxs:px-2 py-2 me-2 sm:mb-4 hover:bg-cyan-500 focus:ring-4 focus:outline-none focus:ring-cyan-100"
                                        href="{{ route('dishes.show', $dish->id) }}">Ver</a>
                                    <a class="bg-lime-200 rounded-lg text-black font-semibold px-4 xxs:px-2 py-2 me-2 hover:bg-lime-500 focus:ring-4 focus:outline-none focus:ring-lime-100"
                                        href="{{ route('dishes.edit', $dish->id) }}">Editar</a>
                                    <form action="{{ route('dishes.destroy', $dish->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button
                                            class="bg-rose-300 rounded-lg text-black font-semibold px-4 xxs:px-2 py-2 lg:mt-0 sm:mt-4 xxs:mt-4 me-2 hover:bg-rose-500 focus:ring-4 focus:outline-none focus:ring-rose-100"
                                            type="submit">Eliminar</button>
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
