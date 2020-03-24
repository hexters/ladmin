@if(config('ladmin.notification', true))
  <li class="nav-item dropdown">
                
    <a id="navbarDropdown" class="nav-link dropdown-toggle pl-0 ladmin-notification-menu" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
        <i class="fa fa-bell"></i>
        @if($badge > 0)
          <span class="badge badge-danger">{{ $badge > 9 ? '+9' : $badge }}</span>
        @endif
    </a>

    <ul class="dropdown-menu dropdown-menu-right ladmin-top-menu ladmin-notification-menu-component" aria-labelledby="navbarDropdown">
        <li class="ladmin-top-menu-header text-center">
          <strong>Notifications</strong>
        </li>
        <li class="ladmin-top-menu-body-notification">
          
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
                  <i class="fa fa-bell fa-lg"></i>
                  <strong class="text-muted">No Notification</strong>
                </div>
            @endforelse
          </div>

        </li>
        <li class="ladmin-top-menu-footer">
          <a href="{{ route('administrator.notification.index') }}">
            View All
          </a>
        </li>
    </ul>
  </li>
@endif