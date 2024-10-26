@extends('dishes.layout')

@section('content')
<div>
    <img class="w-56 m-12" src="https://i.ibb.co/KX69vv5/Pacific-Enterprise.png" alt="Pacific-Enterprise" border="0">
    <div class="flex justify-center items-center mb-10 xxs:mb-4">
        <div class="grid grid-cols-2 lg:gap-96 md:gap-16 xxs:grid-cols-1 xxs:gap-0">
            <h1 class="text-2xl lg:ml-0 sm:ml-7 font-bold text-white font-main xxs:mb-2">Añade un nuevo producto</h1>
            <a class="font-main w-[50%] xxs:w-full secondary-color text-white hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg px-5 xxs:px-1 py-2.5 text-center" href="{{ route('dishes.index') }}">Atrás</a>
        </div>
    </div>

    <form action="{{ route('dishes.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="pl-20 grid grid-cols-[50%,50%] xxs:grid-cols-1 xxs:gap-y-1 xxs:px-2">

            <div class="grid">

                <div class="grid mb-2">
                    <label class="block mb-2 font-medium text-white font-main">Nombre</label>
                    <input class="secondary-color border border-gray-300 text-sm rounded-lg block w-80 p-2.5 text-white" type="text" name="title" placeholder="Nombre del producto">
                </div>

                <div class="mt-2 mb-2">
                    <div>
                        <label for="dishes_categories_id" class="block mb-2 font-medium text-white font-main">Categoría:</label>
                        <select name="dishes_categories_id" id="dishes_categories_id" class="secondary-color border border-gray-300 text-sm rounded-lg block w-80 p-2.5 focus:ring-blue-500 focus:border-blue-500 text-white" onchange="filterSubcategories()">
                            <option value="">Selecciona una categoría</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="mt-2 mb-2">
                    <div>
                        <label for="subcategories_id" class="block mb-2 font-medium text-white font-main">Subcategoría:</label>
                        <select name="subcategories_id" id="subcategories_id" class="secondary-color border border-gray-300  text-sm rounded-lg block w-80 p-2.5 focus:ring-blue-500 focus:border-blue-500 text-white">
                            <option value="">Selecciona una categoría primero</option>
                        </select>
                    </div>
                </div>

                <div class="grid mb-2">
                    <label class="block mb-2 font-medium text-white font-main">Unidades</label>
                    <input class="secondary-color border border-gray-300 text-sm rounded-lg block w-80 p-2.5 text-white" type="number" name="units" placeholder="Unidades disponibles">
                </div>
            
            </div>

            <!-- Seccion 2 -->
            <div>

                <div class="grid mb-2">
                    <label class="block mb-2 font-medium text-white font-main">Precio</label>
                    <input class="secondary-color border border-gray-300 text-sm rounded-lg block w-80 p-2.5 text-white" type="text" name="purchase_price" placeholder="Precio de compra del producto">
                </div>

                <div class="grid mb-2">
                    <label class="block mb-2 font-medium text-white font-main">Precio</label>
                    <input class="secondary-color border border-gray-300 text-sm rounded-lg block w-80 p-2.5 text-white" type="text" name="sale_price" placeholder="Precio de venta del producto">
                </div>

                <div class="grid grid-cols-1 mb-2">
                    <label class="block mb-2 font-medium text-white font-main">Descripción</label>
                    <textarea class="secondary-color border border-gray-300 text-sm rounded-lg block w-80 p-2.5 text-white" name="description" cols="30" rows="3" placeholder="Descripción del producto"></textarea>
                </div>

                <div class="mt-2 mb-2">
                    <div>
                        <label for="image" class="block mb-2 font-medium text-white font-main">Imagen:</label>
                        <input type="file" accept=".jpg, .png" id="image" class="text-white secondary-color border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-80 p-2.5" name="image">
                    </div>
                </div>

            </div>

        </div>

        <div class="flex lg:justify-end justify-center pr-20 sm:mt-5 xxs:pr-2 xxs:py-4">
            <button type="submit" class="font-main text-white w-[50%] sm:w-[16%] xxs:w-full secondary-color hover:bg-green-500 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg px-5 lg:py-2.5 sm:py-5 text-center mr-60 mb-10 xxs:-ml-1">Guardar</button>
        </div>
    </form>
</div>

<script>
    const subcategoriesData = @json($subcategories);

    function filterSubcategories() {
        const categoryId = document.getElementById('dishes_categories_id').value;
        const subcategorySelect = document.getElementById('subcategories_id');
        subcategorySelect.innerHTML = '<option value="">Selecciona una subcategoría</option>';

        console.log("Categoría seleccionada ID:", categoryId);

        const filteredSubcategories = subcategoriesData.filter(subcategory => {
            return subcategory.dishes_categories_id == categoryId;
        });

        console.log("Subcategorías filtradas:", filteredSubcategories);

        if (filteredSubcategories.length === 0) {
            subcategorySelect.innerHTML = '<option value="">No hay subcategorías disponibles</option>';
        } else {
            filteredSubcategories.forEach(subcategory => {
                const option = document.createElement('option');
                option.value = subcategory.id;
                option.textContent = subcategory.name;
                subcategorySelect.appendChild(option);
            });
        }
    }
</script>
@endsection
