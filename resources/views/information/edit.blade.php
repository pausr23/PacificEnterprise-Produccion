@extends('suppliers.layout')

@section('content')
<div>
    <img class="w-56 m-12 xxs:w-60 xxs:hidden" src="https://i.ibb.co/KX69vv5/Pacific-Enterprise.png" alt="Pacific-Enterprise" border="0">
    <div class="flex justify-center items-center mb-10">
        <div class="grid grid-cols-2 xxs:grid-cols-1 xxs:mt-4 lg:gap-96 sm:gap-10">
            <h1 class="lg:text-2xl md:text-xl xxs:text-xl font-bold text-white font-main lg:ml-0">Edita la información de la página</h1>
            <a class="font-main text-white lg:w-[30%] md:w-[50%] lg:h-auto md:h-auto secondary-color hover:bg-cyan-500 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg px-5 py-2.5 xxs:mt-4 text-center" href="{{ route('information.index') }}">Atrás</a>
        </div>
    </div>

    <form action="{{ route('information.update', $information->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="pl-20 grid grid-cols-[50%,50%] xxs:grid-cols-1 md:-ml-0 sm:-ml-6 xxs:-ml-20 xxs:justify-items-center">

            <div class="grid">
                <div class="grid mb-2">
                    <label class="block mb-2 font-medium text-white font-main">Nombre</label>
                    <input class="secondary-color border border-gray-300 text-sm rounded-lg block w-80 p-2.5 text-white" type="text" name="name" value="{{ $information->name }}" placeholder="Nombre">
                </div>

                <div class="grid mb-2">
                    <label class="block mb-2 font-medium text-white font-main">Correo electrónico</label>
                    <input class="secondary-color border border-gray-300 text-sm rounded-lg block w-80 p-2.5 text-white" type="text" name="email" value="{{ $information->email }}" placeholder="Correo electrónico">
                </div>

                <div class="grid mb-2">
                    <label class="block mb-2 font-medium text-white font-main">Número</label>
                    <input class="secondary-color border border-gray-300 text-sm rounded-lg block w-80 p-2.5 text-white" type="text" name="number" value="{{ $information->number }}" placeholder="Número de teléfono">
                </div>
            </div>

            <!-- Sección 2 -->
            <div>
                <div class="grid mb-2">
                    <label class="block mb-2 font-medium text-white font-main">Dirección</label>
                    <input class="secondary-color border border-gray-300 text-sm rounded-lg block w-80 p-2.5 text-white" type="text" name="address" value="{{ $information->address }}" placeholder="Dirección">
                </div>

                <div class="grid grid-cols-1 mb-2">
                    <label class="block mb-2 font-medium text-white font-main">Notas</label>
                    <textarea class="secondary-color border border-gray-300 text-sm rounded-lg block w-80 p-2.5 text-white" name="note" cols="30" rows="3" placeholder="Notas adicionales">{{ $information->note }}</textarea>
                </div>
            </div>

        </div>

        <div class="flex justify-end xxs:justify-center xxs:ml-20 pr-20 mt-5">
            <button type="submit" class="font-main text-white w-[8%] md:w-[12%] sm:w-[16%] xxs:w-full secondary-color hover:bg-green-500 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg px-5 py-2.5 text-center lg:mr-60 mb-10">Actualizar</button>
        </div>
    </form>
</div>

@endsection
