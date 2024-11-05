@extends('admin.layout')

@section('content')

<div>
    <img class="w-56 m-12 xxs:hidden" src="https://i.ibb.co/KX69vv5/Pacific-Enterprise.png" alt="Pacific-Enterprise" border="0">
    <div class="flex justify-center items-center mb-10 lg:-mr-0 sm:-mr-16">
        <div class="grid grid-cols-2 xxs:grid-cols-1 lg:gap-96 sm:gap-10 xxs:gap-4 xxs:mt-4">
            <h1 class="text-2xl font-bold text-white font-main lg:ml-0 sm:ml-7 xxs:text-lg xxs:align-center">Añade un nuevo usuario</h1>
            <a class="font-main text-white w-[50%] secondary-color hover:bg-cyan-500 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg px-5 py-2.5 text-center xxs:mt-4 xxs:justify-self-center" href="{{ route('admin.users') }}">Atrás</a>
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
        <div class="pl-20 grid grid-cols-[50%,50%] md:-ml-0 sm:-ml-6 xxs:grid-cols-1 xxs:justify-items-center xxs:pl-4 xxs:ml-[-4%]">

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

        <div class="flex justify-end xxs:justify-center xxs:ml-16 pr-20 mt-5">
    <button type="submit" class="font-main text-white w-full lg:w-[9%] md:[12%] sm:w-[16%] max-w-[300px] secondary-color hover:bg-green-500 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg px-5 py-2.5 md:pr-4 md:-pl-4 text-center lg:mr-60 md:mr-0 sm:mr-1 mb-10">Actulizar
    </button>
</div>


    </form>
</div>

@endsection