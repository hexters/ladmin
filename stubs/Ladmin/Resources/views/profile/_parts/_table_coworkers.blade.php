<table class="table">
    <thead>
        <tr>
            <th class="Admin Online">
                <i class="fa-solid fa-circle text-success"></i>
            </th>
            <th>Name</th>
            <th>Email</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($roles as $role)
            <tr>
                <td colspan="4">
                    <strong class="text-primary">
                        <i class="fa-solid fa-user-lock"></i> {{ $role->name }}
                    </strong>
                </td>
            </tr>

            @forelse ($role->admins()->whereNot('id', auth()->id())->where('online_at', '>', now())->where('state', 'active')->get() as $admin)
                <tr>
                    <td>
                        @if ($admin->online_at > now())
                            <i class="fa-solid fa-circle text-success"></i>
                        @else
                            <i class="fa-regular fa-circle text-muted"></i>
                        @endif
                    </td>
                    <td>{{ $admin->name }}</td>
                    <td>{{ $admin->email }}</td>
                    <td>
                        <a href="mailto:{{ $admin->email }}"><i class="fa-regular fa-lg fa-envelope"></i></a>
                    </td>
                </tr>
            @empty
            <tr>
                <td colspan="4">No coworkers are currently online</td>
            </tr>
            @endforelse
        @endforeach
    </tbody>

</table>
