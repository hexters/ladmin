<a class="py-3 text-decoration-none text-dark" target="{{ $item->target }}" href="{{ $item->link_details ?? 'javascript:void(0);' }}">
    <strong>{{ $item->title }}</strong>
    <div class="text-muted">{{ Str::of($item->description)->limit(100) }}</div>
</a>
