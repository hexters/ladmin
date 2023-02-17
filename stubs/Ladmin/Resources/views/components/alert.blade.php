@foreach ($types as $type)
    @if (session()->get($type))
        <div {{ $attributes->merge(['class' => 'alert mb-0 alert-' . $type . ' rounded-0 alert-dismissible fade show ' . $class]) }}>
            @if (is_array(session()->get($type)))
                <ul class="m-0">
                    @foreach (session()->get($type) as $message)
                        <li>{!! $message !!}</li>
                    @endforeach
                </ul>
                <x-ladmin-button type="button" class="btn-close" color="white" data-bs-dismiss="alert" aria-label="Close"></x-ladmin-button>
            @else
                <ul class="m-0">
                    <li>{!! session()->get($type) !!}</li>
                </ul>
                <x-ladmin-button type="button" class="btn-close" color="white" data-bs-dismiss="alert" aria-label="Close"></x-ladmin-button>
            @endif
        </div>
    @endif
@endforeach
