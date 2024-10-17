@extends('dishes.layout')

@section('content')

<div class="grid grid-cols-1 md:grid-cols-[20%,80%] pl-4 md:pl-12">

    <div class="mr-4 md:mr-8">
        <img class="w-32 md:w-40 lg:w-72" src="https://i.ibb.co/KX69vv5/Pacific-Enterprise.png" alt="Pacific-Enterprise">

        <div class="grid pl-4 pt-6 text-white font-light text-sm font-main ">
            <a class="py-3 mb-6 pl-4 hover:bg-[#323035] focus:bg-[#323035] active:bg-[#323035] block rounded-lg" href="{{ route('dashboard.principal') }}">Panel Principal</a>
            <a class="py-3 mb-6 pl-4 hover:bg-[#323035] focus:bg-[#323035] active:bg-[#323035] block rounded-lg" href="{{ route('factures.ordering') }}">Punto de Venta</a>
            <a class="py-3 mb-6 pl-4 hover:bg-[#323035] focus:bg-[#323035] active:bg-[#323035] block rounded-lg" href="{{ route('factures.order') }}">Órdenes</a>
            <a class="py-3 mb-6 pl-4 block rounded-lg secondary-color hover:bg-[#323035] focus:bg-[#323035] active:bg-[#323035] transition-colors duration-300" href="{{ route('factures.history') }}">Historial de Ventas</a>

            @if(Auth::check() && Auth::user()->job_titles_id == 1)
                <a class="py-3 mb-6 pl-4 hover:bg-[#323035] focus:bg-[#323035] active:bg-[#323035] block rounded-lg" href="{{ route('dishes.index') }}">Productos</a>
                <a class="py-3 mb-6 pl-4 hover:bg-[#323035] focus:bg-[#323035] active:bg-[#323035] block rounded-lg" href="{{ route('dishes.inventory') }}">Inventario</a>
                <a class="py-3 mb-6 pl-4 hover:bg-[#323035] focus:bg-[#323035] active:bg-[#323035] block rounded-lg" href="{{ route('suppliers.index') }}">Proveedores</a>
            @endif
            
            <a href="{{ route('admin.profile') }}" class="flex items-center cursor-pointer m-2">
                <img class="w-16 h-16 md:w-20 md:h-20" src="https://img.icons8.com/?size=100&id=492ILERveW8G&format=png&color=000000" alt="">
                <div class="ml-2">
                    <p class="text-base md:text-lg font-semibold">{{ auth()->user()->name }}</p>
                    <p class="text-sm">@ {{ auth()->user()->username }}</p>
                </div>
            </a>

        </div>
        
    </div>

    <div class="w-full">
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

        <div class="w-full md:w-[90%] grid gap-4 md:gap-16">
            <div class="py-6 rounded-lg overflow-x-auto">
                <table class="min-w-full rounded-lg">
                    <thead class="rounded-lg text-white font-main font-bold secondary-color">
                        <tr>
                            <th scope="col" class="rounded-l-lg px-4 py-3 md:px-12">ID</th>
                            <th scope="col" class="px-4 py-3 md:px-12">Método de pago</th>
                            <th scope="col" class="px-4 py-3 md:px-12">Notas</th>
                            <th scope="col" class="px-4 py-3 md:px-12">Total</th>
                            <th scope="col" class="rounded-r-lg px-4 py-3 md:px-12">Acción</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        @foreach ($orders as $order)
                            <tr class="border-b text-white text-center border-neutral-200 dark:border-white/10">
                                <td class="px-2 md:px-4">{{ $order->invoice_number }}</td>
                                <td class="px-2 md:px-4">{{ $order->payment_method_name }}</td>
                                <td class="px-2 md:px-4">{{ $order->note }}</td>
                                <td class="px-2 md:px-4">{{ $order->total }}</td>
                                <td class="py-6 px-2 md:px-4 flex justify-center">
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
