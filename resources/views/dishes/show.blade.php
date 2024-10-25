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

<a href="{{ route('dishes.index') }}" class="font-main ml-32 text-white w-[30%] secondary-color hover:bg-gray-500 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg px-5 py-2.5 text-center">Regresar</a>

<div class="grid container py-8 rounded-xl secondary-color mx-auto w-[50%] text-center text-white mb-5">
    <h1 class="text-2xl mb-6 font-bold">{{ $dish->title }}</h1>
    <img class="w-72 mx-auto rounded-lg	" src="{{ asset('storage/images/' . $dish->image) }}" alt="{{ $dish->title }}" border="0">
    <div class="mt-4 text-white">
        <p class="text-lg mb-3 border-b border-gray-500 pb-2 mx-auto w-3/4"><strong>Descripción:</strong> {{ $dish->description }}</p>
        <p class="text-lg mb-3 border-b border-gray-500 pb-2 mx-auto w-3/4"><strong>Precio de compra:</strong> ${{ number_format($dish->purchase, 2) }}</p>
        <p class="text-lg mb-3 border-b border-gray-500 pb-2 mx-auto w-3/4"><strong>Precio de venta:</strong> ${{ number_format($dish->sale_price, 2) }}</p>
        <p class="text-lg mb-3 border-b border-gray-500 pb-2 mx-auto w-3/4"><strong>Categoría:</strong> {{ $dish->category }}</p>
        <p class="text-lg mb-3 border-b border-gray-500 pb-2 mx-auto w-3/4"><strong>Subcategoría:</strong> {{ $dish->subcategory }}</p>
        <p class="text-lg mb-3 border-b border-gray-500 pb-2 mx-auto w-3/4"><strong>Unidades disponibles:</strong> {{ $dish->units }}</p>
</div>


@endsection

