@extends('admin.layout')

@section('content')

    <div class="grid grid-cols-2 h-screen place-items-center">

            <img class="mx-auto w-[65%] py-60" src="https://i.ibb.co/KX69vv5/Pacific-Enterprise.png" alt="Pacific-Enterprise" border="0">

            <div class="grid place-items-center secondary-color w-full h-full">
                <div class="grid">
                    <h1 class="text-white text-center font-main font-bold text-4xl tracking-[.22em] mb-16">Log in</h1>

                    <form class="grid" action="{{ route('admin.login.submit') }}" method="POST">
                        @csrf 
                        <input class="w-72 text-xl text-[#CDA0CB] mb-10 bg-transparent border-b-2 border-[#CDA0CB] placeholder:text-[#bc96ba] focus:outline-none" placeholder="Username" type="text" name="username" required>
                        <input class="text-xl text-[#CDA0CB] mb-12 bg-transparent border-b-2 border-[#CDA0CB] placeholder:text-[#bc96ba] focus:outline-none" placeholder="Password" type="password" name="password" required>
    
                        <button type="submit" class="text-center hover:bg-[#bc96ba] active:bg-[#b080a8] bg-[#CDA0CB] w-[60%] justify-self-center text-lg font-main font-semibold py-2 px-4 rounded-2xl">Log in</button>
                    </form>

                    @if ($errors->has('login_error'))
                        <div class="text-red-500 mt-4 text-center">{{ $errors->first('login_error') }}</div>
                    @endif

                    <a class="text-white text-center mt-5 text-sm" href="">Forgot password?</a>
                </div>
            </div>
    
    </div>



@endsection