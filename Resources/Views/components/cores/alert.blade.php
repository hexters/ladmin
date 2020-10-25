@if ($errors->any())
  <div class="alert alert-danger">
    <button type="button" class="ml-2 mb-1 close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
  </div>
@endif

@foreach ($status as $state)
    @if(session()->has($state))
      <div class="alert alert-{{ $state }}">
        <button type="button" class="ml-2 mb-1 close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <ul>
          @foreach (session()->get($state) as $item)
            <li>{!! $item !!}</li>
          @endforeach
        </ul>
      </div>
    @endif
@endforeach
