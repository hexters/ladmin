<x-ladmin-auth-layout>
    <x-slot name="title">Activity Details</x-slot>

    <div class="mb-4">
        <div class="row mb-3">
            <div class="col-lg-4">Date :</div>
            <div class="col">
                <strong>{{ $data->created_at->format(config('ladmin.date.format')) }}</strong> <br>
                <small class="text-muted">
                    {{ $data->created_at->diffForHumans() }}
                </small>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-lg-4">Admin Account :</div>
            <div class="col">
                <strong>{{ $data->admin->name }}</strong> <br>
                <small class="text-muted">{{ $data->admin->email }}</small>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-lg-4">Method :</div>
            <div class="col">
                {!! $data->type_badge !!}
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-lg-4">Application Model :</div>
            <div class="col">
                <code>{{ $data->loggable_type }}:{{ $data->loggable_id }}</code>
            </div>
        </div>
    </div>

    <hr>

    @if (count($data->new_data) > 0)
        <div class="mb-3 p-3 table-responsive">
            <x-ladmin-card>
                <x-slot name="body">
                    <h5 class="card-title">New Data</h5>
                    <table class="table">
                        @foreach ($data->new_data as $label => $value)
                            <tr>
                                <td width="40%">{{ $label }}</td>
                                <td>
                                    @if (is_array($value))
                                        <table class="table">
                                            @foreach ($value as $title => $item)
                                                <tr>
                                                    <td>{{ $title }}</td>
                                                    <td>{{ is_array($item) ? json_encode($item, true) : $item }}</td>
                                                </tr>
                                            @endforeach
                                        </table>
                                    @else
                                        {{ $value ?? '-' }}
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </x-slot>
            </x-ladmin-card>
        </div>
    @endif

    @if (count($data->old_data) > 0)
        <div class="mb-3 p-3 table-responsive">
            <x-ladmin-card>
                <x-slot name="body">
                    <h5 class="card-title">Old Data</h5>
                    <table class="table">
                        @foreach ($data->old_data as $label => $value)
                            <tr>
                                <td width="40%">{{ $label }}</td>
                                <td>
                                    @if (is_array($value))
                                        <table class="table">
                                            @foreach ($value as $title => $item)
                                                <tr>
                                                    <td>{{ $title }}</td>
                                                    <td>{{ is_array($item) ? json_encode($item, true) : $item }}</td>
                                                </tr>
                                            @endforeach
                                        </table>
                                    @else
                                        {{ $value ?? '-' }}
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </x-slot>
            </x-ladmin-card>
        </div>
    @endif


</x-ladmin-auth-layout>
