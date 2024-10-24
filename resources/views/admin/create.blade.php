@extends('admin.layout')

@section('content')

<div>
    <img class="w-56 m-12 xxs:mx-2" src="https://i.ibb.co/KX69vv5/Pacific-Enterprise.png" alt="Pacific-Enterprise" border="0">
    <div class="flex justify-center items-center mb-10 xxs:mb-4">
        <div class="grid grid-cols-2 lg:gap-96 md:gap-16 xxs:grid xxs:grid-cols-1">
            <h1 class="lg:text-2xl md:text-xl font-bold text-white font-main lg:ml-0 md:ml-16 xxs:mb-2">Añade un nuevo usuario</h1>
            <a class="font-main text-white lg:w-[30%] md:w-[50%] lg:h-auto md:h-auto secondary-color hover:bg-cyan-500 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg px-5 py-2.5 text-center" href="{{ route('admin.users') }}">Atrás</a>
        </div>
    </div>

    @if ($errors->any())
    <div class="mb-4 ml-20">
        <ul class="list-disc list-inside">
            @foreach ($errors->all() as $error)
                <li class="bg-red-300 text-red-800 border border-red-600 rounded-lg p-2 mb-2 w-[20%]">
                    {{ $error }}
                </li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('admin.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="pl-20 grid grid-cols-[50%,50%] xxs:grid xxs:grid-cols-1 xxs:gap-y-1 xxs:px-2">

            <div class="grid">

            <div class="mt-2 mb-2">
                    <div>
                    <label for="job_titles_id" class="block mb-2 font-medium text-white font-main">Puesto del usuario:</label>
                        <select name="job_titles_id" id="job_titles_id" class="secondary-color border border-gray-300 text-sm rounded-lg block w-80 p-2.5 focus:ring-blue-500 focus:border-blue-500 text-white">
                            <option value="">Selecciona un título</option>
                            @foreach($titles as $title)
                                <option value="{{ $title->id }}">{{ $title->title }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="grid mb-2">
                    <label class="block mb-2 font-medium text-white font-main">Nombre</label>
                    <input class="secondary-color border border-gray-300 text-sm rounded-lg block w-80 p-2.5 text-white" type="text" name="name" placeholder="Nombre completo">
                </div>

                <div class="grid mb-2">
                    <label class="block mb-2 font-medium text-white font-main">Usuario</label>
                    <input class="secondary-color border border-gray-300 text-sm rounded-lg block w-80 p-2.5 text-white" type="text" name="username" placeholder="Usuario">
                </div>
            
            </div>

            <div>

                <div class="grid mb-2">
                    <label class="block mb-2 font-medium text-white font-main">Contraseña</label>
                    <input class="secondary-color border border-gray-300 text-sm rounded-lg block w-80 p-2.5 text-white" type="password" name="password" placeholder="Contraseña para el usuario">
                </div>

                <div class="grid mb-2">
                    <label class="block mb-2 font-medium text-white font-main">Correo electronico asociado</label>
                    <input class="secondary-color border border-gray-300 text-sm rounded-lg block w-80 p-2.5 text-white" type="text" name="email" placeholder="Correo">
                </div>

            </div>

        </div>

        <div class="flex lg:justify-end justify-center pr-20 xxs:pr-2 xxs:py-4 lg:pr-0 mt-5">
    <button type="submit" class="font-main text-white w-full lg:w-[9%] md:w-full sm:w-full max-w-[300px] secondary-color hover:bg-green-500 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg px-5 py-2.5 md:pr-4 md:-pl-4 text-center lg:mr-60 md:mr-0 sm:mr-1 mb-10">
        Guardar
    </button>
</div>


    </form>
</div>

@endsection