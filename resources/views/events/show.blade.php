@extends('events.layout')

@section('content')
<div class="container mx-auto mt-10">
    <div class=" shadow-md rounded-[2rem] overflow-hidden relative">
        <img src="{{ asset('storage/images/' . $event->image_path) }}" alt="{{ $event->title }}"
            class="w-full h-[80vh] object-cover">
        <div class="absolute inset-0 flex flex-col justify-end p-6 bg-gradient-to-t from-black/70 to-transparent">
            <h1 class="text-white text-3xl font-bold mb-2">{{ $event->title }}</h1>
            <p class="text-white mb-4">Fecha del Evento: {{ $event->event_date }}</p>
            <p class="text-white">{{ $event->description }}</p>
        </div>
    </div>
    <div class="flex justify-center mt-6">
        <a href="{{ route('events.index') }}"
            class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Volver a la Lista de Eventos</a>
    </div>
</div>
@endsection