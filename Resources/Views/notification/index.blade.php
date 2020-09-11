@extends('ladmin::layouts.app')
@section('title', 'List of Notification')
@section('content')
    
<div>
  <div class="tracking-list">
    @forelse ($notifications as $item)
    <div class="tracking-item">
      <div class="tracking-icon">
        <i class="fas fa-bell"></i>
      </div>
      <div class="tracking-content">
        <a href="javascript:void(0);" data-link="{{ $item->link }}" data-id="{{ $item->id }}" class="ladmin-notification-link">
          <x-ladmin-card class="mb-0">
            @if(!is_null($item->image_link))
              <img src="{{ $item->image_link }}" class="mr-3" width="50">
            @endif
            <div class="media-body ladmin-substr">
              <small class="text-muted float-right">{{ $item->created_at->diffForHumans() }}</small>
              <strong class="mt-0 mb-1 text-dark">{{ $item->title }}</strong>
              <p class="m-0 text-muted">{!! $item->description !!}</p>
            </div>
          </x-ladmin-card>
        </a>
      </div>
    </div>
    @empty
        <div class="pt-5 text-center">
          <i class="fa fa-bell fa-lg text-muted"></i>
          <p class="text-muted">No Notification</p>
        </div>
    @endforelse
  </div>
</div>

<div class="mt-3 text-right">
  {{ $notifications->links() }}
</div>

@endsection