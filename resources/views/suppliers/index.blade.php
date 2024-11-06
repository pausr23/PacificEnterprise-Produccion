@extends('suppliers.layout')

@section('content')

<div class="grid lg:grid-cols-[20%,80%] pl-10 lg:pl-6">
    <div class="mr-5">

    <div class="md:mr-5 hidden lg:block">
        <img class="mb-4 lg:w-60 sm:ml-0" src="https://i.ibb.co/KX69vv5/Pacific-Enterprise.png"
            alt="Pacific-Enterprise">
        <div id="sidebar-menu" class="hidden lg:grid pl-2 pt-6 text-white font-light text-sm font-main">
            <a class="py-3 mb-5 pl-2 hover:bg-[#323035] focus:bg-[#323035] active:bg-[#323035] block rounded-lg"
                href="{{ route('dashboard.principal') }}">Panel Principal</a>
            <a class="py-3 mb-5 pl-2 hover:bg-[#323035] focus:bg-[#323035] active:bg-[#323035] block rounded-lg"
                href="{{ route('factures.ordering') }}">Punto de Venta</a>
            <a class="py-3 mb-5 pl-2 hover:bg-[#323035] focus:bg-[#323035] active:bg-[#323035] block rounded-lg"
                href="{{ route('factures.order') }}">Órdenes</a>
            <a class="py-3 mb-5 pl-2 block rounded-lg hover:bg-[#323035] focus:bg-[#323035] active:bg-[#323035]"
                href="{{ route('factures.history') }}">Historial de Ventas</a>
            <a class="py-3 mb-5 pl-2 hover:bg-[#323035] focus:bg-[#323035] active:bg-[#323035] block rounded-lg"
                href="{{ route('dishes.inventory') }}">Inventario</a>

            @if(Auth::check() && Auth::user()->job_titles_id == 1)
                <a class="py-3 mb-5 pl-2 hover:bg-[#323035] focus:bg-[#323035] active:bg-[#323035] block rounded-lg"
                    href="{{ route('dishes.index') }}">Productos</a>
                <a class="py-3 mb-5 pl-2 hover:bg-[#323035] focus:bg-[#323035] active:bg-[#323035] block rounded-lg secondary-color transition-colors duration-300"
                    href="{{ route('suppliers.index') }}">Proveedores</a>
                <a class="py-3 mb-3 pl-2 hover:bg-[#323035] focus:bg-[#323035] active:bg-[#323035] block rounded-lg"
                    href="{{ route('events.index') }}">Eventos</a>
            @endif
            

            <a href="{{ route('admin.profile') }}" class="flex items-center cursor-pointer lg:m-2 sm:ml-0 ">
                <img class="lg:w-16 lg:h-16 sm:w-10 sm:h-10"
                    src="https://img.icons8.com/?size=100&id=492ILERveW8G&format=png&color=000000" alt="">
                <div class="lg:ml-2">
                    <p class="text-base font-semibold ml-1">{{ auth()->user()->name }}</p>
                    <p class="text-sm">@ {{ auth()->user()->username }}</p>
                </div>
            </a>
        </div>
        </div>

    </div>

    <div>
        <div class="grid grid-cols-[70%,20%] mt-8 lg:mt-0 lg:ml-0 xxs:ml-[9%] xxs:grid-cols-1 xxs:gap-y-4">
            @include('components.search-suppliersIndex', ['action' => route('suppliers.index')])

            <div class="content-end xxs:content-center">
                <a href="{{ route('suppliers.create') }}" class="font-bold flex items-center justify-center h-12 lg:w-48 sm:w-40 xxs:w-60 lg:text-base sm:text-xs xxs:text-xs secondary-color text-white rounded-xl text-center hover:bg-gray-500 focus:ring-4 focus:outline-none focus:ring-gray-100">
                    Agregar un proveedor
                </a>
            </div>
        </div>

        <div class="grid mt-10 lg:grid-cols-3 md:grid-cols-2 xxs:w-94 xxs:mr-10 xxs:mb-2">
            @if($suppliers->isEmpty())
                <div class="col-span-3 text-center mt-10">
                    <p class="text-white font-main text-lg">No hay registro de proveedores.</p>
                </div>
            @else
                @foreach ($suppliers as $supplier)
                    @include('components.card-suppliersIndex', ['supplier' => $supplier])
                @endforeach
            @endif
        </div>
    </div>
</div>

@endsection
