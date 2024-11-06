<div class="grid mb-4">
    <label for="{{ $name }}" class="block mb-2 font-medium text-white font-main">{{ $label }}</label>
    <textarea
        id="{{ $name }}"
        class="secondary-color border border-gray-300 text-sm rounded-lg block w-80 p-2.5 text-white"
        name="{{ $name }}"
        cols="30"
        rows="3"
        placeholder="{{ $placeholder }}">{{ old($name) }}</textarea>
</div>

