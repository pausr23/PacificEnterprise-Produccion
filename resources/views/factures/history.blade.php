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
            <a class="py-3 mb-6 pl-2 hover:bg-[#323035] focus:bg-[#323035] active:bg-[#323035] block rounded-lg"
                href="{{ route('factures.order') }}">Órdenes</a>
            <a class="py-3 mb-6 pl-2 block rounded-lg hover:bg-[#323035] focus:bg-[#323035] active:bg-[#323035] secondary-color transition-colors duration-300"
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
                    <a class="py-3 mb-6 pl-2 hover:bg-[#323035] focus:bg-[#323035] active:bg-[#323035] block rounded-lg"
                        href="{{ route('factures.order') }}">Órdenes</a>
                    <a class="py-3 mb-6 pl-2 secondary-color transition-colors duration-300 hover:bg-[#323035] focus:bg-[#323035]  block rounded-lg"
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

        <script src="{{ asset('js/toggleMenu.js') }}"></script>

    </div>

    <div class="md:w-full xxs:w-[94%]">
        <div class="grid grid-cols-1 md:grid-cols-[70%,20%] mb-6">
            <form method="GET" action="{{ route('factures.history') }}">
                <div class="grid">
                    <label class="text-white font-main pb-2 font-bold" for="payment_method">Método de Pago:</label>
                    <select class="secondary-color rounded h-8 text-center w-full md:w-40 text-white"
                        id="payment_method" name="payment_method" onchange="this.form.submit()">
                        <option value="0">Todo</option>
                        @foreach ($paymentMethods as $method)
                            <option value="{{ $method->id }}">{{ $method->name }}</option>
                        @endforeach
                    </select>
                </div>
            </form>
        </div>

        <div class="w-full md:w-[90%] grid gap-4 md:gap-16 ">
            <div class="py-6 rounded-lg overflow-x-auto xxs:ml-[-3rem]">
                <table class="min-w-full rounded-lg">
                    <thead class="rounded-lg text-white font-main font-bold secondary-color">
                        <tr>
                            <th scope="col" class="rounded-l-lg px-1 py-3 xxs:px-0.5 lg:text-base xxs:text-[0.8rem]">ID
                            </th>
                            <th scope="col" class="px-1 py-3 xxs:px-0.5 lg:text-base xxs:text-[0.8rem]">Método de pago
                            </th>
                            <th scope="col" class="px-1 py-3 xxs:px-0.5 lg:text-base xxs:text-[0.8rem]">Notas</th>
                            <th scope="col" class="px-1 py-3 xxs:px-0.5 lg:text-base xxs:text-[0.8rem]">Total</th>
                            <th scope="col" class="rounded-r-lg px-1 py-3 xxs:px-0.5 lg:text-base xxs:text-[0.8rem]">
                                Acción</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($orders as $order)
                            <tr
                                class="border-b text-white text-center border-neutral-200 dark:border-white/10 lg:text-base xxs:text-xs lg:px-0 xxs:px-0">
                                <td class="px-2">{{ $order->invoice_number }}</td>
                                <td class="px-2">{{ $order->payment_method_name }}</td>
                                <td class="px-1">{{ $order->note }}</td>
                                <td class="px-2">{{ $order->total }}</td>
                                <td class="py-6 px-2 flex justify-center">
                                    <a class="bg-cyan-200 rounded-lg text-black font-semibold px-4 py-2 me-2 hover:bg-cyan-500 focus:ring-4 focus:outline-none focus:ring-cyan-100" href="{{ route('factures.show', $order->id) }}">Ver</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>

    </div>
</div>

@endsection