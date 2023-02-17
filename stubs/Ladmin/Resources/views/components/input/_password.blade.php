<input
    type="password" 
    id="{{ $id }}" 
    name="{{ $name ?? null }}"
    class="form-control @error($name) is-invalid @enderror" 
    placeholder="{{ $placeholder ?? null }}" 
    {{ $required ? 'required' : null }} 
    {{ $readonly ? 'readonly' : null }} 
    {{ $disabled ? 'disabled' : null }}
/>
@error($name)
    <small class="text-danger">{{ $message }}</small>
@enderror