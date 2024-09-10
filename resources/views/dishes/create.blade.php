@extends('dishes.layout')

@section('content')
<div>
    <img class="w-56 m-12" src="https://i.ibb.co/KX69vv5/Pacific-Enterprise.png" alt="Pacific-Enterprise" border="0">
    <div class="flex justify-center items-center mb-10">
        <div class="grid grid-cols-2 gap-96">
            <h1 class="text-2xl font-bold text-white font-main">Añade un nuevo platillo</h1>
            <a class="font-main text-white w-[30%] secondary-color text-white hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg px-5 py-2.5 text-center" href="{{ route('dishes.index') }}">Atrás</a>
        </div>
    </div>

    <!-- Formulario -->
    <form action="{{ route('dishes.create') }}" method="GET" enctype="multipart/form-data">
        <div class="pl-20 grid grid-cols-[50%,50%]">

            <!-- Sección 1 -->
            <div class="grid">

                <!-- Name -->
                <div class="grid mb-2">
                    <label class="block mb-2 font-medium text-white font-main">Nombre</label>
                    <input class="secondary-color border border-gray-300 text-gray-900 text-sm rounded-lg block w-80 p-2.5 text-white" type="text" name="title" placeholder="Nombre del platillo">
                </div>

                <!-- Categories -->
                <div class="mt-2 mb-2">
                    <div>
                        <label for="dishes_categories_id" class="block mb-2 font-medium text-white font-main">Categoría:</label>
                        <select name="dishes_categories_id" id="dishes_categories_id" class="secondary-color border border-gray-300 text-gray-900 text-sm rounded-lg block w-80 p-2.5 focus:ring-blue-500 focus:border-blue-500 text-white" onchange="this.form.submit()">
                            <option value="">Selecciona una categoría</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ $selectedCategoryId == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Subcategories -->
                <div class="mt-2 mb-2">
                    <div>
                        <label for="subcategories_id" class="block mb-2 font-medium text-white font-main">Subcategoría:</label>
                        <select name="subcategories_id" id="subcategories_id" class="secondary-color border border-gray-300 text-gray-900 text-sm rounded-lg block w-80 p-2.5 focus:ring-blue-500 focus:border-blue-500 text-white">
                            <option value="">Selecciona una categoría primero</option>
                            @foreach ($subcategories as $subcategory)
                                <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            
            </div>

            <!-- Sección 2 -->
            <div>

                <!-- Precio -->
                <div class="grid mb-2">
                    <label class="block mb-2 font-medium text-white font-main">Precio</label>
                    <input class="secondary-color border border-gray-300 text-gray-900 text-sm rounded-lg block w-80 p-2.5 text-white" type="text" name="dish_price" placeholder="Precio del platillo">
                </div>

                <!-- Description -->
                <div class="grid grid-cols-1 mb-2">
                    <label class="block mb-2 font-medium text-white font-main">Descripción</label>
                    <textarea class="secondary-color border border-gray-300 text-gray-900 text-sm rounded-lg block w-80 p-2.5 text-white" name="description" cols="30" rows="3" placeholder="Descripción del platillo"></textarea>
                </div>

                <!-- Image -->
                <div class="mt-2 mb-2">
                    <div>
                        <label for="image" class="block mb-2 font-medium text-white font-main">Imagen:</label>
                        <input type="file" accept=".jpg, .png" id="image" class="text-white secondary-color border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-80 p-2.5" name="image">
                    </div>
                </div>

            </div>

        </div>

        <!-- Botón de guardar -->
        <div class="flex justify-end mt-5 pr-20">
            <button type="submit" class="font-main text-white w-[40%] secondary-color hover:bg-lime-300 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg px-5 py-2.5 text-center">Guardar</button>
        </div>
    </form>
</div>
@endsection
