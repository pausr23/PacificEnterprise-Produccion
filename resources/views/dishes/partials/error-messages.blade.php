@if ($errors->any())
    <div class="bg-gray-200 border-l-4 border-red-500 text-red-700 p-4 mb-4 m-5" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
