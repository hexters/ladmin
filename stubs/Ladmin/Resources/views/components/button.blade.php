@props(['color' => 'primary', 'size' => 'md'])
<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn btn-' . $color . ' btn-' . $size]) }}>
    {{ $slot }}
</button>
