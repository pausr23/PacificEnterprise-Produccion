@extends('events.layout')

@section('content')
<div class="container mx-auto mt-10">
    <div class=" shadow-md rounded-[2rem] overflow-hidden relative">
        <img src="{{ $event->image_path }}" alt="{{ $event->title }}"
            class="w-full h-[80vh] object-cover">
        <div class="absolute inset-0 flex flex-col justify-end p-6 bg-gradient-to-t from-black/70 to-transparent">
            <h1 class="text-white text-3xl font-bold mb-2">{{ $event->title }}</h1>
            <p class="text-white mb-4">Fecha del Evento: {{ $event->event_date }}</p>
            <p class="text-white">{{ $event->description }}</p>
        </div>
    </div>
        <div class="flex justify-center mt-6 space-x-4">
        <a href="{{ route('events.index') }}"
            class="bg-cyan-200 text-black font-semibold px-4 py-2 rounded-md hover:bg-cyan-500 focus:ring-4 focus:outline-none focus:ring-cyan-100">Volver a la Lista de Eventos</a>
        <a href="{{ route('events.edit', $event->id) }}"
            class="bg-lime-200 text-black font-semibold px-4 py-2 rounded-md hover:bg-lime-500 focus:ring-4 focus:outline-none focus:ring-lime-100">Editar Evento</a>
        <form action="{{ route('events.destroy', $event->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este evento?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-rose-300 font-semibold text-black px-4 py-2 rounded-md hover:bg-rose-500 focus:ring-4 focus:outline-none focus:ring-rose-100">Eliminar Evento</button>
        </form>
    </div>
</div>
@endsection
