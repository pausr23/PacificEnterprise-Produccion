<div class="grid mb-5">
    <label class="block mb-2 font-medium text-white font-main">{{ $label }}</label>
    <textarea 
        class="secondary-color border border-gray-300 text-sm rounded-lg block w-80 p-2.5 text-white" 
        name="{{ $name }}" 
        cols="30" 
        rows="3" 
        placeholder="{{ $placeholder }}">{{ old($name, $value) }}</textarea>
</div>
