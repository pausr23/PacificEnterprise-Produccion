@extends('dashboard.layout')

@section('content')

<div class="grid lg:grid-cols-[20%,80%] md:pl-6 pl-10">

    <div class="md:mr-5">

    <div class="md:mr-5 hidden lg:block">
        <img class="mb-4 lg:w-60 sm:ml-0" src="https://i.ibb.co/KX69vv5/Pacific-Enterprise.png"
            alt="Pacific-Enterprise">

        <div id="sidebar-menu" class="hidden lg:grid pl-2 pt-6 text-white font-light text-sm font-main">
            <a class="py-3 mb-5 pl-2 secondary-color transition-colors duration-300 hover:bg-[#323035] focus:bg-[#323035] active:bg-[#323035] block rounded-lg"
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
                <a class="py-3 mb-5 pl-2 hover:bg-[#323035] focus:bg-[#323035] active:bg-[#323035] block rounded-lg"
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
        <div class="md:grid md:grid-cols-2">
            <form class="my-2" action="{{ route('principal.show') }}" method="POST">
                @csrf
                <label class="font-main xxs:text-sm text-white mr-4 lg:text-lg md:text-md" for="date">Selecciona una fecha:</label>
                <input class="rounded-lg xxs:px-2 xxs:py-1 mr-4 px-3 mt-2 py-2 secondary-color text-white" type="date" name="date" value="{{ old('date', $selectedDate) }}" required>
                <button class="secondary-color xxs:px-2 xxs:text-sm rounded-lg mt-2 text-white px-3 py-2 font-semibold" type="submit">Buscar por Día</button>
            </form>

            <div class="my-6 flex items-center">
                <label class="switch">
                    <input type="checkbox" id="toggleSwitch">
                    <span class="slider round w-14 md:ml-3"></span>
                    Activo
                </label>

                <span class="font-main text-white md:ml-9 text-lg xxs:text-sm">Mostrar Gráficos</span>
            </div>
        </div>

        <div class="grid md:grid-cols-2 gap-4 xxs:mr-7">
            <div id="earningsView" class="secondary-color mb-4 md:mb-0 rounded-md p-8 w-[92%]">
                <img id="earningsImage" class="w-12 rounded-full bg-gray-300 p-2 mb-12" src="https://img.icons8.com/isometric-line/50/stack-of-money.png" alt="Ganancias">
                <p id="earningsLabel" class="text-white font-main text-xs font-light mb-2">Ganancias del día</p>
                <p id="earningsTotal" class="text-white font-main text-3xl">₡{{ number_format($totalEarnings) }}</p>
            </div>

            <div class="mb-4 md:mb-0" id="earningsChartContainer" style="display: none;">
                <canvas id="earningsChart"></canvas>
            </div>

            <div id="ordersView" class="secondary-color rounded-md mb-4 md:mb-0 w-[92%] p-8">
                <img id="ordersImage" class="w-12 rounded-full bg-gray-300 p-2 mb-12" src="https://img.icons8.com/ios/50/1A1A1A/order-completed--v2.png" alt="Pedidos">
                <p id="ordersLabel" class="text-white font-main text-xs font-light mb-2">Cantidad de pedidos</p>
                <p id="ordersTotal" class="text-white font-main text-3xl">{{ $invoiceCount }}</p>
            </div>

            <div id="ordersChartContainer" style="display: none;">
                <canvas id="ordersChart"></canvas>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="{{ asset('js/charts.js') }}"></script>

        <div class="grid lg:grid-cols-[30%,65%] mt-10 xxs:mr-16 md:mr-10">
            <div class="border grid lg:mr-8 text-white lg:mb-4 mb-8 border-gray-300 rounded-md lg:p-4 xxs:p-1">
                <div class="lg:flex lg:items-start lg:justify-between xxs:grid xxs:grid-cols-1">
                    <h1 class="font-main lg:text-lg xxs:text-sm">Pedidos de hoy</h1>
                    <a class="underline opacity-60 lg:justify-self-end lg:text-sm xxs:text-xs" href="{{ route('factures.history') }}">Ver historial</a>
                </div>
                @foreach($recentInvoices as $invoice)
                    <div class="flex items-center mb-4 md:mb-0 mt-2">
                        <img class="secondary-color rounded-md ml-2 lg:w-10 xxs:w-8 p-1" src="https://img.icons8.com/sf-regular-filled/48/FFFFFF/bank-card-back-side.png" alt="card">
                        <div class="grid">
                            <p class="ml-2 lg:text-lg xxs:text-xs">Orden #{{ $invoice->invoice_number }}</p>
                            <p class="ml-2">${{ $invoice->total }}</p>
                        </div>
                    </div>
                @endforeach

                @if($recentInvoices->isEmpty())
                    <p class="font-semibold">No hay pedidos recientes.</p>
                @endif
            </div>

            <div class="swiper" style="overflow: hidden; position: relative; max-width: 100%; margin: 0 auto;">
                <div class="mb-4 swiper-wrapper">
                    @foreach($events as $event)
                        <div class="swiper-slide" style="width: auto; flex: 0 0 auto;">
                            <a href="{{ route('events.show', $event->id) }}" class="block">
                                <div class="shadow-md rounded-[2rem] overflow-hidden relative mb-6 md:mb-0">
                                    <img src="{{ $event->image_path }}" alt="{{ $event->title }}" class="w-full lg:h-[20vw] object-cover">
                                    <div class="absolute inset-0 flex flex-col justify-end p-6 bg-gradient-to-t from-black/70 to-transparent">
                                        <h2 class="text-white md:text-3xl text-2xl font-bold mb-2">{{ $event->title }}</h2>
                                        <p class="text-white md:mb-4">Fecha: <span class="ml-2">{{ $event->event_date }}</span></p>
                                        <p class="text-white">{{ $event->description }}</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>

                <button class="swiper-button-next swiper-button-white" style="position: absolute; top: 50%; transform: translateY(-50%); right: 10px; z-index: 10; cursor: pointer;"></button>
                <button class="swiper-button-prev swiper-button-white" style="position: absolute; top: 50%; transform: translateY(-50%); left: 10px; z-index: 10; cursor: pointer;"></button>
                <div class="swiper-pagination swiper-pagination-white"></div>
            </div>
        </div>

        <script src="{{ mix('js/app.js') }}"></script>
    </div>
        @endsection
