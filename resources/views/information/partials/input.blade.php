
<div class="grid mb-2">
    <label for="input-field" class="block mb-2 font-medium text-white font-main">{{ $label }}</label>
    <input
        class="secondary-color border border-gray-300 text-sm rounded-lg block w-80 p-2.5 text-white"
        type="{{ $type }}"
        name="{{ $name }}"
        value="{{ old($name, $value ?? '') }}"
        placeholder="{{ $placeholder }}"
        @if(isset($minlength)) minlength="{{ $minlength }}" @endif
        @if(isset($maxlength)) maxlength="{{ $maxlength }}" @endif
        required>
</div>

