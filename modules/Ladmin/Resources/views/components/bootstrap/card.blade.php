<div {{ $attributes->merge(['class' => 'card shadow-sm border-0 ' . $class]) }}>

    @if (isset($header))
        <div class="card-header bg-white">
            {{ $header ?? null }}
        </div>
    @endif

    @if (isset($flat))
        {{ $flat ?? null }}
    @endif

    @if (isset($body))
        <div class="card-body">
            {{ $body ?? null }}
        </div>
    @endif

    @if (isset($footer))
        <div class="card-footer bg-white">
            {{ $footer ?? null }}
        </div>
    @endif

</div>
