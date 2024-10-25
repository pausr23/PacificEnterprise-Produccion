@extends('dishes.layout')

@section('content')

    <div class="grid grid-cols-[20%,60%] gap-16">
        <img class="w-80 ml-10 mb-10" src="https://i.ibb.co/KX69vv5/Pacific-Enterprise.png" alt="Pacific-Enterprise" border="0">
        <div class="content-end mb-14">
            <a class="ml-10 font-bold flex items-center justify-center py-2 w-24 secondary-color text-white rounded-xl text-center hover:bg-gray-500 focus:ring-4 focus:outline-none focus:ring-gray-100" href="{{ route('admin.profile') }}">Atrás
            </a>
        </div>
    </div>

    @if(session('warning'))
        <div class="bg-yellow-200 text-black font-semibold p-4 rounded-lg mb-6 w-[50%] mx-auto text-center">
            {{ session('warning') }}
        </div>
    @endif

    <div>
        <div class="grid grid-cols-2">
            <div class="grid content-end">
                <a class="mx-auto font-bold flex items-center justify-center py-3 w-60 secondary-color text-white rounded-xl text-center hover:bg-gray-500 focus:ring-4 focus:outline-none focus:ring-gray-100" href="{{ route('information.create') }}">
                    Agregar Información
                </a>
            </div>
        </div>

        <div class="w-[70%] mx-auto grid gap-16">
            <div class="py-10 rounded-lg">
                <table class="w-full rounded-lg">
                    <thead class="rounded-lg text-white font-main font-bold secondary-color">
                        <tr>
                            <th scope="col" class="rounded-l-lg px-12 py-3">Nombre</th>
                            <th scope="col" class="px-12 py-3">Correo</th>
                            <th scope="col" class="px-12 py-3">Número</th>
                            <th scope="col" class="px-12 py-3">Dirección</th>
                            <th scope="col" class="px-12 py-3">Nota</th>
                            <th scope="col" class="rounded-r-lg px-12 py-3">Detalles</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($information as $info)
                        <tr class="border-b text-white text-center border-neutral-200 dark:border-white/10">
                            <td>{{ $info->name }}</td>
                            <td>{{ $info->email }}</td>
                            <td>{{ $info->number }}</td>
                            <td>{{ $info->address }}</td>
                            <td>{{ $info->note }}</td>
                            <td class="py-6">
                                <a class="bg-cyan-200 rounded-lg text-black font-semibold px-4 py-2 me-2 hover:bg-cyan-500 focus:ring-4 focus:outline-none focus:ring-cyan-200" href="{{ route('information.show', $info->id) }}">Ver más</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
