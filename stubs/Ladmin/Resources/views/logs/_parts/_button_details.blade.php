<x-ladmin-button type="button" size="sm" data-bs-toggle="modal"
    data-bs-target="#modal-detail-log-{{ $i }}">
    View
</x-ladmin-button>

<div class="modal fade text-start" id="modal-detail-log-{{ $i }}" tabindex="-1"
    aria-labelledby="modal-detail-log-{{ $i }}Label" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-detail-log-{{ $i }}Label">Log Details</h5>
                <x-ladmin-button type="button" class="btn-close" color="white" data-bs-dismiss="modal" aria-label="Close"></x-ladmin-button>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <tbody>
                        <tr>
                            <td>Log Date</td>
                            <td>
                                {{ Carbon\Carbon::parse($log['timestamp'])->format(config('ladmin.date.format')) }}
                                <br>
                                <small
                                    class="text-muted">{{ Carbon\Carbon::parse($log['timestamp'])->diffForHumans() }}</small>
                            </td>
                        </tr>
                        <tr>
                            <td>Environment</td>
                            <td>{{ $log['env'] }}</td>
                        </tr>
                        <tr>
                            <td>Type</td>
                            <td>
                                <span class="badge bg-{{ $log['color'] ?? 'warning' }}">{{ $log['type'] }}</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-body bg-dark text-light">
                {{ $log['message'] }}
                @if (isset($log['trace']) && !empty($log['trace']))
                    <hr>
                    {!! $log['trace'] !!}
                @endif
            </div>
        </div>
    </div>
</div>
