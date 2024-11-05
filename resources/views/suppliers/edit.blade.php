@extends('suppliers.layout')

@section('content')
<div>
    <img class="w-56 m-12 xxs:hidden" src="https://i.ibb.co/KX69vv5/Pacific-Enterprise.png" alt="Pacific-Enterprise" border="0">
    <div class="flex justify-center items-center mb-10">
        <div class="grid grid-cols-2 xxs:grid-cols-1 xxs:gap-1 gap-96 xxs:mt-4">
            <h1 class="text-2xl xxs:text-lg font-bold text-white font-main xxs:align-center">
                Edita la información del proveedor
            </h1>
            <a class="font-main text-white lg:w-[30%] md:w-[50%] lg:h-auto md:h-auto secondary-color hover:bg-cyan-500 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg px-5 py-2.5 xxs:mt-4 text-center" 
               href="{{ route('suppliers.index') }}">Atrás</a>
        </div>
    </div>

    <form action="{{ route('suppliers.update', $supplier->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="pl-20 grid grid-cols-[50%,50%] xxs:grid-cols-1 xxs:justify-items-center xxs:pl-4 xxs:ml-[-4%]">
            
            {{-- First Column --}}
            <div class="grid">
                @include('components.input-suppliersEdit', [
                    'label' => 'Nombre',
                    'name' => 'name',
                    'value' => $supplier->name,
                    'placeholder' => 'Nombre del proveedor'
                ])

                @include('components.input-suppliersEdit', [
                    'label' => 'Número de teléfono',
                    'name' => 'phone_number',
                    'value' => $supplier->phone_number,
                    'placeholder' => 'Número de teléfono del proveedor'
                ])
            </div>

            {{-- Second Column --}}
            <div>
                @include('components.input-suppliersEdit', [
                    'label' => 'Correo electrónico',
                    'name' => 'email',
                    'value' => $supplier->email,
                    'placeholder' => 'Correo electrónico del proveedor'
                ])

                @include('components.textarea-suppliersEdit', [
                    'label' => 'Notas Adicionales',
                    'name' => 'note',
                    'value' => $supplier->note,
                    'placeholder' => 'Notas adicionales del proveedor'
                ])
            </div>

        </div>

        <div class="flex lg:justify-end xxs:justify-center mt-5 pr-20 xxs:px-3 xxs:ml-1">
            <button type="submit" class="font-main text-white w-full lg:w-[9%] md:w-full sm:w-full max-w-[300px] secondary-color hover:bg-green-500 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg px-5 py-2.5 md:pr-4 md:-pl-4 text-center lg:mr-60 md:mr-0 sm:mr-1 mb-10">
                Actualizar
            </button>
        </div>
    </form>
</div>
@endsection
