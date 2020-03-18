<ol class="breadcrumb">
  @foreach ($items as $item)
    <li class="breadcrumb-item {{ $loop->last() ? 'active' : null }}">
      <a href="{{ $item->url }}">{{ $item->name }}</a>
    </li>
  @endforeach
</ol>