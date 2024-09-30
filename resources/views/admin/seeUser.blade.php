@extends('dishes.layout')

@section('content')

    <div class="flex items-start ml-20 mb-8"> 
        <img class="w-80 mr-4" src="https://i.ibb.co/KX69vv5/Pacific-Enterprise.png" alt="Pacific-Enterprise" border="0">

        @if(session('success'))
            <div class="mt-6 alert alert-success bg-green-600 text-white p-3 rounded-lg">
                {{ session('success') }}
            </div>
        @endif
    </div>

    <a class="font-main ml-32 text-white w-[30%] secondary-color hover:bg-gray-500 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg px-5 py-2.5 text-center" href="{{ route('admin.users') }}">Atrás</a>

    <div class="grid container py-8 rounded-xl secondary-color mx-auto w-[30%] text-justify  text-white">
    <img class="rounded-full mx-auto bg-white" src="https://img.icons8.com/?size=100&id=HNn3lC0m5uKR&format=png&color=000000" alt="">

    

    <div class="ml-16 mt-8"> 
        <h1 class="text-2xl mb-6 font-bold">Detalles del usuario</h1>
        <p class="text-lg mb-3 border-b border-gray-500 pb-2 w-3/4"><strong>Nombre:</strong> <span class="pl-2">{{ $user->name }}</span></p>
        <p class="text-lg mb-3 border-b border-gray-500 pb-2 w-3/4"><strong>Nombre de usuario:</strong> <span class="pl-2">@ {{ $user->username }}</span></p>
        <p class="text-lg mb-3 border-b border-gray-500 pb-2 w-3/4"><strong>Email:</strong> <span class="pl-2">{{ $user->email }}</span></p>
        <p class="text-lg border-b border-gray-500 pb-2 w-3/4"><strong>Título de trabajo:</strong> <span class="pl-2">{{ $user->jobTitle->title }}</span></p>
    </div>


        <div class="grid grid-cols-2 justify-self-end mt-6 mr-8 gap-6">
            <a class="flex items-center justify-center w-12 h-12 rounded-full bg-lime-200 hover:bg-lime-500 focus:ring-4 focus:outline-none focus:ring-lime-300" href="{{ route('admin.edit', $user->id) }}">
                <img  class="w-7 h-7" src="https://i.ibb.co/NnbsFc6/icons8-modificar-50.png" alt="Editar">
            </a>
            <form action="{{ route('admin.destroy', $user->id) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button class="flex items-center justify-center w-12 h-12 rounded-full bg-rose-300 hover:bg-rose-500 focus:ring-4 focus:outline-none focus:ring-rose-100" type="submit">
                    <img class="w-7 h-7" src="https://i.ibb.co/DWwV7Sf/icons8-eliminar-50.png" alt="Eliminar" >
                </button>
            </form>
        </div>

    </div>
@endsection