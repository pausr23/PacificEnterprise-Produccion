@extends('admin.layout')

@section('content')
    <img class="w-80 ml-10 mb-6 md:mb-10 mt-10" src="https://i.ibb.co/KX69vv5/Pacific-Enterprise.png" alt="Pacific-Enterprise" border="0">

    <div class="grid xxs:m-10 m-20 rounded-xl secondary-color lg:w-[60%] w-[80%] mx-auto">
        <div class="grid  lg:grid-cols-[20%,80%] p-8">
            <img class="rounded-full bg-white lg:m-0 md:m-6 xxs:m-2" src="https://img.icons8.com/?size=100&id=HNn3lC0m5uKR&format=png&color=000000" alt="">
            <div class="ml-10 grid mt-4 lg:grid-cols-2 xxs:grid-cols-1 items-start">
                <div>
                    @if(auth()->check())
                        <h1 class="md:text-3xl xxs:text-xl mb-5 font-bold text-white font-main">
                            Hola, {{ auth()->user()->name }}
                        </h1>
                        <p class="text-lg mb-5 font-semibold text-white font-main">
                            Puesto: {{ auth()->user()->jobTitle->title ?? 'No especificado' }}
                        </p>
                        <p class="md:text-lg xxs:text-md mb-4 text-white font-main">
                            @ {{ auth()->user()->username }}
                        </p>
                    @else
                        <h1 class="text-3xl mb-5 font-bold text-white font-main">
                            Hola, Invitado
                        </h1>
                    @endif
                </div>
                @if(Auth::check() && Auth::user()->job_titles_id == 1)
                    <div class="grid">
                        <a class="mb-3 font-main justify-self-end text-white  xxs:mt-3 p-4 md:w-full h-auto lg:w-[60%] bg-pink-500 hover:bg-pink-700 font-medium rounded-lg text-center md:px-3 xxs:px-1" href="{{ route('admin.users') }}">Administrador de Usuarios</a> 
                        <a class="font-main justify-self-end text-white p-4 xxs:mt-3  md:w-full h-auto lg:w-[60%] bg-pink-500 hover:bg-pink-700 font-medium rounded-lg text-center md:px-3 xxs:px-1" href="{{ route('information.index') }}">Administrador de Información</a>                   
                    </div>
                @endif
            </div>
        </div>
    </div>


    <div class="grid grid-cols-2 w-[20%] md:w-[60%] xxs:w-[80%] gap-x-4 mx-auto xxs:mt-10 xxs:mb-4">
        <a class="p-4 secondary-color xxs:-mt-6 xxs:mb-1 text-white font-main font-semibold hover:bg-cyan-500 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-center self-center" href="{{ route('factures.ordering') }}">Volver</a>

        <form action="{{ route('admin.logout') }}" method="POST" class="inline xxs:mr-3 xxs:-mt-6 xxs:mb-1">
            @csrf
            <button type="submit" class="p-4  w-full secondary-color text-white font-main font-semibold hover:bg-pink-500 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg lg:px-5 sm:px-0 text-center">
                Cerrar Sesion
            </button>
        </form>
    </div>

        
@endsection