@extends('admin.layout')

@section('content')

    <!-- Main Container: Centered Grid Layout -->
    <div class="grid grid-cols-2 h-screen place-items-center">
        
        <!-- Left Image Section -->
        <img class="mx-auto w-[65%] py-60" src="https://i.ibb.co/KX69vv5/Pacific-Enterprise.png" alt="Pacific-Enterprise" />

        <!-- Right Login Section -->
        <div class="grid place-items-center secondary-color w-full h-full">

            <div>
            <!-- Login Header -->
            <h1 class="text-white text-center font-main font-bold text-4xl xxs:text-2xl tracking-[.22em] mb-16">
                Log in
            </h1>

            <!-- Login Form -->
            <form class="grid" action="{{ route('admin.login.submit') }}" method="POST">
                @csrf
                
                <!-- Username Input -->
                <input 
                    class="w-72 xxs:w-32 xxs:text-sm xxs:ml-1 text-xl text-[#CDA0CB] mb-10 bg-transparent border-b-2 border-[#CDA0CB] placeholder:text-[#bc96ba] focus:outline-none"
                    placeholder="Username" 
                    type="text" 
                    name="username" 
                    required
                >

                <!-- Password Input -->
                <input 
                    class="text-xl xxs:w-32 xxs:text-sm xxs:ml-1 text-[#CDA0CB] mb-12 bg-transparent border-b-2 border-[#CDA0CB] placeholder:text-[#bc96ba] focus:outline-none"
                    placeholder="Password" 
                    type="password" 
                    name="password" 
                    required
                >

                <!-- Submit Button -->
                <button 
                    type="submit" 
                    class="text-center hover:bg-[#bc96ba] active:bg-[#b080a8] bg-[#CDA0CB] w-[60%] justify-self-center text-lg xxs:text-sm font-main font-semibold py-2 px-4 rounded-2xl"
                >
                    Log in
                </button>
            </form>

            <!-- Error Message -->
            @if ($errors->has('login_error'))
                <div class="text-red-500 mt-4 text-center">
                    {{ $errors->first('login_error') }}
                </div>
            @endif
            </div>

        </div>

    </div>

@endsection
