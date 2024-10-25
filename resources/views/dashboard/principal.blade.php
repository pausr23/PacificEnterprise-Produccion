@extends('dishes.layout')

@section('content')

<head>
    < <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
</head>

<div class="grid grid-cols-[20%,80%] pl-12">

    <div class="mr-8">
        <img class="w-72" src="https://i.ibb.co/KX69vv5/Pacific-Enterprise.png" alt="Pacific-Enterprise" border="0">

        <div class="grid pl-10 pt-12 text-white font-light text-sm font-main ">
            <a class="py-3 mb-6 pl-4 block rounded-lg secondary-color hover:bg-[#323035] focus:bg-[#323035] active:bg-[#323035] transition-colors duration-300"
                href="{{ route('dashboard.principal') }}">Panel Principal</a>
            <a class="py-3 mb-6 pl-4 hover:bg-[#323035] focus:bg-[#323035] active:bg-[#323035] block rounded-lg"
                href="{{ route('factures.ordering') }}">Punto de Venta</a>
            <a class="py-3 mb-6 pl-4 hover:bg-[#323035] focus:bg-[#323035] active:bg-[#323035] block rounded-lg"
                href="{{ route('factures.order') }}">Órdenes</a>
            <a class="py-3 mb-6 pl-4 hover:bg-[#323035] focus:bg-[#323035] active:bg-[#323035] block rounded-lg"
                href="{{ route('factures.history') }}">Historial de Ventas</a>

            @if(Auth::check() && Auth::user()->job_titles_id == 1)
                <a class="py-3 mb-6 pl-4 hover:bg-[#323035] focus:bg-[#323035] active:bg-[#323035] block rounded-lg"
                    href="{{ route('dishes.index') }}">Productos</a>
                <a class="py-3 mb-6 pl-4 hover:bg-[#323035] focus:bg-[#323035] active:bg-[#323035] block rounded-lg"
                    href="{{ route('dishes.inventory') }}">Inventario</a>
                <a class="py-3 mb-6 pl-4 hover:bg-[#323035] focus:bg-[#323035] active:bg-[#323035] block rounded-lg"
                    href="{{ route('suppliers.index') }}">Proveedores</a>
            @endif

            <a class="flex cursor-pointer" href="{{ route('admin.profile') }}">
                <img class="w-16" src="https://img.icons8.com/?size=100&id=492ILERveW8G&format=png&color=000000" alt="">
                <div class="mt-2 ml-2">
                    <p class="text-lg font-semibold">{{ auth()->user()->name }}</p>
                    <p>@ {{ auth()->user()->username }}</p>
                </div>
            </a>
        </div>

    </div>

    <div>
        <form class="my-6" action="{{ route('principal.show') }}" method="POST">
            @csrf

            <label class="font-main text-white mr-4 text-lg" for="date">Selecciona una fecha:</label>
            <input class="rounded-lg mr-4 px-3 py-2 secondary-color text-white" type="date" name="date"
                value="{{ old('date', $selectedDate) }}" required>

            <button class="secondary-color rounded-lg text-white px-3 py-2 font-semibold" type="submit">Enviar</button>
        </form>

        <div class="grid grid-cols-2">
            <div class="secondary-color rounded-md p-8 w-[92%]">
                <img class="w-12 rounded-full bg-gray-300 p-2 mb-12"
                    src="https://img.icons8.com/isometric-line/50/stack-of-money.png" alt="stack-of-money">
                <p class="text-white font-main text-xs font-light mb-2">Ganancias del día</p>
                <p class="text-white font-main text-3xl">₡{{ number_format($totalEarnings) }}</p>
            </div>

            <div class="secondary-color rounded-md w-[92%] p-8">
                <img class="w-12 rounded-full bg-gray-300 p-2 mb-12"
                    src="https://img.icons8.com/isometric-line/50/stack-of-money.png" alt="stack-of-money">
                <p class="text-white font-main text-xs font-light mb-2">Cantidad de pedidos</p>
                <p class="text-white font-main text-3xl">{{ $invoiceCount }}</p>
            </div>
        </div>
        <div class="grid grid-cols-[30%,65%] gap-4 mt-12">

            <div class="border grid grid-cols-2 text-white border-gray-300 rounded-md p-4">
                <h1 class="font-main text-lg">Pedidos de hoy</h1>
                <a class="underline opacity-60 content-center justify-self-end text-sm"
                    href="{{ route('factures.history') }}">Ver historial</a>
                <div class="flex items-center mt-2">
                    <img class="secondary-color rounded-md w-10  p-1"
                        src="https://img.icons8.com/sf-regular-filled/48/FFFFFF/bank-card-back-side.png"
                        alt="bank-card-back-side" alt="card">
                    <div class="grid">
                        <p class="ml-2">Orden #57</p>
                        <p class="ml-2">$43.0</p>
                    </div>
                </div>
            </div>

            <div class="swiper-container" style="overflow: hidden; position: relative;">
                <div class="swiper-wrapper">
                    @foreach($events as $event)
                        <div class="swiper-slide">
                            <div class="shadow-md rounded-[2rem] overflow-hidden relative">
                                <img src="{{ asset('storage/images/' . $event->image_path) }}" alt="{{ $event->title }}"
                                    class="w-full h-[25vw] object-fit">
                                <div
                                    class="absolute inset-0 flex flex-col justify-end p-6 bg-gradient-to-t from-black/70 to-transparent">
                                    <h2 class="text-white text-3xl font-bold mb-2">{{ $event->title }}</h2>
                                    <p class="text-white mb-4">Fecha: {{ $event->event_date }}</p>
                                    <p class="text-white">{{ $event->description }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- Agregar botones de navegación -->
                <button class="swiper-button-next swiper-button-white"
                    style="position: absolute; top: 50%; transform: translateY(-50%); right: 10px; z-index: 10; cursor: pointer;"></button>
                <button class="swiper-button-prev swiper-button-white"
                    style="position: absolute; top: 50%; transform: translateY(-50%); left: 10px; z-index: 10; cursor: pointer;"></button>
                <!-- Agregar paginación -->
                <div class="swiper-pagination swiper-pagination-white"></div>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                var swiper = new Swiper('.swiper-container', {
                    slidesPerView: 1,
                    spaceBetween: 10,
                    navigation: {
                        nextEl: '.swiper-button-next',
                        prevEl: '.swiper-button-prev',
                    },
                    pagination: {
                        el: '.swiper-pagination',
                        clickable: true,
                    },
                });
            });
        </script>

    </div>
</div>
</div>
@endsection