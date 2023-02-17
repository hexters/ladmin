<div>
    <em>Result Found {{ $data['total'] }}</em>
</div>
<ul>
    @forelse ($data['results'] as $group => $items)
        <li>
            <h3 class="mt-3 text-primary">#{{ $group }}</h3>
            <ul>
                @foreach ($items as $item)
                    <li class="border-top">{{ $item->searchable->view($item) }}</li>
                @endforeach
            </ul>
        </li>
    @empty
        <li class="p-3 mt-3 bg-light">
            We didn't find any result for '{{ request()->get('search') }}'. Sorry!
        </li>
    @endforelse
</ul>
