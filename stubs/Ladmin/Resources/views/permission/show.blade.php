<x-ladmin-auth-layout>
    <x-slot name="title">Assign Role</x-slot>

    @php
        $viewMenu = function ($gates, $level) use (&$viewMenu, $role) {
            $html = '';
            foreach ($gates as $gate) {
                $html .= ladmin()->view('permission._parts._gate', ['level' => $level, 'role' => $role, 'gate' => $gate, 'viewMenu' => $viewMenu]);
            }
            return $html;
        };
    @endphp

    <form action="{{ route('ladmin.permission.update', $role->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row justify-content-center">
            <div class="col-lg-8 col-sm-12">
                <x-ladmin-card>
                    <x-slot name="body">
                        <div class="d-flex justify-content-between">
                            <h3>{{ $role->name }}</h3>
                            <a href="javascript:void(0);" onclick="Ladmin.permissionSelectDiselectAll()">Select / Deselect all</a>
                        </div>
                        <ul id="ladmin-permission-list" class="mb-3">
                            {!! $viewMenu( ladmin()->menu()->all(), 1) !!}
                        </ul>
                    </x-slot>
                    <x-slot name="footer">
                        <div class="text-end">
                            <x-ladmin-button>Assign Permission</x-ladmin-button>
                        </div>
                    </x-slot>
                </x-ladmin-card>
            </div>
        </div>

    </form>

</x-ladmin-auth-layout>
