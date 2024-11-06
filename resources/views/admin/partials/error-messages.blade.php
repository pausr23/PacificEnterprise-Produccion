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

