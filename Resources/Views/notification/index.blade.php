<x-ladmin-layout>
  <x-slot name="title">List of Notifications</x-slot>
  
  <div class="mb-3 text-right">
    <form action="{{ route('administrator.notification.store') }}" method="POST">
      @csrf 
      <button class="btn btn-link">Mark all as read ?</button>
    </form>
  </div>

  <div class="mb-3">
    <div class="tracking-list">
      
      <div class="tracking-item">
        <div class="tracking-icon">
          <i class="fas fa-search"></i>
        </div>
        <div class="tracking-content">

          <form action="">
            <div class="input-group mb-1">
              <input type="search" placeholder="Search Notification..." value="{{ request()->get('src') }}" name="src" id="src" class="form-control border-0">
              <div class="input-group-append border-0">
                <button class="btn btn-white bg-white" type="button" id="button-addon2">Search</button>
              </div>
            </div>
            
            <small class="text-muted">* Press enter to search</small>
            @foreach (request()->except(['src']) as $field => $value)
                <input type="hidden" name="{{ $field }}" value="{{ $value }}">
            @endforeach
          </form>

        </div>
      </div>

      @forelse ($notifications as $item)
      <div class="tracking-item {{ is_null($item->read_at) ? 'font-weight-bold' : '' }}">
        <div class="tracking-icon">
          <i class="fas fa-bell"></i>
        </div>
        <div class="tracking-content">
          <a href="{{ route('administrator.notification.show', [$item->id]) }}" class="text-decoration-none">
            <x-ladmin-card class="mb-0">
              <div class="media">
                @if(!is_null($item->data['image_link']))
                  <img src="{{ $item->data['image_link'] }}" class="mr-3" width="50">
                @endif
                <div class="media-body ladmin-substr">
                  <small class="text-muted {{ is_null($item->read_at) ? 'font-weight-bold' : '' }} float-right">{{ $item->created_at->diffForHumans() }}</small>
                  <strong class="mt-0 mb-1 {{ is_null($item->read_at) ? 'text-primary' : 'text-dark' }}">{{ $item->data['title'] }}</strong>
                  <p class="m-0 text-muted">{!! $item->data['description'] !!}</p>
                </div>
              </div>
            </x-ladmin-card>
          </a>
        </div>
      </div>
      @empty
          <div class="pt-5 text-center">
            <div class="mb-3">
              {!! ladmin()->icon('bell') !!}
            </div>
            <p class="text-muted">Notification not found</p>
          </div>
      @endforelse
    </div>
  </div>

  <div class="text-right ladmin-pagination p-3">
    <span class="mr-3 d-none d-sm-inline"> Page {{ $notifications->currentPage() }} / {{ $notifications->lastPage() }} &minus; Total {{ number_format($notifications->total(), 0) }} data</span>
    {{ $notifications->appends( request()->except(['page']) )->links() }}
  </div>
  
</x-ladmin-layout>