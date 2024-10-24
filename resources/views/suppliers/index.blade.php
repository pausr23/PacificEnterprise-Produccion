@extends('suppliers.layout')

@section('content')

<div class="grid grid-cols-[20%,80%] md:pl-6">
<div class="mr-5">

<img class="lg:w-40 md:w-60 xxs:w-40 lg:my-0 md:my-2" src="https://i.ibb.co/KX69vv5/Pacific-Enterprise.png" alt="Pacific-Enterprise">


<div id="sidebar-menu" class="hidden lg:grid pl-2 pt-6 text-white font-light text-sm font-main">
    <a class="py-3 mb-6 pl-2 hover:bg-[#323035] focus:bg-[#323035] active:bg-[#323035] block rounded-lg" href="{{ route('dashboard.principal') }}">Panel Principal</a>
    <a class="py-3 mb-6 pl-2 hover:bg-[#323035] focus:bg-[#323035] active:bg-[#323035] block rounded-lg" href="{{ route('factures.ordering') }}">Punto de Venta</a>
    <a class="py-3 mb-6 pl-2 hover:bg-[#323035] focus:bg-[#323035] active:bg-[#323035] block rounded-lg" href="{{ route('factures.order') }}">Órdenes</a>
    <a class="py-3 mb-6 pl-2 block rounded-lg hover:bg-[#323035] focus:bg-[#323035] active:bg-[#323035]" href="{{ route('factures.history') }}">Historial de Ventas</a>

    @if(Auth::check() && Auth::user()->job_titles_id == 1)
        <a class="py-3 mb-6 pl-2 hover:bg-[#323035] focus:bg-[#323035] active:bg-[#323035] block rounded-lg" href="{{ route('dishes.index') }}">Productos</a>
        <a class="py-3 mb-6 pl-2 hover:bg-[#323035] focus:bg-[#323035] active:bg-[#323035] block rounded-lg" href="{{ route('dishes.inventory') }}">Inventario</a>
        <a class="py-3 mb-6 pl-2 hover:bg-[#323035] focus:bg-[#323035] active:bg-[#323035] block rounded-lg secondary-color transition-colors duration-300" href="{{ route('suppliers.index') }}">Proveedores</a>
    @endif
    
    <a href="{{ route('admin.profile') }}" class="flex items-center cursor-pointer lg:m-2 sm:ml-0 ">
        <img class="lg:w-16 lg:h-16 sm:w-10 sm:h-10" src="https://img.icons8.com/?size=100&id=492ILERveW8G&format=png&color=000000" alt="">
        <div class="lg:ml-2">
            <p class="text-base font-semibold ml-1">{{ auth()->user()->name }}</p>
            <p class="text-sm">@ {{ auth()->user()->username }}</p>
        </div>
    </a>
</div>


<div id="mobile-sidebar-menu" class="absolute top-0 left-0 w-full h-screen bg-[#16161A] transform translate-x-full transition-transform duration-300 lg:hidden">
    <div class="pl-2 pt-6 text-white font-light text-sm font-main">
        <a class="py-3 mb-6 pl-2 hover:bg-[#323035] focus:bg-[#323035] active:bg-[#323035] block rounded-lg" href="{{ route('dashboard.principal') }}">Panel Principal</a>
        <a class="py-3 mb-6 pl-2 hover:bg-[#323035] focus:bg-[#323035] active:bg-[#323035] block rounded-lg" href="{{ route('factures.ordering') }}">Punto de Venta</a>
        <a class="py-3 mb-6 pl-2 hover:bg-[#323035] focus:bg-[#323035] active:bg-[#323035] block rounded-lg" href="{{ route('factures.order') }}">Órdenes</a>
        <a class="py-3 mb-6 pl-2 block rounded-lg hover:bg-[#323035] focus:bg-[#323035] active:bg-[#323035]" href="{{ route('factures.history') }}">Historial de Ventas</a>

        @if(Auth::check() && Auth::user()->job_titles_id == 1)
            <a class="py-3 mb-6 pl-2 hover:bg-[#323035] focus:bg-[#323035] active:bg-[#323035] block rounded-lg" href="{{ route('dishes.index') }}">Productos</a>
            <a class="py-3 mb-6 pl-2 hover:bg-[#323035] focus:bg-[#323035] active:bg-[#323035] block rounded-lg" href="{{ route('dishes.inventory') }}">Inventario</a>
            <a class="py-3 mb-6 pl-2 hover:bg-[#323035] focus:bg-[#323035] active:bg-[#323035] block rounded-lg secondary-color transition-colors duration-300" href="{{ route('suppliers.index') }}">Proveedores</a>
        @endif
        
        <a href="{{ route('admin.profile') }}" class="flex items-center cursor-pointer lg:m-2 sm:ml-0">
            <img class="lg:w-16 lg:h-16 sm:w-10 sm:h-10" src="https://img.icons8.com/?size=100&id=492ILERveW8G&format=png&color=000000" alt="">
            <div class="lg:ml-2">
                <p class="text-base font-semibold ml-1">{{ auth()->user()->name }}</p>
                <p class="text-sm">@ {{ auth()->user()->username }}</p>
            </div>
        </a>
    </div>
</div>


    <label class="xxs:py-4 xxs:left-6 xxs:z-40 xxs:h-8 xxs:cursor-pointer lg:hidden xxs:flex md:items-center md:justify-center lg:none" for="mobile-checkbox">
        <input class="hidden" type="checkbox" id="mobile-checkbox" onClick="toggleMenu(this)" />
        <svg xmlns="http://www.w3.org/2000/svg" class="xxs:h-6 xxs:w-6 lg:h-0 lg:w-0 md:h-8 md:w-8 ml-5 text-white " fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
    </label>

<div id="content" class="lg:ml-6">

</div>

<script>
function toggleMenu(checkbox) {
    const mobileMenu = document.getElementById('mobile-sidebar-menu');
    const content = document.getElementById('content');
    const isChecked = checkbox.checked;


    if (isChecked) {
        mobileMenu.style.transform = 'translateX(0)'; 
        mobileMenu.style.display = 'block';            
    } else {
        mobileMenu.style.transform = 'translateX(100%)';
        mobileMenu.style.display = 'none';              
    }

   
    content.style.display = isChecked ? 'none' : 'block';

   
    const hamburgerIcon = document.querySelector('label[for="mobile-checkbox"]');
    hamburgerIcon.style.display = isChecked ? 'none' : 'flex'; 
}

window.onload = function() {
    const checkbox = document.getElementById('mobile-checkbox');
    checkbox.checked = false; 
    toggleMenu(checkbox);  
};
</script>

</div>

    <div>
        <div class="grid grid-cols-[70%,20%] xxs:grid-cols-1 xxs:gap-y-4">
            <form method="GET" action="{{ route('suppliers.index') }}" class="grid lg:grid-cols-3 xxs:grid-cols-1 gap-y-4">
                <div class="grid">
                    <label class="text-white font-main pb-2 font-bold" for="dish">Nombre:</label>
                    <input class="secondary-color rounded text-xs font-light h-8 text-center w-40 xxs:w-60 text-white" id="supplier" type="text" name="supplier" placeholder="Nombre del proveedor">
                </div>
                <div class="grid content-end xxs:content-center">
                <button type="submit" class="font-bold flex items-center justify-center font-main text-black bg-white h-10 lg:w-28 sm:w-20 xxs:w-60 ml-10 xxs:ml-0 rounded-xl text-center hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100">Buscar</button>
                </div>
            </form>

            <div class="content-end xxs:content-center">
                <a class="font-bold flex items-center justify-center h-12 lg:w-48 sm:w-40 xxs:w-60 lg:text-base sm:text-xs  secondary-color text-white rounded-xl text-center hover:bg-gray-500 focus:ring-4 focus:outline-none focus:ring-gray-100" href="{{ route('suppliers.create') }}">
                    Agregar un proveedor
                </a>
            </div>
        </div>

        <div class="grid mt-10 lg:grid-cols-3 xxs:grid-cols-1 xxs:w-94 xxs:mr-10 xxs:mb-2 sm:grid-cols-2">
            @if($suppliers->isEmpty())
                <div class="col-span-3 text-center mt-10">
                    <p class="text-white font-main text-lg">No hay registro de proveedores.</p>
                </div>
            @else
                @foreach ($suppliers as $supplier)
                    <div class="py-4 rounded-lg secondary-color text-white p-3 mt-5 flex flex-col lg:w-[300px] sm:w-[190px]">
                        <div class="grid lg:grid-cols-3 items-center">
                            <div class="text-center">
                                <h2 class="font-bold text-sm">{{ $supplier->name }}</h2>
                            </div>
                            <div class="flex items-center justify-center">
                                <div class="h-10 w-px bg-neutral-200  "></div>
                            </div>
                            <div class="text-center">
                                <p class="text-sm p-0 font-bold">{{ $supplier->phone_number }}</p>
                            </div>
                        </div>
                        <hr class="my-2 border-neutral-200">
                        <div class="mt-2 flex-grow">
                            <p class="text-sm">{{ $supplier->note }}</p>
                        </div>
                        <div class="flex justify-center mt-2 space-x-2">
                            <a href="#" class="flex items-center justify-center w-8 h-8 rounded-full bg-cyan-200 hover:bg-cyan-500 focus:ring-4 focus:outline-none focus:ring-cyan-100">
                                <img src="https://i.ibb.co/VpJRvW8/icons8-buscar-en-la-lista-50.png" alt="Ver" class="w-5 h-5">
                            </a>
                            <a href="{{ route('suppliers.edit', $supplier->id) }}" class="flex items-center justify-center w-8 h-8 rounded-full bg-lime-200 hover:bg-lime-500 focus:ring-4 focus:outline-none focus:ring-lime-100">
                                <img src="https://i.ibb.co/NnbsFc6/icons8-modificar-50.png" alt="Editar" class="w-5 h-5">
                            </a>
                            <form action="{{ route('suppliers.destroy', $supplier->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="flex items-center justify-center w-8 h-8 rounded-full bg-rose-300 hover:bg-rose-500 focus:ring-4 focus:outline-none focus:ring-rose-100">
                                    <img src="https://i.ibb.co/DWwV7Sf/icons8-eliminar-50.png" alt="Eliminar" class="w-5 h-5">
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>

@endsection
