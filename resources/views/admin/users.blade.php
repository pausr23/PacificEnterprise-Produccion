@extends('dishes.layout')

@section('content')

    <!-- Botón de navegación -->
    <div class="grid grid-cols-1 md:grid-cols-[20%,60%] gap-16">
        <div class="content-end md:mb-14 my-8 lg:mt-0">
            <a href="{{ route('admin.profile') }}" class="ml-10 font-bold flex items-center justify-center w-[30%] py-2 secondary-color text-white rounded-xl text-center hover:bg-gray-500 focus:ring-4 focus:outline-none focus:ring-gray-100 xxs:ml-[4%]">
                Atrás
            </a>
        </div>
    </div>

    <!-- Formulario de Búsqueda y Botón Agregar Usuario -->
    <div class="grid grid-cols-2 xxs:grid-cols-1 lg:gap-16 md:gap-y-1 xxs:gap-1 xxs:mx-4">
       <!-- Formulario de Búsqueda -->
        <form method="GET" action="{{ route('admin.users') }}" class="w-full grid grid-cols-1 md:grid-cols-3 lg:ml-32 md:ml-1 lg:gap-4 md:gap-5">
            
            <!-- Campo Nombre -->
            <div class="grid mb-4 ml-5 md:mr-6 xxs:mx-0">
                <label for="dish" class="text-white font-main pb-2 font-bold">Nombre:</label>
                <input type="text" name="dish" id="dish" placeholder="Nombre del empleado" class="secondary-color rounded text-xs font-light h-8 text-center w-full md:w-40 text-white">
            </div>

            <!-- Campo Puesto -->
            <div class="grid mb-4 lg:ml-5 md:mr-6 md:ml-14">
                <label for="category" class="text-white font-main pb-2 font-bold">Puesto:</label>
                <select name="category" id="category" class="secondary-color rounded h-8 text-center w-full md:w-40 text-white">
                    <option value="0">Todo</option>
                    @foreach ($titles as $title)
                        <option value="{{ $title->id }}">{{ $title->title }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Botón Buscar -->
            <div class="grid content-end mb-4 lg:ml-5 md:mr-6 md:ml-4">
                <button type="submit" class="font-bold flex items-center justify-center font-main text-black bg-white h-10 w-full md:w-28 rounded-xl text-center hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100">
                    Buscar
                </button>
            </div>
        </form>

        <!-- Botón Agregar Nuevo Usuario -->
        <div class="grid content-end mb-4 lg:ml-0">
            <a href="{{ route('admin.create') }}" class="font-bold flex items-right justify-center py-3 lg:w-60 md:w-36 secondary-color text-white rounded-xl text-center hover:bg-gray-500 focus:ring-4 focus:outline-none focus:ring-gray-100 lg:text-base md:text-sm lg:ml-16 md:ml-28 md:-mr-20">
                Agregar un Nuevo Usuario
            </a>
        </div>
    </div>

    <!-- Tabla de Usuarios -->
    <div class="w-full md:w-[70%] mx-auto grid gap-16 xxs:gap-0">
        <div class="py-10 rounded-lg">
            <table class="w-full rounded-lg">
                <thead class="secondary-color text-white font-main font-bold">
                    <tr>
                        <th scope="col" class="rounded-l-lg px-12 xxs:px-0 xxs:text-sm py-3">Nombre</th>
                        <th scope="col" class="px-12 xxs:px-0 xxs:text-sm py-3">Puesto</th>
                        <th scope="col" class="rounded-r-lg px-32 xxs:px-0 xxs:text-sm py-3">Detalles</th>
                    </tr>
                </thead>
                
                <tbody>
                    @foreach ($users as $user)
                    <tr class="border-b text-white text-center xxs:text-sm border-neutral-200 dark:border-white/10">
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->title }}</td>
                        <td class="py-6">
                            <a href="{{ route('admin.show', ['id' => $user->id]) }}" class="bg-cyan-200 rounded-lg text-black font-semibold px-4 xxs:text-xs py-2 me-2 hover:bg-cyan-500 focus:ring-4 focus:outline-none focus:ring-cyan-200">
                                Ver más
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
