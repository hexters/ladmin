<x-ladmin-auth-layout>
    <x-slot name="title">System Log</x-slot>

    <div class="row">
        <div class="col-md-4 col-11">
            <div class="mb-3">
                <form action="" class="d-inline">
                    <select onchange="submit();" name="log" id="" class="form-control">
                        @forelse ($files as $item)
                            <option {{ $file == $item ? 'selected' : null }} value="{{ $item }}">File
                                {{ $item }}</option>
                        @empty
                            <option value="">- Log file not available -</option>
                        @endforelse
                    </select>
                </form>
            </div>
        </div>
        @can(['system.log.destroy'])
            <div class="col">

                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-delete-file">
                    Delete File
                </button>

                <div class="modal fade" id="modal-delete-file" tabindex="-1" aria-labelledby="modal-delete-fileLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header border-0">
                                <h5 class="modal-title" id="modal-delete-fileLabel">Delete File</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Are you sure you want to delete {{ $file }} file?
                            </div>
                            <div class="modal-footer border-0">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                                <form action="{{ route('ladmin.systemlog.destroy', $file) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-primary">Yes</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
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
