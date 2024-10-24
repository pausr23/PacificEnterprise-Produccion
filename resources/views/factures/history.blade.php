@extends('dishes.layout')

@section('content')

<div class="grid grid-cols-[20%,80%] md:pl-6">

<div class="mr-5">

<img class="lg:w-40 md:w-60 xxs:w-40 lg:my-0 md:my-2" src="https://i.ibb.co/KX69vv5/Pacific-Enterprise.png" alt="Pacific-Enterprise">


<div id="sidebar-menu" class="hidden lg:grid pl-2 pt-6 text-white font-light text-sm font-main">
    <a class="py-3 mb-6 pl-2 hover:bg-[#323035] focus:bg-[#323035] active:bg-[#323035] block rounded-lg" href="{{ route('dashboard.principal') }}">Panel Principal</a>
    <a class="py-3 mb-6 pl-2 hover:bg-[#323035] focus:bg-[#323035] active:bg-[#323035] block rounded-lg" href="{{ route('factures.ordering') }}">Punto de Venta</a>
    <a class="py-3 mb-6 pl-2 hover:bg-[#323035] focus:bg-[#323035] active:bg-[#323035] block rounded-lg" href="{{ route('factures.order') }}">Órdenes</a>
    <a class="py-3 mb-6 pl-2 block rounded-lg hover:bg-[#323035] focus:bg-[#323035] active:bg-[#323035] secondary-color transition-colors duration-300" href="{{ route('factures.history') }}">Historial de Ventas</a>

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
        <a class="py-3 mb-6 pl-2 hover:bg-[#323035] focus:bg-[#323035] active:bg-[#323035] block rounded-lg" href="{{ route('dashboard.principal') }}">Punto de Venta</a>
        <a class="py-3 mb-6 pl-2 hover:bg-[#323035] focus:bg-[#323035] active:bg-[#323035] block rounded-lg" href="{{ route('factures.ordering') }}">Punto de Venta</a>
        <a class="py-3 mb-6 pl-2 hover:bg-[#323035] focus:bg-[#323035] active:bg-[#323035] block rounded-lg" href="{{ route('factures.order') }}">Órdenes</a>
        <a class="py-3 mb-6 pl-2 block rounded-lg hover:bg-[#323035] focus:bg-[#323035] active:bg-[#323035] secondary-color transition-colors duration-300" href="{{ route('factures.history') }}">Historial de Ventas</a>

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

    <div class="md:w-full xxs:w-[94%]">
        <div class="grid grid-cols-1 md:grid-cols-[70%,20%] mb-6">
            <form method="GET" action="{{ route('factures.history') }}">
                <div class="grid">
                    <label class="text-white font-main pb-2 font-bold" for="payment_method">Método de Pago:</label>
                    <select class="secondary-color rounded h-8 text-center w-full md:w-40 text-white" id="payment_method" name="payment_method" onchange="this.form.submit()">
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
                            <th scope="col" class="rounded-l-lg px-1 py-3 xxs:px-0.5 lg:text-base xxs:text-[0.8rem]">ID</th>
                            <th scope="col" class="px-1 py-3 xxs:px-0.5 lg:text-base xxs:text-[0.8rem]">Método de pago</th>
                            <th scope="col" class="px-1 py-3 xxs:px-0.5 lg:text-base xxs:text-[0.8rem]">Notas</th>
                            <th scope="col" class="px-1 py-3 xxs:px-0.5 lg:text-base xxs:text-[0.8rem]">Total</th>
                            <th scope="col" class="rounded-r-lg px-1 py-3 xxs:px-0.5 lg:text-base xxs:text-[0.8rem]">Acción</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        @foreach ($orders as $order)
                            <tr class="border-b text-white text-center border-neutral-200 dark:border-white/10 lg:text-base xxs:text-xs lg:px-0 xxs:px-0">
                                <td class="px-2">{{ $order->invoice_number }}</td>
                                <td class="px-2">{{ $order->payment_method_name }}</td>
                                <td class="px-1">{{ $order->note }}</td>
                                <td class="px-2">{{ $order->total }}</td>
                                <td class="py-6 px-2 flex justify-center">
                                    <a class="bg-cyan-200 rounded-lg text-black font-semibold px-4 py-2 me-2 hover:bg-cyan-500 focus:ring-4 focus:outline-none focus:ring-cyan-100" href="">Ver</a>
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