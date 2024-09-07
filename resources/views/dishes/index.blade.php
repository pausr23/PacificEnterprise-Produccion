@extends('dishes.layout')
 
@section('content')

<div class="grid grid-cols-[20%,80%] pl-12">

    <div class="mr-8">
        <img src="https://i.ibb.co/KX69vv5/Pacific-Enterprise.png" alt="Pacific-Enterprise" border="0">

        <div class="grid pl-12 pt-12 text-white font-light text-sm font-main ">
            <a class="pb-8 hover:bg-gray-600 focus:bg-[#323035] active:bg-[#323035] block" href="">Panel Principal</a>
            <a class="pb-8 hover:bg-gray-600 focus:bg-[#323035] active:bg-[#323035] block" href="">Punto de Venta</a>
            <a class="pb-8 hover:bg-gray-600 focus:bg-[#323035] active:bg-[#323035] block" href="">Historial</a>
            <a class="pb-8 hover:bg-gray-600 focus:bg-[#323035] active:bg-[#323035] block" href="">Admin</a>
            <a class="pb-8 hover:bg-gray-600 focus:bg-[#323035] active:bg-[#323035] block" href="">Inventario</a>
        </div>
        
    </div>

    <div>
        <div class="grid grid-cols-[20%,20%,20%,20%]">
            <div class="grid">
                <label class="text-white font-main pb-2 font-bold" for="dish">Nombre:</label>
                <input class="secondary-color rounded text-xs font-light h-8 text-center w-40 text-white" id= "dish" type="text" name="activity" placeholder="Nombre de platillo">
            </div>

            <div class="grid">
                <label class="text-white font-main pb-2 font-bold" for="category">Categoria:</label>
                <select class="secondary-color rounded h-8 text-center w-40 text-white" id="category" name="category" >

                </select>
            </div>
            <div class="content-end">
                <a class="font-bold flex items-center justify-center font-main text-black bg-white h-10 w-28 rounded-xl text-center" for="search">Buscar</a>
            </div>
                
            <div class="content-end">
                <a class="font-bold flex items-center justify-center h-12 w-48 secondary-color text-white font-medium rounded-xl text-center" href="">Agregar un Platillo</a>
            </div>
        </div>

        <div class="w-[90%] grid gap-16">
            <div class="py-10 rounded-lg">
                <table class="w-full rounded-lg">
                    <thead class="rounded-lg text-white font-main font-bold secondary-color">
                        <tr>
                            <th scope="col" class="rounded-l-lg px-12 py-3">Nombre</th>
                            <th scope="col" class="px-12 py-3">Categoria</th>
                            <th scope="col" class="px-12 py-3">Subcategoria</th>
                            <th scope="col" class="rounded-r-lg px-32 py-3" width="280px">Accion</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                
                        <tr class="border-b text-white text-center border-neutral-200 dark:border-white/10">
                            <td>Coca</td>
                            <td>Bebida</td>
                            <td>Refresco</td>
                            <td class="py-6">
                                <form action="" method="POST">
                                    <a class="bg-cyan-200 rounded-lg text-black font-semibold px-4 py-2 me-2" href="">Show</a>
                                    <a class="bg-lime-200 rounded-lg text-black font-semibold px-4 py-2 me-2" href="">Edit</a>
                                    @csrf
                                    @method('DELETE')
                                    <button class="bg-rose-300 rounded-lg text-black font-semibold px-4 py-2 me-2" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
            
                    </tbody>
                
                </table>
            </div>

            </div>
        </div>
</div>
       
@endsection