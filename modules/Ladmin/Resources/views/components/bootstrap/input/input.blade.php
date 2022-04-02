<div {{ $attributes->merge(['class' => 'row ' . $class]) }}>
    @if ($label)
        <div class="{{ $row[0] ?? null }}">
            <label for="{{ $id }}">
                @foreach ($label as $text)
                    {!! $text !!}
                @endforeach
            </label>
        </div>
    @endif
    <div class="{{ $row[1] ?? null }}">
        @include(ladmin()->component_path('input._' . $type))
    </div>
</div>
