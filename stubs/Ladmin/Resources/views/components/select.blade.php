@props(['required' => false, 'multiple' => false, 'disabled' => false])

<select {{ $required ? 'required' : null }} {{ $multiple ? 'multiple' : null }}
    {{ $disabled ? 'disabled' : null }} {{ $attributes->merge(['class' => 'form-control', 'name' => '']) }}>
    @forelse ($options as $val => $name)
        <option
            {{ $multiple && is_array($value)? (in_array($val, $value)? 'selected': ($val == $value? 'selected': null)): null }}
            value="{{ $val }}">{{ $name }}</option>
    @empty
        <option value="">{{ $empty }}</option>
    @endforelse
</select>
