<div class="dropdown">
    <a href="" class="me-3 notification-bell" data-bs-toggle="dropdown" aria-expanded="false">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
            <path fill-rule="evenodd"
                d="M12 1C8.318 1 5 3.565 5 7v4.539a3.25 3.25 0 01-.546 1.803l-2.2 3.299A1.518 1.518 0 003.519 19H8.5a3.5 3.5 0 107 0h4.982a1.518 1.518 0 001.263-2.36l-2.2-3.298A3.25 3.25 0 0119 11.539V7c0-3.435-3.319-6-7-6zM6.5 7c0-2.364 2.383-4.5 5.5-4.5s5.5 2.136 5.5 4.5v4.539c0 .938.278 1.854.798 2.635l2.199 3.299a.017.017 0 01.003.01l-.001.006-.004.006-.006.004-.007.001H3.518l-.007-.001-.006-.004-.004-.006-.001-.007.003-.01 2.2-3.298a4.75 4.75 0 00.797-2.635V7zM14 19h-4a2 2 0 104 0z">
            </path>
        </svg>
    </a>
    <ul class="dropdown-menu notification mt-4">
        <li class="notification-header border-bottom p-2 d-flex align-items-center justify-content-between">
            <span>Notifications</span>
            <a href="javascript:document.getElementById('notification-all-read').submit();" class="text-primary">
                <small class="text-primary">Mark all as read?</small>
            </a>
        </li>
        <li class="notification-body bg-light list-group">

            @forelse ($user->unreadNotifications()->take(10)->get() as $item)
                <a href="{{ route('ladmin.notification.show', $item->id) }}" target="_blank"
                    class="list-group-item d-flex align-items-center border-0 border-bottom rounded-0 notification-list-item list-group-item-action"
                    aria-current="true">
                    @if (isset($item->data['image_link']))
                        <div>
                            <img src="{{ $item->data['image_link'] }}" class="me-2" alt="Notification image"
                                width="50">
                        </div>
                    @endif
                    <div class="flex-grow-1">
                        <div class="d-flex w-100 justify-content-between">
                            <strong class="mb-1">{{ $item->data['title'] ?? 'Title Not Found' }}</strong>
                            <small>{{ $item->created_at->diffForHumans() }}</small>
                        </div>
                        <p class="mb-1">{{ Str::limit($item->data['description'], 50) }}</p>
                    </div>
                </a>
            @empty
                <div class="d-flex justify-content-center align-items-center w-100" style="height: 300px;">
                    <div class="text-center">
                        <i class="fa-solid fa-bell-slash fa fa-3x mb-3 text-muted"></i>
                        <p>You have no new notifications</p>
                    </div>
                </div>
            @endforelse

        </li>
        <li class="notification-footer border-top text-center text-sm">
            <a href="{{ route('ladmin.notification.index', ladmin()->back()) }}" class="text-decoration-none p-2">
                <small>View All</small>
            </a>
        </li>
    </ul>
</div>
