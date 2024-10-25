@extends('events.layout')
@section('content')
<div>
    <img class="w-56 m-12" src="https://i.ibb.co/KX69vv5/Pacific-Enterprise.png" alt="Pacific-Enterprise" border="0">

    @if ($errors->any())
        <div class="bg-red-500 text-white p-4 mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('events.update', $event->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="pl-20 grid grid-cols-[50%,50%]">

            <div class="grid">

                <h1 class="text-2xl font-bold text-white font-main ">Editar Evento</h1>

                <div class="grid mb-2">
                    <label class="block mb-2 font-medium text-white font-main">Título</label>
                    <input class="secondary-color border border-gray-300 text-sm rounded-lg block w-80 p-2.5 text-white"
                        type="text" name="title" placeholder="Título del evento" value="{{ old('title', $event->title) }}" required>
                </div>

                <div class="grid mb-2">
                    <label class="block mb-2 font-medium text-white font-main">Fecha del Evento</label>
                    <input class="secondary-color border border-gray-300 text-sm rounded-lg block w-80 p-2.5 text-white"
                        type="date" name="event_date" placeholder="Fecha del evento" value="{{ old('event_date', $event->event_date) }}" required>
                </div>

                <div class="grid mb-2">
                    <label class="block mb-2 font-medium text-white font-main">Descripción</label>
                    <textarea
                        class="secondary-color border border-gray-300 text-sm rounded-lg block w-80 p-2.5 text-white"
                        name="description" cols="30" rows="3"
                        placeholder="Descripción del evento">{{ old('description', $event->description) }}</textarea>
                </div>

            </div>

            <!-- Sección 2 -->
            <div>

                <div class="grid mb-2">
                    <label for="image" class="block mb-2 font-medium text-white font-main">Imagen</label>
                    <input type="file" accept=".jpg, .png" id="image"
                        class="text-white secondary-color border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-[61%] p-2.5"
                        name="image">
                    
                </div>
                <div class="flex mt-6">
                    <button type="submit"
                        class="font-main text-white w-[30%] secondary-color hover:bg-cyan-500 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg px-4 py-2 mr-2 text-center">Actualizar
                        Evento</button>

                    <a class="font-main text-white w-[30%] secondary-color hover:bg-cyan-500 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg px-4 py-2 text-center"
                        href="{{ route('events.index') }}">Atrás</a>

                </div>

            </div>

        </div>
    </form>
</div>
@endsection