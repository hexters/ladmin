@props(['autocomplete' => false])

<input 
    type="search" 
    id="{{ $id }}" 
    name="{{ $name ?? null }}" 
    value="{{ $value ?? null }}" 
    class="form-control @error($name) is-invalid @enderror" 
    placeholder="{{ $placeholder ?? null }}" 
    {{ $required ? 'required' : null }} 
    {{ $readonly ? 'readonly' : null }} 
    {{ $disabled ? 'disabled' : null }}
    {{ $autocomplete ? 'autocomplete="' . $autocomplete .  '"' : null }}
/>
@error($name)
    <small class="text-danger">{{ $message }}</small>
@enderror