@extends('dishes.layout')

@section('content')



<div class="grid grid-cols-[20%,80%] md:pl-6">

    <div class="mr-5">

    <div class="md:mr-5 hidden lg:block">
        <img class="lg:w-60 sm:w-32 sm:ml-0" src="https://i.ibb.co/KX69vv5/Pacific-Enterprise.png"
            alt="Pacific-Enterprise">
        <div id="sidebar-menu" class="hidden lg:grid pl-2 pt-6 text-white font-light text-sm font-main">
            <a class="py-3 mb-6 pl-2 hover:bg-[#323035] focus:bg-[#323035] active:bg-[#323035] block rounded-lg"
                href="{{ route('dashboard.principal') }}">Panel Principal</a>
            <a class="py-3 mb-6 pl-2 hover:bg-[#323035] focus:bg-[#323035] active:bg-[#323035] block rounded-lg"
                href="{{ route('factures.ordering') }}">Punto de Venta</a>
            <a class="py-3 mb-6 pl-2 hover:bg-[#323035] focus:bg-[#323035] active:bg-[#323035] block rounded-lg secondary-color transition-colors duration-300"
                href="{{ route('factures.order') }}">Órdenes</a>
            <a class="py-3 mb-6 pl-2 block rounded-lg hover:bg-[#323035] focus:bg-[#323035] active:bg-[#323035]"
                href="{{ route('factures.history') }}">Historial de Ventas</a>

            @if(Auth::check() && Auth::user()->job_titles_id == 1)
                <a class="py-3 mb-6 pl-2 hover:bg-[#323035] focus:bg-[#323035] active:bg-[#323035] block rounded-lg"
                    href="{{ route('dishes.index') }}">Productos</a>
                <a class="py-3 mb-6 pl-2 hover:bg-[#323035] focus:bg-[#323035] active:bg-[#323035] block rounded-lg"
                    href="{{ route('dishes.inventory') }}">Inventario</a>
                <a class="py-3 mb-6 pl-2 hover:bg-[#323035] focus:bg-[#323035] active:bg-[#323035] block rounded-lg"
                    href="{{ route('suppliers.index') }}">Proveedores</a>
                <a class="py-3 mb-6 pl-4 hover:bg-[#323035] focus:bg-[#323035] active:bg-[#323035] block rounded-lg"
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


        <div class="md:mr-5 lg:hidden  py-4 z-40 h-8 cursor-pointer flex items-center justify-start" 
            onclick="toggleMenu()">
            <img class="w-32" src="https://i.ibb.co/KX69vv5/Pacific-Enterprise.png" alt="Pacific-Enterprise Logo">
        </div>

        <div id="mobile-sidebar-menu"
            class="absolute top-0 left-0 w-full h-screen  transform -translate-x-full transition-transform duration-300 lg:hidden z-10 flex">

            <div class="w-1/2 h-full bg-[#16161A]">
                <div class="mt-10 pl-2 flex items-center justify-start py-4 z-40 h-8 cursor-pointer" 
                    onclick="toggleMenu()">
                    <img class="w-32 " src="https://i.ibb.co/KX69vv5/Pacific-Enterprise.png" alt="Pacific-Enterprise Logo">
                </div>
                <div class="pl-2 pt-6 text-white font-light text-sm font-main">
                    <a class="py-3 mb-6 pl-2 hover:bg-[#323035] focus:bg-[#323035] active:bg-[#323035] block rounded-lg"
                        href="{{ route('dashboard.principal') }}">Panel Principal</a>
                    <a class="py-3 mb-6 pl-2 hover:bg-[#323035] focus:bg-[#323035] active:bg-[#323035] block rounded-lg"
                        href="{{ route('factures.ordering') }}">Punto de Venta</a>
                    <a class="py-3 mb-6 pl-2 secondary-color transition-colors duration-300 hover:bg-[#323035] focus:bg-[#323035]  block rounded-lg"
                        href="{{ route('factures.order') }}">Órdenes</a>
                    <a class="py-3 mb-6 pl-2 block rounded-lg hover:bg-[#323035] focus:bg-[#323035] active:bg-[#323035]"
                        href="{{ route('factures.history') }}">Historial de Ventas</a>

                    @if(Auth::check() && Auth::user()->job_titles_id == 1)
                        <a class="py-3 mb-6 pl-2 hover:bg-[#323035] focus:bg-[#323035] active:bg-[#323035] block rounded-lg"
                        href="{{ route('dishes.index') }}">Productos</a>
                        <a class="py-3 mb-6 pl-2 hover:bg-[#323035] focus:bg-[#323035] active:bg-[#323035] block rounded-lg"
                        href="{{ route('dishes.inventory') }}">Inventario</a>
                        <a class="py-3 mb-6 pl-2 hover:bg-[#323035] focus:bg-[#323035] active:bg-[#323035] block rounded-lg"
                        href="{{ route('suppliers.index') }}">Proveedores</a>
                    @endif

                    <a href="{{ route('admin.profile') }}" class="flex items-center cursor-pointer lg:m-2 sm:ml-0">
                        <img class="lg:w-16 lg:h-16 xxs:w-16 sm:w-10 sm:h-10"
                            src="https://img.icons8.com/?size=100&id=492ILERveW8G&format=png&color=000000" alt="">
                        <div class="lg:ml-2">
                            <p class="text-base font-semibold ml-1">{{ auth()->user()->name }}</p>
                            <p class="text-sm">@ {{ auth()->user()->username }}</p>
                        </div>
                    </a>
                </div>
            </div>

            <div class="w-1/2 h-full bg-black opacity-50"></div>
        </div>

        <script>
            function toggleMenu() {
                const mobileMenu = document.getElementById('mobile-sidebar-menu');

                if (mobileMenu.style.transform === 'translateX(0%)') {
                    mobileMenu.style.transform = 'translateX(-100%)';
                } else {
                    mobileMenu.style.transform = 'translateX(0%)';
                }
            }
        </script>

    </div>

    <div class=" scrollbar-hide scrollbarw-full overflow-x-scroll max-h-[80%] ">
        <div class="flex overflow-x-scroll xl:overflow-visible gap-[1rem] w-full h-full p-4 scrollbar-hide:smt-20  ">
            @foreach($transactions as $transactionId => $transaction)
                    <div
                        class="flex flex-col flex-shrink-0 w-[calc(30%-0.2rem)] xxs:w-64 h-full  rounded-lg bg-[#2d2d2D] text-white p-4  ">
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
                                                        <p ">{{ $item['quantity'] }}</p>
                                                                                                                                                    </div>
                                                @endif
                                            @endforeach
                            @else
                                <p>No items found.</p>
                            @endif
                                                </div>
                                                <form action=" {{ route('markOrderAsReady') }}" method="POST" class="mt-auto">
                                    @csrf
                                    <input type="hidden" name="invoice_number" value="{{ $transactionId }}">
                                    <button type="submit"
                                        class="w-full xxs:text-xs  bg-[#797979] py-[.5rem] rounded-[.6rem]">Finalizado</button>
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