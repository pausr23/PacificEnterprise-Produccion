@extends('dishes.layout')

@section('content')

<div class="grid grid-cols-[20%,80%] pl-12">

    <div class="mr-8">
        <img class="w-72" src="https://i.ibb.co/KX69vv5/Pacific-Enterprise.png" alt="Pacific-Enterprise" border="0">

        <div class="grid pl-10 pt-12 text-white font-light text-sm font-main ">
            <a class="py-3 mb-6 pl-4 hover:bg-[#323035] focus:bg-[#323035] active:bg-[#323035] block rounded-lg" href="">Panel Principal</a>
            <a class="py-3 mb-6 pl-4 block rounded-lg secondary-color hover:bg-[#323035] focus:bg-[#323035] active:bg-[#323035] transition-colors duration-300" href="">Punto de Venta</a>
            <a class="py-3 mb-6 pl-4 hover:bg-[#323035] focus:bg-[#323035] active:bg-[#323035] block rounded-lg" href="">Órdenes</a>
            <a class="py-3 mb-6 pl-4 hover:bg-[#323035] focus:bg-[#323035] active:bg-[#323035] block rounded-lg" href="{{ route('factures.history') }}">Historial</a>

            @if(Auth::check() && Auth::user()->job_titles_id == 1)
                <a class="py-3 mb-6 pl-4 hover:bg-[#323035] focus:bg-[#323035] active:bg-[#323035] block rounded-lg" href="{{ route('dishes.index') }}">Admin</a>
                <a class="py-3 mb-6 pl-4 hover:bg-[#323035] focus:bg-[#323035] active:bg-[#323035] block rounded-lg" href="{{ route('dishes.inventory') }}">Inventario</a>
                <a class="py-3 mb-6 pl-4 hover:bg-[#323035] focus:bg-[#323035] active:bg-[#323035] block rounded-lg" href="{{ route('suppliers.index') }}">Proveedores</a>
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

    <div>
        <div class="grid grid-cols-[70%,20%]">
            <form method="GET" action="{{ route('factures.history') }}">
                <div class="grid">
                    <label class="text-white font-main pb-2 font-bold" for="payment_method">Método de Pago:</label>
                    <select class="secondary-color rounded h-8 text-center w-40 text-white" id="payment_method" name="payment_method" onchange="this.form.submit()">
                        <option value="0">Todo</option>
                        @foreach ($paymentMethods as $method)
                            <option value="{{ $method->id }}">{{ $method->name }}</option>
                        @endforeach
                    </select>
                </div>
            </form>

        </div>


        <div class="w-[90%] grid gap-16">
            <div class="py-10 rounded-lg">
                <table class="w-full rounded-lg">
                    <thead class="rounded-lg text-white font-main font-bold secondary-color">
                        <tr>
                            <th scope="col" class="rounded-l-lg px-12 py-3">ID</th>
                            <th scope="col" class="px-12 py-3">Total</th>
                            <th scope="col" class="px-12 py-3">Tipo de pago</th>
                            <th scope="col" class="px-12 py-3">Notas</th>
                            <th scope="col" class="rounded-r-lg px-12 py-3">Accion</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        @foreach ($orders as $order)
                            <tr class="border-b text-white text-center border-neutral-200 dark:border-white/10">
                                <td>{{ $order->registered_dishes_id }}</td>
                                <td>{{ $order->total }}</td>
                                <td>{{ $order->payment_method_name }}</td>
                                <td>{{ $order->note }}</td>
                                <td class="py-6">
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
