@extends('ladmin::layouts.app')
@section('title', 'List of Notifications')
@section('content')
    
<div class="mb-3">
  <div class="tracking-list">
    @forelse ($notifications as $item)
    @if(auht()->guard(config('ladmin.auth.guard', 'web'))->user()->can($item->gates))
      <div class="tracking-item {{ is_null($item->read_at) ? 'font-weight-bold' : '' }}">
        <div class="tracking-icon">
          <i class="fas fa-bell"></i>
        </div>
        <div class="tracking-content">
          <a href="javascript:void(0);" data-link="{{ $item->link }}" data-id="{{ $item->id }}" class="ladmin-notification-link">
            <x-ladmin-card class="mb-0">
              <div class="media">
                @if(!is_null($item->image_link))
                  <img src="{{ $item->image_link }}" class="mr-3" width="50">
                @endif
                <div class="media-body ladmin-substr">
                  <small class="text-muted {{ is_null($item->read_at) ? 'font-weight-bold' : '' }} float-right">{{ $item->created_at->diffForHumans() }}</small>
                  <strong class="mt-0 mb-1 text-dark">{{ $item->title }}</strong>
                  <p class="m-0 text-muted">{!! $item->description !!}</p>
                </div>
              </div>
            </x-ladmin-card>
          </a>
        </div>
      </div>
    @endif
    @empty
        <div class="pt-5 text-center">
          <i class="fa fa-bell fa-lg text-muted"></i>
          <p class="text-muted">No Notification</p>
        </div>
    @endforelse
  </div>
</div>
  
@endsection