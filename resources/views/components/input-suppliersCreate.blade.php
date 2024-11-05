<div class="grid mb-4">
    <label class="block mb-2 font-medium text-white font-main">{{ $label }}</label>
    <input 
        class="secondary-color border border-gray-300 text-sm rounded-lg block w-80 p-2.5 text-white" 
        type="{{ $type ?? 'text' }}" 
        name="{{ $name }}" 
        value="{{ old($name) }}" 
        placeholder="{{ $placeholder }}">
</div>
