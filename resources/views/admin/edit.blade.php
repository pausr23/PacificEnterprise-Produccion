@extends('dishes.layout')

@section('content')

    <div>
        <img class="w-80 ml-20 mb-8" src="https://i.ibb.co/KX69vv5/Pacific-Enterprise.png" alt="Pacific-Enterprise" border="0">
        <a class="font-main ml-20 text-white w-[30%] secondary-color hover:bg-gray-500 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg px-5 py-2.5 text-center" href="{{ route('admin.show', $user->id) }}">Atrás</a>
        
        <h1 class="ml-20 mt-10 mb-10 text-2xl font-bold text-white font-main">Actualiza el usuario</h1> 


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

        <form action="{{ route('admin.update', $user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="pl-20 grid grid-cols-[50%,50%]">

                <div class="grid">

                <div class="mt-2 mb-2">
                        <div>
                        <label for="job_titles_id" class="block mb-2 font-medium text-white font-main">Puesto del usuario:</label>
                            <select name="job_titles_id" id="job_titles_id" class="secondary-color border border-gray-300 text-sm rounded-lg block w-80 p-2.5 focus:ring-blue-500 focus:border-blue-500 text-white">
                                <option value="">Selecciona un título</option>
                                @foreach($titles as $title)
                                    <option value="{{ $title->id }}" {{ $user->job_titles_id == $title->id ? 'selected' : '' }}>{{ $title->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="grid mb-2">
                        <label class="block mb-2 font-medium text-white font-main">Nombre</label>
                        <input class="secondary-color border border-gray-300 text-sm rounded-lg block w-80 p-2.5 text-white" type="text" name="name" value="{{ $user->name }}" placeholder="Nombre completo">
                    </div>

                    <div class="grid mb-2">
                        <label class="block mb-2 font-medium text-white font-main">Usuario</label>
                        <input class="secondary-color border border-gray-300 text-sm rounded-lg block w-80 p-2.5 text-white" type="text" name="username" value="{{ $user->username }}" placeholder="Usuario">
                    </div>
                
                </div>

                <div>

                <div class="grid mb-2">
                    <label class="block mb-2 font-medium text-white font-main">Contraseña</label>
                    <input class="secondary-color border border-gray-300 text-sm rounded-lg block w-80 p-2.5 text-white" type="password" name="password" placeholder="Contraseña para el usuario">
                    <small class="text-gray-400 mb-2">Deja este campo vacío si no deseas cambiar la contraseña.</small>
                </div>

                    <div class="grid mb-2">
                        <label class="block mb-2 font-medium text-white font-main">Correo electronico asociado</label>
                        <input class="secondary-color border border-gray-300 text-sm rounded-lg block w-80 p-2.5 text-white" type="text" name="email" value="{{ $user->email }}" placeholder="Correo">
                    </div>

                </div>

            </div>

            <div class="flex justify-end  mt-5">
                <button type="submit" class="font-main text-white w-[8%] secondary-color hover:bg-green-500 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg px-5 py-2.5 text-center mr-60 mb-10">Guardar</button>
            </div>
        </form>
    </div>

@endsection