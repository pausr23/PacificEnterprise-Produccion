@extends('dishes.layout')

@section('content')

    <div class="grid grid-cols-[20%,60%] gap-16">
        <img class="w-80 ml-10 mb-10" src="https://i.ibb.co/KX69vv5/Pacific-Enterprise.png" alt="Pacific-Enterprise" border="0">
        <div class="content-end mb-14">
            <a class="ml-10 font-bold flex items-center justify-center py-2 w-24 secondary-color text-white rounded-xl text-center hover:bg-gray-500 focus:ring-4 focus:outline-none focus:ring-gray-100" href="{{ route('admin.profile') }}">Atrás
            </a>
        </div>
    </div>
    
    <div>
        <div class="grid grid-cols-2">
        <form class="grid grid-cols-3 ml-32" method="GET" action="{{ route('admin.users') }}" class="grid grid-cols-[20%,20%,20%]">
            <div class="grid">
                <label class="text-white font-main pb-2 font-bold" for="dish">Nombre:</label>
                <input class="secondary-color rounded text-xs font-light h-8 text-center w-40 text-white" id="dish" type="text" name="dish" placeholder="Nombre del empleado">
            </div>

            <div class="grid">
                <label class="text-white font-main pb-2 font-bold" for="category">Puesto:</label>
                <select class="secondary-color rounded h-8 text-center w-40 text-white" id="category" name="category">
                    <option value="0">Todo</option>
                    @foreach ($titles as $title)
                        <option value="{{ $title->id }}">{{ $title->title }}</option>
                    @endforeach
                </select>
            </div>

            <div class="grid content-end">
                <button type="submit" class="font-bold flex items-center justify-center font-main text-black bg-white h-10 w-28 rounded-xl text-center hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100">Buscar</button>
            </div>
        </form>

            <div class="grid content-end">
                <a class="font-bold flex items-center justify-center py-3 w-60 secondary-color text-white rounded-xl text-center hover:bg-gray-500 focus:ring-4 focus:outline-none focus:ring-gray-100" href="{{ route('admin.create') }}">
                    Agregar un Nuevo Usuario
                </a>
            </div>
        </div>

        <div class="w-[70%] mx-auto grid gap-16">
            <div class="py-10 rounded-lg">
                <table class="w-full rounded-lg">
                    <thead class="rounded-lg text-white font-main font-bold secondary-color">
                        <tr>
                            <th scope="col" class="rounded-l-lg px-12 py-3">Nombre</th>
                            <th scope="col" class="px-12 py-3">Title</th>
                            <th scope="col" class="rounded-r-lg px-32 py-3">Detalles</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        @foreach ($users as $user)
                        <tr class="border-b text-white text-center border-neutral-200 dark:border-white/10">
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->title }}</td>
                            <td class="py-6">
                                <a class="bg-cyan-200 rounded-lg text-black font-semibold px-4 py-2 me-2 hover:bg-cyan-500 focus:ring-4 focus:outline-none focus:ring-cyan-200" href="{{ route('admin.show', ['id' => $user->id]) }}">Ver más</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection