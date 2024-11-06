@extends('suppliers.layout')

@section('content')
<div class="container lg:mt-0 mt-12">
        <!-- Logo de la Empresa -->
        <img class="w-56 xxs:mx-2 m-12 lg:block hidden" src="https://i.ibb.co/KX69vv5/Pacific-Enterprise.png" alt="Pacific-Enterprise" border="0">

    <!-- Header Section -->
    <div class="flex justify-center items-center mb-10 lg:mr-0 sm:-mr-16">
        <div class="header grid grid-cols-2 xxs:grid-cols-1 lg:gap-32 sm:gap-10 xxs:gap-4 xxs:mt-4">
            <h1 class="text-2xl font-bold text-white font-main lg:ml-0 sm:ml-7 xxs:text-lg xxs:text-center ml-10">Añade información a la página</h1>
            <a class="btn-back font-main text-white w-[50%] secondary-color hover:bg-cyan-500 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg px-5 py-2.5 text-center xxs:mt-4 xxs:justify-self-center" href="{{ route('information.index') }}">Atrás</a>
        </div>
    </div>

    @if ($errors->any())
        <div class="mb-4 ml-20">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li class="bg-red-300 text-red-800 border border-red-600 rounded-lg p-2 mb-2 lg:w-[70%] w-[20%]">
                        {{ $error }}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Form Section -->
    <form action="{{ route('information.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-container pl-20 grid grid-cols-[50%,50%] md:ml-0 sm:-ml-6 xxs:grid-cols-1 xxs:-ml-20 xxs:justify-items-center">
            
            <!-- Left Column Inputs -->
            <div class="form-column">
                @include('information.partials.input', ['label' => 'Nombre', 'name' => 'name', 'type' => 'text', 'placeholder' => 'Nombre'])
                @include('information.partials.input', ['label' => 'Correo electrónico', 'name' => 'email', 'type' => 'text', 'placeholder' => 'Correo electrónico'])
                @include('information.partials.input', [
                    'label' => 'Número',
                    'name' => 'number',
                    'type' => 'text',
                    'placeholder' => 'Número de teléfono',
                    'minlength' => 8,
                    'maxlength' => 8
                ])
            </div>

            <!-- Right Column Inputs -->
            <div class="form-column">
                @include('information.partials.input', ['label' => 'Dirección', 'name' => 'address', 'type' => 'text', 'placeholder' => 'Dirección'])
                
            <!-- Notas Field -->
            <div class="input-group mb-2">
                <label for="note" class="label block mb-2 font-medium text-white font-main">Notas</label>
                <textarea id="note" class="input-area secondary-color border border-gray-300 text-sm rounded-lg block w-80 p-2.5 text-white" name="note" cols="30" rows="3" placeholder="Notas adicionales"></textarea>
            </div>

            </div>
        </div>

        <!-- Submit Button -->
        <div class="flex justify-end xxs:justify-center xxs:ml-16 pr-20 mt-5">
            <button type="submit" class="btn-save font-main text-white w-full lg:w-[9%] md:w-[12%] sm:w-[16%] max-w-[300px] secondary-color hover:bg-green-500 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg px-5 py-2.5 md:pr-4 md:pl-4 text-center lg:mr-60 md:mr-0 sm:mr-1 mb-10">Guardar</button>
        </div>
    </form>
</div>
@endsection
