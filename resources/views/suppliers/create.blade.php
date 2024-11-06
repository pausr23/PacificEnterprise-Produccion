@extends('suppliers.layout')

@section('content')
<div class="container lg:mt-0 mt-12">
        <!-- Logo de la Empresa -->
        <img class="w-56 xxs:mx-2 m-12 lg:block hidden" src="https://i.ibb.co/KX69vv5/Pacific-Enterprise.png" alt="Pacific-Enterprise" border="0">
    
    <div class="flex justify-center items-center mb-10">
        <div class="grid grid-cols-2 xxs:grid-cols-1 gap-96 xxs:gap-4 xxs:mt-4">
            <h1 class="text-2xl xxs:text-lg font-bold text-white font-main xxs:align-center">
                Añade un nuevo proveedor
            </h1>
            <a class="font-main text-white lg:w-[30%] md:w-[50%] secondary-color hover:bg-cyan-500 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg px-5 py-2.5 xxs:mt-4 text-center"
               href="{{ route('suppliers.index') }}">Atrás</a>
        </div>
    </div>

    @if ($errors->any())
    <div class="bg-red-300 text-red-800 border border-red-600 rounded-lg p-2 mb-2 v w-[20%]" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('suppliers.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="pl-20 grid grid-cols-[50%,50%] xxs:grid-cols-1 xxs:justify-items-center xxs:pl-4 xxs:ml-[-4%]">
            
        {{-- Primera Columna --}}
        <div class="grid">
            @include('components.input-suppliersCreate', [
                'label' => 'Nombre',
                'name' => 'name',
                'placeholder' => 'Nombre del proveedor'
            ])

            @include('components.input-suppliersCreate', [
                'label' => 'Número de teléfono',
                'name' => 'phone_number',
                'placeholder' => 'Número de teléfono del proveedor',
                'minlength' => 8,
                'maxlength' => 8
            ])
        </div>


            {{-- Segunda Columna --}}
            <div>
            @include('components.input-suppliersCreate', [
                'label' => 'Correo electrónico',
                'name' => 'email',
                'placeholder' => 'Correo electrónico del proveedor',
                'type' => 'email'
            ])

                @include('components.textarea-suppliersCreate', [
                    'label' => 'Notas Adicionales',
                    'name' => 'note',
                    'placeholder' => 'Notas adicionales del proveedor'
                ])
            </div>

        </div>

        <div class="flex lg:justify-end xxs:justify-center mt-5 pr-20 xxs:px-3 xxs:ml-1">
            <button type="submit" class="font-main text-white w-full lg:w-[9%] md:w-full sm:w-full max-w-[300px] secondary-color hover:bg-green-500 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg px-5 py-2.5 md:pr-4 md:-pl-4 text-center lg:mr-60 md:mr-0 sm:mr-1 mb-10">
                Guardar
            </button>
        </div>
    </form>
</div>
@endsection
