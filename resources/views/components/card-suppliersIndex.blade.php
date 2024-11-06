<div class="py-4 rounded-lg secondary-color text-white p-3 mt-5 flex flex-col lg:w-[300px] md:w-[90%]">
    <div class="grid lg:grid-cols-3 items-center">
        <div class="text-center">
            <h2 class="font-bold text-sm">{{ $supplier->name }}</h2>
        </div>
        <div class="flex items-center justify-center">
            <div class="h-10 w-px bg-neutral-200"></div>
        </div>
        <div class="text-center">
            <p class="text-sm font-bold">
                {{ substr($supplier->phone_number, 0, 4) }}-{{ substr($supplier->phone_number, 4, 4) }}
            </p>
        </div>
    </div>
    <hr class="my-2 border-neutral-200">
    <div class="mt-2 flex-grow">
        <p class="text-sm">{{ $supplier->note }}</p>
    </div>
    <div class="flex justify-center mt-2 space-x-2">
        <a href="{{ route('suppliers.show', $supplier->id) }}" class="flex items-center justify-center w-8 h-8 rounded-full bg-cyan-200 hover:bg-cyan-500 focus:ring-4 focus:outline-none focus:ring-cyan-100">
            <img src="https://i.ibb.co/VpJRvW8/icons8-buscar-en-la-lista-50.png" alt="Ver" class="w-5 h-5">
        </a>
        <a href="{{ route('suppliers.edit', $supplier->id) }}" class="flex items-center justify-center w-8 h-8 rounded-full bg-lime-200 hover:bg-lime-500 focus:ring-4 focus:outline-none focus:ring-lime-100">
            <img src="https://i.ibb.co/NnbsFc6/icons8-modificar-50.png" alt="Editar" class="w-5 h-5">
        </a>
        <form action="{{ route('suppliers.destroy', $supplier->id) }}" method="POST" class="inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="flex items-center justify-center w-8 h-8 rounded-full bg-rose-300 hover:bg-rose-500 focus:ring-4 focus:outline-none focus:ring-rose-100">
                <img src="https://i.ibb.co/DWwV7Sf/icons8-eliminar-50.png" alt="Eliminar" class="w-5 h-5">
            </button>
        </form>
    </div>
</div>
