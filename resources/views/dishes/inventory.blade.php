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
            <a class="py-3 mb-6 pl-2 block rounded-lg hover:bg-[#323035] focus:bg-[#323035] active:bg-[#323035]"
                href="{{ route('factures.history') }}">Historial de Ventas</a>

            @if(Auth::check() && Auth::user()->job_titles_id == 1)
                <a class="py-3 mb-6 pl-2 hover:bg-[#323035] focus:bg-[#323035] active:bg-[#323035] block rounded-lg"
                    href="{{ route('dishes.index') }}">Productos</a>
                <a class="py-3 mb-6 pl-2 secondary-color hover:bg-[#323035] focus:bg-[#323035] active:bg-[#323035] block rounded-lg transition-colors duration-300"
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


        <div class="md:mr-5 lg:hidden py-4 z-40 h-8 cursor-pointer flex items-center justify-start" 
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
                    <a class="py-3 mb-6 pl-2 block rounded-lg hover:bg-[#323035] focus:bg-[#323035] active:bg-[#323035]"
                        href="{{ route('factures.history') }}">Historial de Ventas</a>

                    @if(Auth::check() && Auth::user()->job_titles_id == 1)
                        <a class="py-3 mb-6 pl-2 hover:bg-[#323035] focus:bg-[#323035] active:bg-[#323035] block rounded-lg"
                        href="{{ route('dishes.index') }}">Productos</a>
                        <a class="py-3 mb-6 pl-2 secondary-color transition-colors duration-300 hover:bg-[#323035] focus:bg-[#323035]  block rounded-lg"
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


    <div>
        <div class="grid grid-cols-[70%,20%]">
            <form method="GET" action="{{ route('dishes.inventory') }}" class="grid grid-cols-3 lg:gap-0 sm:gap-4">

                <div class="grid">
                    <label class="text-white lg:text-base sm:text-xs font-main pb-2 font-bold" for="category">Filtrar
                        por:</label>
                    <select
                        class="bg-rose-300 rounded m h-8 text-center lg:w-40 sm:w-32 text-white lg:text-base sm:text-xs"
                        id="category" name="category">
                        <option class="lg:text-base sm:text-xs" value="0">Todo</option>
                        @foreach ($categories as $category)
                            <option class="lg:text-base sm:text-xs" value="{{ $category->id }}">{{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="grid lg:ml-0 xxs:ml-12 content-end">
                    <button type="submit"
                        class="lg:text-base md:text-base xxs:text-md font-bold flex items-center justify-center font-main text-black bg-white lg:h-10 sm:h-8 lg:w-28 md:w-20 xxs:w-20 lg:px-0 xxs:px-2 lg:ml-10 lg:rounded-xl xxs:rounded-md text-center hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100">Buscar</button>
                </div>
            </form>
        </div>

    <div class="lg:w-[90%] lg:grid lg:gap-16 xxs:gap-1">
        <div class="py-10 rounded-lg xxs:ml-[-5rem]">
            <table class="w-full rounded-lg">
                <thead class="rounded-lg text-white font-main font-bold secondary-color">
                    <tr>
                        <th scope="col" class="rounded-l-lg py-3 xxs:px-0 lg:text-base xxs:text-[0.5rem]">Nombre</th>
                        <th scope="col" class="py-3 xxs:px-0 lg:text-base xxs:text-[0.5rem]">Categoria</th>
                        <th scope="col" class="py-3 xxs:px-0 lg:text-base xxs:text-[0.5rem]">Subcategoria</th>
                        <th scope="col" class="py-3 xxs:px-0 lg:text-base xxs:text-[0.5rem]">Precio Individual</th>
                        <th scope="col" class="rounded-r-lg py-3 xxs:px-0 lg:text-base xxs:text-[0.5rem]">Unidades</th>
                    </tr>
                </thead>
                
                <tbody class="xxs-:mr-8">
                    @foreach ($dishes as $dish)
                        <tr class="border-b text-white text-center border-neutral-200 dark:border-white/10 lg:text-base xxs:text-[0.5rem] lg:px-0 xxs:px-0">
                            <td scope="col" class="lg:px-3 xxs:px-1 lg:py-3 xxs:py-2">{{ $dish->title }}</td>
                            <td>{{ $dish->category }}</td>
                            <td>{{ $dish->subcategory }}</td>
                            <td>{{ $dish->sale_price }}</td>
                            <td>{{ $dish->units }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>

@endsection