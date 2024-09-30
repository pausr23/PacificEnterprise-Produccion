@extends('dishes.layout')

@section('content')


    <img class="w-80 ml-10 mb-10" src="https://i.ibb.co/KX69vv5/Pacific-Enterprise.png" alt="Pacific-Enterprise" border="0">

        <div class="grid m-20 rounded-xl secondary-color w-[50%]">
            <div class="grid grid-cols-[20%,80%] p-8">
                <img class="rounded-full bg-white" src="https://img.icons8.com/?size=100&id=HNn3lC0m5uKR&format=png&color=000000" alt="">
                <div class="ml-10 grid grid-cols-2 items-start">
                    <div>
                        <h1 class="text-3xl mb-5 font-bold text-white font-main">Hola, Maria</h1>
                        <p class="text-lg mb-5 font-semibold text-white font-main">Puesto: Administrador</p>
                        <p class="text-lg text-white font-main">@mari123</p>
                    </div>
                    <a class="font-main justify-self-end text-white py-2 px-4 w-[50%] bg-pink-500 hover:bg-pink-700  font-medium rounded-lg text-center" href="{{ route('admin.users') }}">Administrador de Usuarios</a>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-2 ml-24 w-[20%] gap-x-4">
            <a class=" p-6 secondary-color text-white font-main font-semibold hover:bg-cyan-500 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg px-5 py-2.5 text-center" href="{{ route('dishes.index') }}"> Volver</a>

            <form action="{{ route('admin.logout') }}" method="POST" class="inline">
                @csrf
                <button type="submit" class="p-6 secondary-color text-white font-main font-semibold hover:bg-pink-500 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg px-5 py-2.5 text-center">
                    Cerrar Sesion
                </button>
            </form>

        </div>
        
@endsection