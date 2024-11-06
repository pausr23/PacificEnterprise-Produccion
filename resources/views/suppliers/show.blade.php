@extends('suppliers.layout')

@section('content')
    <!-- Mensaje de éxito (si existe) -->
    <div class="flex items-start ml-20 mb-8">
        @if(session('success'))
            <div class="mt-6 alert alert-success bg-green-600 text-white p-3 rounded-lg">
                {{ session('success') }}
            </div>
        @endif
    </div>

    <!-- Botón para volver -->
    <a class="font-main ml-16 xxs:ml-6 text-white w-[30%] secondary-color hover:bg-gray-500 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg px-5 py-2.5 text-center"
       href="{{ route('suppliers.index') }}">
        Atrás
    </a>

    <!-- Información del Proveedor -->
    <div class="grid container py-8 rounded-xl secondary-color mx-auto w-[50%] xxs:w-[90%] text-center text-white mt-5 xxs:my-6">
        <h1 class="text-2xl mb-6 font-bold">{{ $supplier->name }}</h1>

        <!-- Descripción y Detalles del Proveedor -->
        <div class="mt-4 text-white">
            @foreach ([
                'Número de teléfono' => $supplier->phone_number,
                'Correo electrónico' => $supplier->email ?? 'No proporcionado',  {{-- Muestra un valor por defecto si no hay email --}}
                'Notas adicionales' => $supplier->note ?? 'No hay notas disponibles'
            ] as $label => $value)
                <p class="text-lg mb-3 border-b border-gray-500 pb-2 mx-auto w-3/4">
                    <strong>{{ $label }}:</strong> {{ $value }}
                </p>
            @endforeach
        </div>
    </div>
@endsection
