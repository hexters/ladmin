@extends('ladmin::layouts.app')
@section('title', 'Notification')
@section('content')
    
  <x-ladmin-card>
    <div class="list-unstyled ladmin-notification-item">
      @forelse ($notifications as $item)
        <a href="javascript:void(0);" data-link="{{ $item->link }}" data-id="{{ $item->id }}" class="media my-4 ladmin-notification-link">
          @if(!is_null($item->image_link))
            <img src="{{ $item->image_link }}" class="mr-3">
          @endif
          <div class="media-body ladmin-substr">
            <small class="text-muted float-right">{{ $item->created_at->diffForHumans() }}</small>
            <strong class="mt-0 mb-1">{{ $item->title }}</strong>
            <p class="m-0">{!! $item->description !!}</p>
          </div>
        </a>
      @empty
          <div class="pt-5 text-center">
            <i class="fa fa-bell fa-lg text-muted"></i>
            <p class="text-muted">No Notification</p>
          </div>
      @endforelse
    </div>
  </x-ladmin-card>

@endsection