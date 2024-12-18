@extends('events.layout')

@section('content')

<div class="grid lg:grid-cols-[20%,80%] lg:pl-6 pl-20">

    <div class="mr-5">

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
            <a class="py-3 mb-5 pl-2 hover:bg-[#323035] focus:bg-[#323035] active:bg-[#323035] block rounded-lg "
                href="{{ route('dishes.inventory') }}">Inventario</a>

            @if(Auth::check() && Auth::user()->job_titles_id == 1)
            <a class="py-3 mb-5 pl-2 hover:bg-[#323035] focus:bg-[#323035] active:bg-[#323035] block rounded-lg"
                href="{{ route('dishes.index') }}">Productos</a>
            <a class="py-3 mb-5 pl-2 hover:bg-[#323035] focus:bg-[#323035] active:bg-[#323035] block rounded-lg"
                href="{{ route('suppliers.index') }}">Proveedores</a>
            <a class="py-3 mb-3 pl-2 block rounded-lg secondary-color hover:bg-[#323035] focus:bg-[#323035] active:bg-[#323035] transition-colors duration-300"
                href="{{ route('events.index') }}">Eventos</a>
            @endif
            

            <a href="{{ route('admin.profile') }}" class="flex cursor-pointer">
                <img class="w-16" src="https://img.icons8.com/?size=100&id=492ILERveW8G&format=png&color=000000" alt="">
                <div class="mt-2 ml-2">
                    <p class="text-lg font-semibold">{{ auth()->user()->name }}</p>
                    <p>@ {{ auth()->user()->username }}</p>
                </div>
            </a>
        </div>
    </div>

    <div class="container w-full xxs:mt-8 ">
        <div class="w-[78vw] mb-4">
            <a class="my-6 xxs:mb-8 lg:ml-0 xxs:ml-[-3%] font-bold flex items-center justify-center h-12 w-48 xxs:w-60 secondary-color xxs:text-xs text-white rounded-xl text-center hover:bg-gray-500 focus:ring-4 focus:outline-none focus:ring-gray-100"
                href="{{ route('events.create') }}">
                Agregar un evento
            </a>
            <div class="grid lg:grid-cols-4 md:grid-cols-3 xxs:grid-cols-1 lg:ml-0  xxs:ml-[-2rem] xxs:gap-6 gap-4 w-full">
            @foreach($events as $event)
                <div class="border w-full min-h-[18rem] bg-[#2D2D2D] border-none rounded-[2rem]">
                    <div class="flex h-40 w-full overflow-hidden relative">
                        <img src="{{ $event->image_path }}" alt="{{ $event->title }}"
                            class="absolute top-0 left-0 w-full h-full object-cover rounded-t-[2rem]">
                    </div>
                    <div class="mx-[5%] my-[2%]">
                        <h2 class="font-bold text-white">{{ $event->title }}</h2>
                        <p class="font-bold text-[#B4C1C7]">Fecha: {{ \Carbon\Carbon::parse($event->event_date)->format('Y-m-d') }}</p>
                        <a href="{{ route('events.show', $event->id) }}"
                        class="text-white font-bold mt-[1rem] w-full bg-[#7ECACA] rounded-[2rem] py-2 text-center block">Ver más</a>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
