@extends('dishes.layout')

@section('content')

<div class="grid lg:grid-cols-[20%,80%] lg:pl-6">

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
            <a class="py-3 mb-5 pl-2 secondary-color hover:bg-[#323035] focus:bg-[#323035] active:bg-[#323035] block rounded-lg transition-colors duration-300"
                href="{{ route('dishes.inventory') }}">Inventario</a>

            @if(Auth::check() && Auth::user()->job_titles_id == 1)
                <a class="py-3 mb-5 pl-2 hover:bg-[#323035] focus:bg-[#323035] active:bg-[#323035] block rounded-lg"
                    href="{{ route('dishes.index') }}">Productos</a>
                <a class="py-3 mb-5 pl-2 hover:bg-[#323035] focus:bg-[#323035] active:bg-[#323035] block rounded-lg"
                    href="{{ route('factures.ordering') }}">Punto de Venta</a>
                <a class="py-3 mb-5 pl-2 hover:bg-[#323035] focus:bg-[#323035] active:bg-[#323035] block rounded-lg"
                    href="{{ route('factures.order') }}">Órdenes</a>
                <a class="py-3 mb-5 pl-2 block rounded-lg hover:bg-[#323035] focus:bg-[#323035] active:bg-[#323035]"
                    href="{{ route('factures.history') }}">Historial de Ventas</a>

                @if(Auth::check() && Auth::user()->job_titles_id == 1)
                    <a class="py-3 mb-5 pl-2 hover:bg-[#323035] focus:bg-[#323035] active:bg-[#323035] block rounded-lg"
                        href="{{ route('dishes.index') }}">Productos</a>
                    <a class="py-3 mb-5 pl-2 secondary-color hover:bg-[#323035] focus:bg-[#323035] active:bg-[#323035] block rounded-lg transition-colors duration-300"
                        href="{{ route('dishes.inventory') }}">Inventario</a>
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
        <div class="grid xxs:ml-6 grid-cols-[70%,20%]">
            <form method="GET" action="{{ route('dishes.inventory') }}" class="grid grid-cols-3 lg:gap-0 sm:gap-4">
                <div class="grid">
                    <label class="xxs:mt-8 my-0 md:text-lg text-white lg:mt-0 md:mt-[18%] lg:ml-0 md:ml-[11%] lg:text-base sm:text-xs font-main lg:pb-2 font-bold" for="category">Filtrar por:</label>
                    <select
                        class="bg-rose-300 rounded h-8 text-center lg:w-40 sm:w-20 xxs:mt-2 text-white lg:text-base sm:text-xs lg:ml-0 md:ml-[11%]"
                        id="category" name="category">
                        <option class="lg:text-base sm:text-xs" value="0">Todo</option>
                        @foreach ($categories as $category)
                            <option class="lg:text-base sm:text-xs" value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="grid lg:ml-0 xxs:ml-12 content-end">
                    <button type="submit" class="font-bold flex items-center justify-center font-main text-black bg-white h-10 xxs:text-xs xxs:h-10 lg:w-28 md:w-20 xxs:w-20 xxs:p-2 ml-5 mr-5 rounded-xl text-center hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100">Buscar</button>
                </div>

                <div class="grid lg:ml-0 xxs:ml-12 content-end">
                    <button type="button" onclick="printTable()"
                        class="flex items-center justify-center font-main bg-white h-10 xxs:h-10 lg:w-20 md:w-16 xxs:w-16 mx-2 rounded-xl hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100">
                        <img src="https://i.ibb.co/vQsQx02/7830829-print-text-icon.png" alt="Imprimir" class="h-6 w-6">
                    </button>
                </div>


            </form>
        </div>

        <div class="lg:w-[90%] lg:grid lg:gap-16 xxs:gap-1">
            <div class="py-10 rounded-lg ">
                <table id="dataTable" class="w-full rounded-lg">
                    <thead class="rounded-lg text-white font-main font-bold secondary-color">
                        <tr>
                            <th scope="col" class="rounded-l-lg py-3 xxs:px-0 lg:text-base xxs:text-[0.5rem]">Nombre</th>
                            <th scope="col" class="py-3 xxs:px-0 lg:text-base xxs:text-[0.5rem]">Categoria</th>
                            <th scope="col" class="py-3 xxs:px-0 lg:text-base xxs:text-[0.5rem]">Subcategoria</th>
                            <th scope="col" class="py-3 xxs:px-0 lg:text-base xxs:text-[0.5rem]">Precio Individual</th>
                            <th scope="col" class="rounded-r-lg py-3 xxs:px-0 lg:text-base xxs:text-[0.5rem]">Unidades</th>
                        </tr>
                    </thead>

                    <tbody>
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

<script>
    function printTable() {
        var printContents = document.getElementById('dataTable').outerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }
</script>

@endsection