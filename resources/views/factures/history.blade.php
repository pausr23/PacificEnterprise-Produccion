@extends('dishes.layout')

@section('content')

<div class="grid lg:grid-cols-[20%,80%] pl-6">

    <!-- Menú lateral -->
    <div class="mr-5">
        @include('components.sidebar-link')
    </div>

    <!-- Contenido Principal -->
    <div class="md:w-full xxs:w-[94%]">
        <!-- Filtro de Pago -->
        <div class="grid lg:grid-cols-1 md:grid-cols-[70%,20%] mb-6">
            <form method="GET" action="{{ route('factures.history') }}">
                <div class="grid">
                    <label class="mt-8 text-white font-main pb-2 font-bold" for="payment_method">Método de Pago:</label>
                    <select class="secondary-color rounded h-8 text-center w-full md:w-40 text-white" id="payment_method" name="payment_method" onchange="this.form.submit()">
                        <option value="0">Todo</option>
                        @foreach ($paymentMethods as $method)
                            <option value="{{ $method->id }}">{{ $method->name }}</option>
                        @endforeach
                    </select>
                </div>
            </form>
        </div>

        <!-- Tabla de Órdenes -->
        <div class="w-full md:w-[90%] grid gap-4 md:gap-16 lg:ml-0 md:ml-[4%]">
            <div class="py-6 rounded-lg overflow-x-auto xxs:ml-1">
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
