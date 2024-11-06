@extends('dishes.layout')

@section('content')

    <div class="flex items-start ml-20 xxs:ml-0 mb-8">
        @if(session('success'))
            <div class="mt-6 alert alert-success bg-green-600 text-white p-3 rounded-lg">
                {{ session('success') }}
            </div>
        @endif
    </div>

    <a class="font-main ml-16 xxs:ml-6 text-white w-[30%] secondary-color hover:bg-gray-500 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg px-5 py-2.5 text-center" href="{{ route('information.index') }}">
        Atrás
    </a>

    <div class="grid container py-8 rounded-xl secondary-color mx-auto lg:w-[30%] sm:w-[50%] xxs:w-[90%] text-justify text-white mt-5 xxs:my-6">
        <div class="ml-16 mt-8">
            <h1 class="text-2xl mb-6 font-bold">Detalles de la página</h1>
            <div class="text-lg mb-3 border-b border-gray-500 pb-2 w-3/4">
                <strong>Nombre:</strong>
                <span class="pl-2">{{ $information->name }}</span>
            </div>
            <div class="text-lg mb-3 border-b border-gray-500 pb-2 w-3/4">
                <strong>Correo electrónico:</strong>
                <span class="pl-2">{{ $information->email }}</span>
            </div>
            <div class="text-lg mb-3 border-b border-gray-500 pb-2 w-3/4">
                <strong>Número:</strong>
                <span class="pl-2">{{ $information->number }}</span>
            </div>
            <div class="text-lg mb-3 border-b border-gray-500 pb-2 w-3/4">
                <strong>Dirección:</strong>
                <span class="pl-2">{{ $information->address }}</span>
            </div>
            <div class="text-lg border-b border-gray-500 pb-2 w-3/4">
                <strong>Notas:</strong>
                <span class="pl-2">{{ $information->note }}</span>
            </div>
        </div>

        <div class="grid grid-cols-2 justify-self-end mt-6 mr-8 gap-6">
            <a class="flex items-center justify-center w-12 h-12 rounded-full bg-lime-200 hover:bg-lime-500 focus:ring-4 focus:outline-none focus:ring-lime-300" href="{{ route('information.edit', $information->id) }}">
                <img class="w-7 h-7" src="https://i.ibb.co/NnbsFc6/icons8-modificar-50.png" alt="Editar">
            </a>
            <form action="{{ route('information.destroy', $information->id) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button class="flex items-center justify-center w-12 h-12 rounded-full bg-rose-300 hover:bg-rose-500 focus:ring-4 focus:outline-none focus:ring-rose-100" type="submit">
                    <img class="w-7 h-7" src="https://i.ibb.co/DWwV7Sf/icons8-eliminar-50.png" alt="Eliminar">
                </button>
            </form>
        </div>
    </div>

@endsection
