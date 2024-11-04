@extends('suppliers.layout')

@section('content')
<div>
    <img class="w-56 m-12" src="https://i.ibb.co/KX69vv5/Pacific-Enterprise.png" alt="Pacific-Enterprise" border="0">
    <div class="flex justify-center items-center mb-10">
        <div class="grid grid-cols-2 xxs:grid-cols-1 lg:gap-96 xxs:gap-4 sm:gap-10">
            <h1 class="text-2xl font-bold text-white font-main xxs:align-center">Añade un nuevo proveedor</h1>
            <a class="font-main text-white w-[50%] secondary-color hover:bg-cyan-500 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg px-5 xxs:px-1 py-2.5 text-center" href="{{ route('suppliers.index') }}">Atrás</a>
        </div>
    </div>

    <form action="{{ route('suppliers.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="pl-20 grid grid-cols-[50%,50%] md:-ml-0 sm:-ml-6 xxs:grid-cols-1 xxs:pl-4">

            <div class="grid">

                <div class="grid mb-4">
                    <label class="block mb-2 font-medium text-white font-main">Nombre</label>
                    <input class="secondary-color border border-gray-300 text-sm rounded-lg block w-80 p-2.5 text-white" type="text" name="name" placeholder="Nombre del proveedor">
                </div>

                <div class="grid mb-4">
                    <label class="block mb-2 font-medium text-white font-main">Número de teléfono</label>
                    <input class="secondary-color border border-gray-300 text-sm rounded-lg block w-80 p-2.5 text-white" type="text" name="phone_number" placeholder="Número de teléfono del proveedor">
                </div>
            
            </div>

            <!-- Seccion 2 -->
            <div>

                <div class="grid mb-4">
                    <label class="block mb-2 font-medium text-white font-main">Correo electrónico</label>
                    <input class="secondary-color border border-gray-300 text-sm rounded-lg block w-80 p-2.5 text-white" type="text" name="email" placeholder="Correo electrónico del proveedor">
                </div>

                <div class="grid grid-cols-1 mb-4">
                    <label class="block mb-2 font-medium text-white font-main">Notas Adicionales</label>
                    <textarea class="secondary-color border border-gray-300 text-sm rounded-lg block w-80 p-2.5 text-white" name="note" cols="30" rows="3" placeholder="Notas adicionales del proveedor"></textarea>
                </div>

            </div>

        </div>

        <div class="flex justify-end pr-20 mt-5">
            <button type="submit" class="font-main text-white w-[8%] md:w-[12%] sm:w-[16%] xxs:w-full secondary-color hover:bg-green-500 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg px-5 py-2.5 text-center lg:mr-60 xxs:mr-0 mb-10">Guardar</button>
        </div>
    </form>
</div>

@endsection
