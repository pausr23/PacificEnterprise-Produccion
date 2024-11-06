@extends('admin.layout')

@section('content')
<div class="lg:mt-0 mt-12">
        <!-- Logo de la Empresa -->
        <img class="w-56 xxs:mx-2 m-12 lg:block hidden" src="https://i.ibb.co/KX69vv5/Pacific-Enterprise.png" alt="Pacific-Enterprise" border="0">

        <!-- Título y botón de volver -->
        <div class="flex justify-center items-center mb-10 lg:-mr-0 sm:-mr-16">
            <div class="grid grid-cols-2 xxs:grid-cols-1 lg:gap-96 sm:gap-10 xxs:gap-4 xxs:mt-4">
                <h1 class="text-2xl font-bold text-white font-main lg:ml-0 sm:ml-7 xxs:text-lg xxs:text-center">Añade un nuevo usuario</h1>
                <a class="font-main text-white w-[50%] secondary-color hover:bg-cyan-500 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg px-5 py-2.5 text-center xxs:mt-4 xxs:justify-self-center" href="{{ route('admin.users') }}">Atrás</a>
            </div>
        </div>

        <!-- Mensaje de error -->
        @include('admin.partials.error-messages')

        <!-- Formulario para agregar un nuevo usuario -->
        <form action="{{ route('admin.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Contenedor de campos del formulario -->
            <div class="pl-20 grid grid-cols-[50%,50%] md:-ml-0 sm:-ml-6 xxs:grid-cols-1 xxs:justify-items-center xxs:pl-4 xxs:ml-[-4%]">

                <!-- Columna de izquierda -->
                <div class="grid">
                    <!-- Select de puesto -->
                    <div class="mt-2 mb-2">
                        <label for="job_titles_id" class="block mb-2 font-medium text-white font-main">Puesto del usuario:</label>
                        <select name="job_titles_id" id="job_titles_id" class="secondary-color border border-gray-300 text-sm rounded-lg block w-80 p-2.5 focus:ring-blue-500 focus:border-blue-500 text-white">
                            <option value="">Selecciona un título</option>
                            @foreach($titles as $title)
                                <option value="{{ $title->id }}">{{ $title->title }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Campo de nombre -->
                    <div class="grid mb-2">
                        <label for="name" class="block mb-2 font-medium text-white font-main">Nombre</label>
                        <input id="name" class="secondary-color border border-gray-300 text-sm rounded-lg block w-80 p-2.5 text-white" type="text" name="name" placeholder="Nombre completo">
                    </div>


                    <!-- Campo de usuario -->
                    <div class="grid mb-2">
                        <label for="username" class="block mb-2 font-medium text-white font-main">Usuario</label>
                        <input id="username" class="secondary-color border border-gray-300 text-sm rounded-lg block w-80 p-2.5 text-white" type="text" name="username" placeholder="Usuario">
                    </div>

                </div>

                <!-- Columna de derecha -->
                <div>
                    <!-- Campo de contraseña -->
                    <div class="grid mb-2">
                        <label for="password" class="block mb-2 font-medium text-white font-main">Contraseña</label>
                        <input id="password" class="secondary-color border border-gray-300 text-sm rounded-lg block w-80 p-2.5 text-white" type="password" name="password" placeholder="Contraseña para el usuario">
                    </div>

                    <!-- Campo de correo electrónico -->
                    <div class="grid mb-2">
                        <label for="email" class="block mb-2 font-medium text-white font-main">Correo electrónico asociado</label>
                        <input id="email" class="secondary-color border border-gray-300 text-sm rounded-lg block w-80 p-2.5 text-white" type="text" name="email" placeholder="Correo">
                    </div>
                    
                </div>
            </div>

            <!-- Botón de enviar -->
            <div class="flex justify-end xxs:justify-center xxs:ml-16 pr-20 mt-5">
                <button type="submit" class="font-main text-white w-full lg:w-[9%] md:w-[12%] sm:w-[16%] max-w-[300px] secondary-color hover:bg-green-500 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg px-5 py-2.5 md:pr-4 md:-pl-4 text-center lg:mr-60 md:mr-0 sm:mr-1 mb-10">Guardar</button>
            </div>
        </form>
    </div>
@endsection
