<!-- resources/views/components/search-form.blade.php -->
<form method="GET" action="{{ $action }}" class="grid grid-cols-3 xxs:grid-cols-1 gap-y-4">
    <div class="grid">
        <label for="supplier" class="text-white font-main pb-2 font-bold">Nombre:</label>
        <input id="supplier" type="text" name="supplier" placeholder="Nombre del proveedor"
               class="secondary-color rounded text-xs font-light h-8 text-center w-40 xxs:w-60 text-white">
    </div>
    <div class="grid content-end xxs:content-center">
        <button type="submit"
                class="font-bold flex items-center justify-center font-main text-black bg-white h-10 lg:w-28 sm:w-20 xxs:w-60 ml-10 xxs:ml-0 rounded-xl text-center hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100">
            Buscar
        </button>
    </div>
</form>
