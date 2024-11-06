<div class="grid">
    <div class="grid mb-2">
        <label class="block mb-2 font-medium text-white font-main" for="title">Nombre</label>
        <input id="title" class="secondary-color border border-gray-300 text-sm rounded-lg block w-80 p-2.5 text-white"
            type="text" name="title" value="{{ old('title', $dish->title) }}" placeholder="Nombre del producto">
    </div>


    <div class="mt-2 mb-2">
        <label for="dishes_categories_id" class="block mb-2 font-medium text-white font-main">Categoría:</label>
        <select name="dishes_categories_id" id="dishes_categories_id" class="secondary-color border border-gray-300 text-sm rounded-lg block w-80 p-2.5 text-white" onchange="filterSubcategories()">
            <option value="">Selecciona una categoría</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ $dish->dishes_categories_id == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mt-2 mb-2">
        <label for="subcategories_id" class="block mb-2 font-medium text-white font-main">Subcategoría:</label>
        <select name="subcategories_id" id="subcategories_id" class="secondary-color border border-gray-300 text-sm rounded-lg block w-80 p-2.5 text-white">
            <option value="">Selecciona una categoría primero</option>
            @foreach ($subcategories as $subcategory)
                <option value="{{ $subcategory->id }}" {{ $dish->subcategories_id == $subcategory->id ? 'selected' : '' }}>
                    {{ $subcategory->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="grid mb-2">
        <label class="block mb-2 font-medium text-white font-main" for="units">Unidades</label>
        <input id="units" class="secondary-color border border-gray-300 text-sm rounded-lg block w-80 p-2.5 text-white"
            type="number" name="units" value="{{ old('units', $dish->units) }}"
            placeholder="Unidades disponibles"
            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/^0+(?=\d)/, '')">
    </div>

</div>

<div>
    <div class="grid mb-2">
        <label class="block mb-2 font-medium text-white font-main" for="purchase_price">Precio de compra</label>
        <input id="purchase_price" class="secondary-color border border-gray-300 text-sm rounded-lg block w-80 p-2.5 text-white"
            type="text" name="purchase_price" value="{{ old('purchase_price', $dish->purchase_price) }}"
            placeholder="Precio de compra del producto"
            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/^0+(?=\d)/, '')">
    </div>

    <div class="grid mb-2">
        <label class="block mb-2 font-medium text-white font-main" for="sale_price">Precio de venta</label>
        <input id="sale_price" class="secondary-color border border-gray-300 text-sm rounded-lg block w-80 p-2.5 text-white"
            type="text" name="sale_price" value="{{ old('sale_price', $dish->sale_price) }}"
            placeholder="Precio de venta del producto"
            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/^0+(?=\d)/, '')">
    </div>

    <div class="grid grid-cols-1 mb-2">
        <label class="block mb-2 font-medium text-white font-main" for="description">Descripción</label>
        <textarea id="description" class="secondary-color border border-gray-300 text-sm rounded-lg block w-80 p-2.5 text-white"
                name="description" cols="30" rows="3" placeholder="Descripción del producto">{{ old('description', $dish->description) }}</textarea>
    </div>

    <div class="mt-2 mb-2">
        <label for="image" class="block mb-2 font-medium text-white font-main">Imagen:</label>
        <input type="file" accept=".jpg, .png" id="image" class="text-white secondary-color border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-80 p-2.5"
               name="image">
    </div>
</div>
