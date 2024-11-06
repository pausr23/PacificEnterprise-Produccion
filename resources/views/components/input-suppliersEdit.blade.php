<div class="grid mb-5">
    <label class="block mb-2 font-medium text-white font-main">{{ $label }}</label>
    <input 
        class="secondary-color border border-gray-300 text-sm rounded-lg block w-80 p-2.5 text-white" 
        type="{{ $type ?? 'text' }}" 
        name="{{ $name }}" 
        value="{{ old($name, $value) }}" 
        placeholder="{{ $placeholder }}"
        @if(isset($minlength)) minlength="{{ $minlength }}" @endif
        @if(isset($maxlength)) maxlength="{{ $maxlength }}" @endif
        @if(isset($type) && $type == 'email') 
            pattern="[A-Za-z0-9.]+@[A-Za-z0-9.]+\.[A-Za-z]{2,}$" 
            title="Por favor ingrese un correo válido (solo se permiten letras, números y puntos)" 
        @endif
        required>

    @error($name)
        <p class="bg-red-300 text-red-800 border border-red-600 rounded-lg p-2 mb-2 w-[20%]">{{ $message }}</p>
    @enderror
</div>
