@extends('dishes.layout')

@section('content')

<div class="flex items-start ml-20 mb-8">
        <img class="w-80 mr-4" src="https://i.ibb.co/KX69vv5/Pacific-Enterprise.png" alt="Pacific-Enterprise" border="0">

        @if(session('success'))
            <div class="mt-6 alert alert-success bg-green-600 text-white p-3 rounded-lg">
                {{ session('success') }}
            </div>
        @endif
</div>

<a href="{{ route('factures.history') }}" class="font-main ml-32 text-white w-[30%] secondary-color hover:bg-gray-500 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg px-5 py-2.5 text-center">Regresar</a>

<div class="grid container py-8 rounded-xl secondary-color mx-auto w-[30%] text-center text-white mb-5">
    <div class="mt-4 text-white">
        <p class="text-lg mb-3 border-b border-gray-500 pb-2 mx-auto w-3/4"><strong>Número de órden:</strong> {{ $order->invoice_number }}</p>
        <p class="text-lg mb-3 border-b border-gray-500 pb-2 mx-auto w-3/4"><strong>Método de pago:</strong> {{ $order->payment_method_name }}</p>
        <p class="text-lg mb-3 border-b border-gray-500 pb-2 mx-auto w-3/4"><strong>Nota:</strong> {{ $order->note }}</p>
        <p class="text-lg mb-3 border-b border-gray-500 pb-2 mx-auto w-3/4"><strong>Total:</strong> {{ $order->total }}</p>
</div>

<div class="grid grid-cols-2 justify-self-end mt-6 mr-8 gap-6">
    <a class="flex items-center justify-center w-12 h-12 rounded-full bg-cyan-200 hover:bg-cyan-500 focus:ring-4 focus:outline-none focus:ring-cyan-300" href="">
        <img  class="w-7 h-7" src="https://i.ibb.co/vQsQx02/7830829-print-text-icon.png" alt="Editar">
    </a>
</div>


@endsection
