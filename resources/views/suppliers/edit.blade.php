@extends('suppliers.layout')

@section('content')
<div>
    <img class="w-56 m-12 xxs:hidden" src="https://i.ibb.co/KX69vv5/Pacific-Enterprise.png" alt="Pacific-Enterprise" border="0">
    <div class="flex justify-center items-center mb-10 lg:-mr-0 sm:-mr-16">
        <div class="grid grid-cols-2 xxs:grid-cols-1 lg:gap-96 sm:gap-8 xxs:gap-4 xxs:mt-4">
            <h1 class="text-2xl font-bold text-white font-main lg:ml-0 sm:ml-4 xxs:text-lg xxs:align-center">Edita la información del proveedor</h1>
            <a class="font-main text-white w-[50%] lg:h-auto sm:h-[2.8rem] secondary-color hover:bg-cyan-500 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg px-5 py-2.5 text-center xxs:mt-4 xxs:justify-self-center" href="{{ route('suppliers.index') }}">Atrás</a>
        </div>
    </div>

    <form action="{{ route('suppliers.update', $supplier->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="pl-20 grid grid-cols-[50%,50%] md:-ml-0 sm:-ml-6 xxs:grid-cols-1 xxs:justify-items-center xxs:pl-4 xxs:ml-[-4%]">

            <div class="grid">

                <div class="grid mb-5">
                    <label class="block mb-2 font-medium text-white font-main">Nombre</label>
                    <input class="secondary-color border border-gray-300 text-sm rounded-lg block w-80 p-2.5 text-white" type="text" name="name" value="{{ old('name', $supplier->name) }}" placeholder="Nombre del proveedor">
                </div>

                <div class="grid mb-2">
                    <label class="block mb-2 font-medium text-white font-main">Número de teléfono</label>
                    <input class="secondary-color border border-gray-300 text-sm rounded-lg block w-80 p-2.5 text-white" type="text" name="phone_number" value="{{ old('phone_number', $supplier->phone_number) }}" placeholder="Número de teléfono del proveedor">
                </div>
            
            </div>

            <div>

                <div class="grid mb-5">
                    <label class="block mb-2 font-medium text-white font-main">Correo electrónico</label>
                    <input class="secondary-color border border-gray-300 text-sm rounded-lg block w-80 p-2.5 text-white" type="text" name="email" value="{{ old('email', $supplier->email) }}" placeholder="Correo electrónico del proveedor">
                </div>

                <div class="grid grid-cols-1 mb-2">
                    <label class="block mb-2 font-medium text-white font-main">Notas Adicionales</label>
                    <textarea class="secondary-color border border-gray-300 text-sm rounded-lg block w-80 p-2.5 text-white" name="note" cols="30" rows="3" placeholder="Notas adicionales del proveedor">{{ old('note', $supplier->note) }}</textarea>
                </div>

            </div>

        </div>

        <div class="flex justify-end xxs:justify-center xxs:ml-16 pr-20 mt-5">
        <button type="submit" class="font-main text-white w-full lg:w-[9%] md:[12%] sm:w-[16%] max-w-[300px] secondary-color hover:bg-green-500 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg px-5 py-2.5 md:pr-4 md:-pl-4 text-center lg:mr-60 md:mr-0 sm:mr-1 mb-10">Actualizar</button>

        </div>
    </form>
</div>

@endsection
