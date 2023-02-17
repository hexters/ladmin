<x-ladmin-auth-layout>
    <x-slot name="title">System Log</x-slot>

    <div class="row">
        <div class="col-md-4 col-11">
            <div class="mb-3">
                <form action="" class="d-inline">
                    <x-ladmin-select empty="- Log file not available -" name="log" onchange="submit();" :value="$file"
                        :options="$files" />
                </form>
            </div>
        </div>
        @can(['system.log.destroy'])
            <div class="col">

                <x-ladmin-button type="button" data-bs-toggle="modal" data-bs-target="#modal-delete-file">
                    Delete File
                </x-ladmin-button>

                <x-ladmin-modal id="modal-delete-file">
                    <x-slot name="title">Delete File</x-slot>
                    <x-slot name="body">
                        Are you sure you want to delete {{ $file }} file?
                    </x-slot>
                    <x-slot name="footer">
                        <form action="{{ route('ladmin.systemlog.destroy', $file) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <x-ladmin-button type="button" color="secondary" data-bs-dismiss="modal">No</x-ladmin-button>
                            <x-ladmin-button>Yes</x-ladmin-button>
                        </form>
                    </x-slot>
                </x-ladmin-modal>

            </div>
        @endcan
    </div>

    <x-ladmin-card>
        <x-slot name="body">
            <div class="table-responsive">
                <table class="table ladmin-datatables">
                    <thead>
                        <tr>
                            <th width="20%">Log Date</th>
                            <th width="10%">Env</th>
                            <th width="10%">Type</th>
                            <th width="50%">Message</th>
                            <th width="10%"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($logs as $i => $log)
                            <tr>
                                <td>
                                    @if (isset($log['timestamp']))
                                        {{ Carbon\Carbon::parse($log['timestamp'])->format(config('ladmin.date.format')) }}
                                    @endif
                                </td>
                                <td>{{ $log['env'] ?? '-' }}</td>
                                <td>
                                    <span
                                        class="badge bg-{{ $log['color'] ?? 'warning' }}">{{ $log['type'] ?? '-' }}</span>
                                </td>
                                <td>{{ isset($log['message']) ? Str::limit($log['message'], 50) : '-' }}</td>
                                <td class="text-center">
                                    @include(ladmin()->view_path('logs._parts._button_details'), [
                                        'log' => $log,
                                        'id' => $i,
                                    ])
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </x-slot>
    </x-ladmin-card>

</x-ladmin-auth-layout>
