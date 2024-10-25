@extends('dishes.layout')
@section('content')
<div>
    <img class="w-56 m-12" src="https://i.ibb.co/KX69vv5/Pacific-Enterprise.png" alt="Pacific-Enterprise" border="0">
    <div class="flex justify-center items-center mb-10">
        <div class="grid grid-cols-2 gap-96">
            <h1 class="text-2xl font-bold text-white font-main">Añade un nuevo evento</h1>
            <a class="font-main text-white w-[30%] secondary-color hover:bg-cyan-500 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg px-5 py-2.5 text-center" href="{{ route('dishes.index') }}">Atrás</a>
        </div>
    </div>

    <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="pl-20 grid grid-cols-[50%,50%]">

            <div class="grid">

                <div class="grid mb-2">
                    <label class="block mb-2 font-medium text-white font-main">Título</label>
                    <input class="secondary-color border border-gray-300 text-sm rounded-lg block w-80 p-2.5 text-white"
                        type="text" name="title" placeholder="Título del evento" value="{{ old('title') }}" required>
                </div>

                <div class="grid mb-2">
                    <label class="block mb-2 font-medium text-white font-main">Fecha del Evento</label>
                    <input class="secondary-color border border-gray-300 text-sm rounded-lg block w-80 p-2.5 text-white"
                        type="date" name="event_date" placeholder="Fecha del evento" value="{{ old('event_date') }}"
                        required>
                </div>

                <div class="grid mb-2">
                    <label class="block mb-2 font-medium text-white font-main">Descripción</label>
                    <textarea
                        class="secondary-color border border-gray-300 text-sm rounded-lg block w-80 p-2.5 text-white"
                        name="description" cols="30" rows="3"
                        placeholder="Descripción del evento">{{ old('description') }}</textarea>
                </div>

            </div>

            <!-- Sección 2 -->
            <div>

                <div class="grid mb-2">
                    <label for="image" class="block mb-2 font-medium text-white font-main">Imagen</label>
                    <input type="file" accept=".jpg, .png" id="image"
                        class="text-white secondary-color border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-80 p-2.5"
                        name="image">
                </div>

            </div>

        </div>

        <div class="flex justify-center mt-6">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Crear
                Evento</button>
        </div>
    </form>
</div>
@endsection