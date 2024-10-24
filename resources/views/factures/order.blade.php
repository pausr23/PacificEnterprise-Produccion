@extends('dishes.layout')

@section('content')



<div class="grid grid-cols-[20%,80%] md:pl-6">

<div class="mr-5">

<img class="lg:w-40 md:w-60 xxs:w-40 lg:my-0 md:my-2" src="https://i.ibb.co/KX69vv5/Pacific-Enterprise.png" alt="Pacific-Enterprise">


<div id="sidebar-menu" class="hidden lg:grid pl-2 pt-6 text-white font-light text-sm font-main">
    <a class="py-3 mb-6 pl-2 hover:bg-[#323035] focus:bg-[#323035] active:bg-[#323035] block rounded-lg" href="{{ route('dashboard.principal') }}">Panel Principal</a>
    <a class="py-3 mb-6 pl-2 hover:bg-[#323035] focus:bg-[#323035] active:bg-[#323035] block rounded-lg" href="{{ route('factures.ordering') }}">Punto de Venta</a>
    <a class="py-3 mb-6 pl-2 hover:bg-[#323035] focus:bg-[#323035] active:bg-[#323035] block rounded-lg secondary-color transition-colors duration-300" href="{{ route('factures.order') }}">Órdenes</a>
    <a class="py-3 mb-6 pl-2 block rounded-lg hover:bg-[#323035] focus:bg-[#323035] active:bg-[#323035]" href="{{ route('factures.history') }}">Historial de Ventas</a>

    @if(Auth::check() && Auth::user()->job_titles_id == 1)
        <a class="py-3 mb-6 pl-2 hover:bg-[#323035] focus:bg-[#323035] active:bg-[#323035] block rounded-lg" href="{{ route('dishes.index') }}">Productos</a>
        <a class="py-3 mb-6 pl-2 hover:bg-[#323035] focus:bg-[#323035] active:bg-[#323035] block rounded-lg" href="{{ route('dishes.inventory') }}">Inventario</a>
        <a class="py-3 mb-6 pl-2 hover:bg-[#323035] focus:bg-[#323035] active:bg-[#323035] block rounded-lg" href="{{ route('suppliers.index') }}">Proveedores</a>
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
        <a class="py-3 mb-6 pl-2 hover:bg-[#323035] focus:bg-[#323035] active:bg-[#323035] block rounded-lg secondary-color transition-colors duration-300" href="{{ route('factures.order') }}">Órdenes</a>
        <a class="py-3 mb-6 pl-2 block rounded-lg hover:bg-[#323035] focus:bg-[#323035] active:bg-[#323035]" href="{{ route('factures.history') }}">Historial de Ventas</a>

        @if(Auth::check() && Auth::user()->job_titles_id == 1)
            <a class="py-3 mb-6 pl-2 hover:bg-[#323035] focus:bg-[#323035] active:bg-[#323035] block rounded-lg" href="{{ route('dishes.index') }}">Productos</a>
            <a class="py-3 mb-6 pl-2 hover:bg-[#323035] focus:bg-[#323035] active:bg-[#323035] block rounded-lg" href="{{ route('dishes.inventory') }}">Inventario</a>
            <a class="py-3 mb-6 pl-2 hover:bg-[#323035] focus:bg-[#323035] active:bg-[#323035] block rounded-lg" href="{{ route('suppliers.index') }}">Proveedores</a>
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
        <svg xmlns="http://www.w3.org/2000/svg" class="xxs:h-6 xxs:w-6 lg:h-0 lg:w-0 md:h-8 md:w-8 text-white " fill="none" viewBox="0 0 24 24" stroke="currentColor">
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

    <div class=" scrollbar-hide scrollbarw-full overflow-x-scroll max-h-[80%]">
        <div class="flex overflow-x-scroll xl:overflow-visible gap-[1rem] w-full h-full p-4 scrollbar-hide">
            @foreach($transactions as $transactionId => $transaction)
                    <div
                        class="flex flex-col flex-shrink-0 w-[calc(30%-0.2rem)] h-full  rounded-lg bg-[#2d2d2D] text-white p-4 ">
                        <p class="text-lg font-bold mb-4">Orden #{{ $transactionId }}</p>
                        <div class="border-t border-gray-400 w-full  "></div>
                        <div class="overflow-y-auto scrollbar-hide h-[80%] ">
                            @if(count($transaction['items']) > 0)
                                            <div class="grid grid-cols-2 mx-auto mb-4">
                                                <p class="text-sm font-semibold">Items</p>
                                                <p class="text-sm font-semibold text-right">Cantidad</p>
                                            </div>
                                            <!-- Comprobar si hay items donde dishes_categories_id es diferente de 1 -->
                                            @php
                                                $hasItems = false;
                                            @endphp
                                            @foreach($transaction['items'] as $item)
                                                    @if($item['dishes_categories_id'] != 1)
                                                            @php
                                                                $hasItems = true;
                                                            @endphp
                                                            <div class="flex justify-between w-full">
                                                                <p>{{ $item['title'] }}</p>
                                                                <p>{{ $item['quantity'] }}</p>
                                                            </div>
                                                    @endif
                                            @endforeach
                                            <!-- Mostrar mensaje si no hay items donde dishes_categories_id es diferente de 1 -->
                                            @if(!$hasItems)
                                                <p>No hay comidas por preparar.</p>
                                            @endif
                                            <!-- Segundo foreach para items donde dishes_categories_id es igual a 1 -->
                                            <p class="text-lg font-bold mt-8">Bebidas</p>
                                            <div class="border-t border-gray-400 w-full mx-auto my-4"></div>
                                            @foreach($transaction['items'] as $item)
                                                @if($item['dishes_categories_id'] == 1)
                                                    <div class="flex justify-between w-full">
                                                        <p>{{ $item['title'] }}</p>
                                                        <p>{{ $item['quantity'] }}</p>
                                                    </div>
                                                @endif
                                            @endforeach
                            @else
                                <p>No items found.</p>
                            @endif
                        </div>
                        <form action="{{ route('markOrderAsReady') }}" method="POST" class="mt-auto">
                            @csrf
                            <input type="hidden" name="invoice_number" value="{{ $transactionId }}">
                            <button type="submit" class="w-full bg-[#797979] py-[.5rem] rounded-[.6rem]">Finalizado</button>
                        </form>
                    </div>
            @endforeach
        </div>
    </div>

    @if(session('success'))
        <script>
            alert('{{ session("success") }}');
            window.location.reload();
        </script>
    @endif



    @endsection