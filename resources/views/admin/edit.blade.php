@extends('dishes.layout')

@section('content')

<div class="lg:mt-0 mt-12">
        <!-- Logo de la Empresa -->
        <img class="w-56 xxs:mx-2 m-12 lg:block hidden" src="https://i.ibb.co/KX69vv5/Pacific-Enterprise.png" alt="Pacific-Enterprise" border="0">
  <div class="flex justify-center items-center mb-10 lg:-mr-0 sm:-mr-16">
    <div class="grid grid-cols-2 xxs:grid-cols-1 lg:gap-96 sm:gap-10 xxs:gap-4 xxs:mt-4">
      <h1 class="text-2xl font-bold text-white font-main lg:ml-0 sm:ml-7 xxs:text-lg xxs:text-center">Actualiza el usuario</h1>
      <a href="{{ route('admin.show', $user->id) }}" class="font-main text-white w-[50%] secondary-color hover:bg-cyan-500 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg px-5 py-2.5 text-center xxs:mt-4 xxs:justify-self-center">Atrás</a>
    </div>
  </div>

    <!-- Mensaje de error -->
    @include('admin.partials.error-messages')

  <!-- Formulario para actualizar usuario -->
  <form action="{{ route('admin.update', $user->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="pl-20 grid grid-cols-2 md:-ml-0 sm:-ml-6 xxs:grid-cols-1 xxs:justify-items-center xxs:pl-4 xxs:ml-[-4%]">
        
        <!-- Información del usuario -->
        <div class="grid">
            <!-- Puesto del usuario -->
            <div class="mt-2 mb-2">
              <label for="job_titles_id" class="block mb-2 font-medium text-white font-main">Puesto del usuario:</label>
              <select name="job_titles_id" id="job_titles_id" class="secondary-color border border-gray-300 text-sm rounded-lg block w-80 p-2.5 focus:ring-blue-500 focus:border-blue-500 text-white">
                <option value="">Selecciona un título</option>
                  @foreach($titles as $title)
                    <option value="{{ $title->id }}" {{ $user->job_titles_id == $title->id ? 'selected' : '' }}>{{ $title->title }}</option>
                  @endforeach
              </select>
            </div>

            <!-- Nombre -->
            <div class="grid mb-2">
                <label for="name" class="block mb-2 font-medium text-white font-main">Nombre</label>
                <input id="name" class="secondary-color border border-gray-300 text-sm rounded-lg block w-80 p-2.5 text-white" type="text" name="name" value="{{ old('name', $user->name) }}" placeholder="Nombre completo">
            </div>


            <!-- Usuario -->
            <div class="grid mb-2">
                <label for="username" class="block mb-2 font-medium text-white font-main">Usuario</label>
                <input id="username" class="secondary-color border border-gray-300 text-sm rounded-lg block w-80 p-2.5 text-white" type="text" name="username" value="{{ old('username', $user->username) }}" placeholder="Usuario">
            </div>

        </div>

        <!-- Contraseña y correo -->
        <div>
            <!-- Contraseña -->
            <div class="grid mb-2">
              <label for="password" class="block mb-2 font-medium text-white font-main">Contraseña</label>
              <input id="password" class="secondary-color border border-gray-300 text-sm rounded-lg block w-80 p-2.5 text-white" type="password" name="password" placeholder="Contraseña para el usuario">
              <small class="text-gray-400 mb-2">Deja este campo vacío si no deseas cambiar la contraseña.</small>
          </div>


          <div class="grid mb-2">
            <label for="email" class="block mb-2 font-medium text-white font-main">Correo electrónico asociado</label>
            <input id="email" class="secondary-color border border-gray-300 text-sm rounded-lg block w-80 p-2.5 text-white" type="email" name="email" value="{{ old('email', $user->email) }}" placeholder="Correo">
          </div>

        </div>

        </div>

        <!-- Botón de actualización -->
        <div class="flex justify-end xxs:justify-center xxs:ml-16 pr-20 mt-5">
          <button type="submit" class="font-main text-white w-full lg:w-[9%] md:[12%] sm:w-[16%] max-w-[300px] secondary-color hover:bg-green-500 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg px-5 py-2.5 text-center lg:mr-60 md:mr-0 sm:mr-1 mb-10">Actualizar</button>
        </div>
  </form>
</div>
@endsection
