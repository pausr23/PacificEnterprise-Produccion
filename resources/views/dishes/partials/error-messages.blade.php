@if ($errors->any())
    <div class="bg-red-300 text-red-800 border border-red-600 rounded-lg p-2 mb-2 lg:w-[70%] w-[20%]" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
