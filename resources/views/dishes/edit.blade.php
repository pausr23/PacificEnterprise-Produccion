@extends('dishes.layout')

@section('content')
<div>
    <img class="w-56 xxs:mx-2 m-12 xxs:hidden" src="https://i.ibb.co/KX69vv5/Pacific-Enterprise.png" alt="Pacific-Enterprise" border="0">
    <div class="flex justify-center items-center mb-10 lg:-mr-0 sm:-mr-16">
        <div class="grid grid-cols-2 xxs:grid-cols-1 lg:gap-96 sm:gap-10 xxs:gap-4 xxs:mt-4">
            <h1 class="text-2xl font-bold text-white font-main lg:ml-0 sm:ml-7 xxs:text-lg xxs:align-center">Edita el producto</h1>
            <a class="font-main text-white w-[50%] secondary-color hover:bg-cyan-500 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg px-5 py-2.5 text-center xxs:mt-4 xxs:justify-self-center" href="{{ route('dishes.index') }}">Atrás</a>
        </div>
    </div>

    @if ($errors->any())
        <div class="bg-gray-200 border-l-4 border-red-500 text-red-700 p-4 mb-4 m-5" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Formulario -->
    <form action="{{ route('dishes.update', $dish->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="pl-20 grid grid-cols-[50%,50%] md:-ml-0 sm:-ml-6 xxs:grid xxs:grid-cols-1 xxs:justify-items-center xxs:gap-y-1 xxs:px-2">


            <div class="grid">

                
                <div class="grid mb-2">
                    <label class="block mb-2 font-medium text-white font-main">Nombre</label>
                    <input class="secondary-color border border-gray-300  text-sm rounded-lg block w-80 p-2.5 text-white" type="text" name="title" value="{{ $dish->title }}" placeholder="Nombre del producto">
                </div>

                <div class="mt-2 mb-2">
                    <div>
                        <label for="dishes_categories_id" class="block mb-2 font-medium text-white font-main">Categoría:</label>
                        <select name="dishes_categories_id" id="dishes_categories_id" class="secondary-color border border-gray-300  text-sm rounded-lg block w-80 p-2.5 focus:ring-blue-500 focus:border-blue-500 text-white" onchange="filterSubcategories()">
                            <option value="">Selecciona una categoría</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ $dish->dishes_categories_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
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
                    <input class="secondary-color border border-gray-300 text-sm rounded-lg block w-80 p-2.5 text-white" type="number" name="units" value="{{ $dish->units }}" placeholder="Unidades disponibles" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/^0+(?=\d)/, '')">
                </div>
            
            </div>

            <!-- Sección 2 -->
            <div>

                <!-- Precio -->
                <div class="grid mb-2">
                    <label class="block mb-2 font-medium text-white font-main">Precio de comrpa</label>
                    <input class="secondary-color border border-gray-300 text-sm rounded-lg block w-80 p-2.5 text-white" type="text" name="purchase_price" value="{{ $dish->purchase_price }}" placeholder="Precio de compra del producto" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/^0+(?=\d)/, '')">
                </div>

                <div class="grid mb-2">
                    <label class="block mb-2 font-medium text-white font-main">Precio de venta</label>
                    <input class="secondary-color border border-gray-300 text-sm rounded-lg block w-80 p-2.5 text-white" type="text" name="sale_price" value="{{ $dish->sale_price }}" placeholder="Precio de venta del producto" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/^0+(?=\d)/, '')">
                </div>

                <!-- Description -->
                <div class="grid grid-cols-1 mb-2">
                    <label class="block mb-2 font-medium text-white font-main">Descripción</label>
                    <textarea class="secondary-color border border-gray-300 text-sm rounded-lg block w-80 p-2.5 text-white" name="description" cols="30" rows="3" placeholder="Descripción del producto">{{ $dish->description }}</textarea>
                </div>

                <!-- Image -->
                <div class="mt-2 mb-2">
                    <div>
                        <label for="image" class="block mb-2 font-medium text-white font-main">Imagen:</label>
                        <input type="file" accept=".jpg, .png" id="image" class="text-white secondary-color border border-gray-300  text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-80 p-2.5" name="image">
                        @if($dish->image && $dish->image != 'default.jpg')
                            <img src="{{ asset('storage/images/' . $dish->image) }}" alt="" class="mt-2 w-40 h-auto">
                        @endif
                    </div>
                </div>

            </div>

        </div>

        <!-- Botón de guardar -->
        <div class="flex justify-end xxs:justify-center pr-20 mt-5 xxs:px-3 xxs:ml-1">
            <button type="submit" class="font-main text-white w-full lg:w-[9%] md:[12%] sm:w-[16%] max-w-[300px] secondary-color hover:bg-green-500 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg px-5 py-2.5 md:pr-4 md:-pl-4 text-center lg:mr-60 md:mr-0 sm:mr-1 mb-10">Actualizar</button>
        </div>
    </form>
</div>

<script>
    const subcategoriesData = @json($subcategories);

    function filterSubcategories() {
        const categoryId = document.getElementById('dishes_categories_id').value;
        const subcategorySelect = document.getElementById('subcategories_id');
        subcategorySelect.innerHTML = '<option value="">Selecciona una subcategoría</option>';

        const filteredSubcategories = subcategoriesData.filter(subcategory => {
            return subcategory.dishes_categories_id == categoryId;
        });

        if (filteredSubcategories.length === 0) {
            subcategorySelect.innerHTML = '<option value="">No hay subcategorías disponibles</option>';
        } else {
            filteredSubcategories.forEach(subcategory => {
                const option = document.createElement('option');
                option.value = subcategory.id;
                option.textContent = subcategory.name;
                if (subcategory.id == '{{ $dish->subcategories_id }}') {
                    option.selected = true;
                }
                subcategorySelect.appendChild(option);
            });
        }
    }


    document.addEventListener('DOMContentLoaded', () => {
        filterSubcategories();
    });
</script>
@endsection
