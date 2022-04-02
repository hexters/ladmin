<x-ladmin-auth-layout>
    <x-slot name="title">Notifications</x-slot>

    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="d-flex mb-3 justify-content-between align-items-center">
                <ul class="nav nav-pills">
                    <li class="nav-item">
                        <a class="nav-link {{ $state === 'all' ? 'active' : null }}" aria-current="page"
                            href="?state=all&{{ http_build_query(request()->except(['page', 'state'])) }}">All</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ !($state === 'all') ? 'active' : null }}"
                            href="?state=unread&{{ http_build_query(request()->except(['page', 'state'])) }}">Unread</a>
                    </li>
                </ul>
                <div class="text-end mb-3">
                    <a href="javascript:document.getElementById('notification-all-read').submit();">Mark all as
                        read?</a>
                </div>
            </div>

            <form class="mb-3" method="GET" action="{{ route('ladmin.notification.index') }}">
                <div class="input-group mb-3">
                    <input type="text" name="search" value="{{ request()->get('search', '') }}"
                        class="form-control border-0" placeholder="Search Notification..."
                        aria-label="Search Notification..." aria-describedby="button-addon2">
                    <x-ladmin-button class="btn border-0 bg-white" type="submit" id="button-addon2">
                        <i class="fa fa-solid fa-magnifying-glass"></i>
                    </x-ladmin-button>
                </div>

                @foreach (request()->except(['search']) as $param => $value)
                    <input type="hidden" name="{{ $param }}" value="{{ $value }}">
                @endforeach
            </form>

            <div class="notification-body bg-light mb-3 list-group">
                @forelse ($notifications as $item)
                    <a href="{{ route('ladmin.notification.show', $item->id) }}" target="_blank"
                        class="list-group-item d-flex align-items-center border-0 border-bottom rounded-0 list-group-item-action"
                        aria-current="true">
                        @if (isset($item->data['image_link']))
                            <div>
                                <img src="{{ $item->data['image_link'] }}" class="me-3"
                                    alt="Notification image" width="70">
                            </div>
                        @endif
                        <div class="flex-grow-1">
                            <div class="d-flex w-100 justify-content-between">
                                <strong
                                    class="mb-1">{{ $item->data['title'] ?? 'Title Not Found' }}</strong>
                                <div>
                                    @if (is_null($item->read_at))
                                        <i class="fa fa-solid text-primary fa-circle"></i>
                                    @endif
                                </div>
                            </div>
                            <p class="mb-1">{{ $item->data['description'] ?? 'No description' }}</p>
                            <small>{{ $item->created_at->diffForHumans() }}</small>
                        </div>
                    </a>
                @empty
                    <div class="d-flex justify-content-center align-items-center w-100" style="height: 500px;">
                        <div class="text-center">
                            <i class="fa-solid fa-bell-slash fa fa-3x mb-3 text-muted"></i>
                            <p>You have no new notifications</p>
                        </div>
                    </div>
                @endforelse
            </div>

            {{ $notifications->appends(request()->all())->render() }}

        </div>
    </div>

</x-ladmin-auth-layout>
