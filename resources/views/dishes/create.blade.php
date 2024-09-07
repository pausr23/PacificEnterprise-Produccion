@extends('dishes.layout')
 
@section('content')

    
    <div class="">
        <img class="w-72 m-10" src="https://i.ibb.co/KX69vv5/Pacific-Enterprise.png" alt="Pacific-Enterprise" border="0">
        <div class="grid grid-cols-2 mt-8 mb-12 ml-10">
            <h1 class="text-2xl font-bold text-white">Añade un nuevo platillo</h1>
            <a class="text-white w-[20%] bg-gray-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg px-5 py-2.5 text-center" href=""> Atrás</a>
        </div>
        <div class="pl-20 grid grid-cols-[50%,50%]">

            <div class="grid">
                <!--Name-->
                <div class="grid ">
                    <label class="block mb-2 font-medium text-white">Title</label>
                    <input class="bg-gray-10 border border-gray-300 text-gray-900 text-sm rounded-lg block w-80 p-2.5" type="text" name="title" id="">
                </div>

               
            
            </div>

        </div>

    </div>

@endsection