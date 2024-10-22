@extends('dishes.layout')

@section('content')

<div class="grid grid-cols-[20%,80%] md:pl-6">

    <div class="mr-5">
        <img class="lg:w-40 sm:w-32 sm:ml-0" src="https://i.ibb.co/KX69vv5/Pacific-Enterprise.png" alt="Pacific-Enterprise">

        <div class="grid pl-2 pt-6 text-white font-light text-sm font-main ">
            <a class="py-3 mb-6 pl-2 hover:bg-[#323035] focus:bg-[#323035] active:bg-[#323035] block rounded-lg secondary-color transition-colors duration-300" href="{{ route('dashboard.principal') }}">Panel Principal</a>
            <a class="py-3 mb-6 pl-2 hover:bg-[#323035] focus:bg-[#323035] active:bg-[#323035] block rounded-lg" href="{{ route('factures.ordering') }}">Punto de Venta</a>
            <a class="py-3 mb-6 pl-2 hover:bg-[#323035] focus:bg-[#323035] active:bg-[#323035] block rounded-lg" href="{{ route('factures.order') }}">Órdenes</a>
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

    <div>
    <form class="my-6" action="{{ route('principal.show') }}" method="POST">
    @csrf

    <label class="font-main text-white mr-4 text-lg" for="date">Selecciona una fecha:</label>
    <input class="rounded-lg mr-4 px-3 py-2 secondary-color text-white" type="date" name="date" value="{{ old('date', $selectedDate) }}" required>

    <button class="secondary-color rounded-lg text-white px-3 py-2 font-semibold" type="submit">Enviar</button>
</form>

        <div class="grid grid-cols-2">
            <div class="secondary-color rounded-md p-8 w-[92%]">
                <img class="w-12 rounded-full bg-gray-300 p-2 mb-12" src="https://img.icons8.com/isometric-line/50/stack-of-money.png" alt="stack-of-money">
                <p class="text-white font-main text-xs font-light mb-2">Ganancias del día</p>
                <p class="text-white font-main text-3xl">₡{{ number_format($totalEarnings) }}</p>
            </div>

            <div class="secondary-color rounded-md w-[92%] p-8">
                <img class="w-12 rounded-full bg-gray-300 p-2 mb-12" src="https://img.icons8.com/ios/50/1A1A1A/order-completed--v2.png" alt="order-completed" alt="stack-of-money">
                <p class="text-white font-main text-xs font-light mb-2">Cantidad de pedidos</p>
                <p class="text-white font-main text-3xl">{{ $invoiceCount }}</p>
            </div>
        </div>
        <div class="grid grid-cols-[30%,65%] gap-4 mt-10">

            <div class="border grid text-white border-gray-300 rounded-md p-4">
                <div class="grid grid-cols-2">
                    <h1 class="font-main text-lg">Pedidos de hoy</h1>
                    <a class="underline opacity-60 content-center justify-self-end text-sm" href="{{ route('factures.history') }}">Ver historial</a>
                </div>
                @foreach($recentInvoices as $invoice)
                    <div class="flex items-center mt-2">
                        <img class="secondary-color rounded-md w-10 p-1" src="https://img.icons8.com/sf-regular-filled/48/FFFFFF/bank-card-back-side.png" alt="bank-card-back-side" alt="card">
                        <div class="grid">
                            <p class="ml-2">Orden #{{ $invoice->invoice_number }}</p>
                            <p class="ml-2">${{ $invoice->total }}</p>
                        </div>
                    </div>
                @endforeach


                @if($recentInvoices->isEmpty())
                    <p class="mt-4">No hay pedidos hoy.</p>
                @endif

            </div>

            <div class="border  border-gray-300 rounded-md p-4">

            </div>

        </div>
    </div>

</div>

@endsection