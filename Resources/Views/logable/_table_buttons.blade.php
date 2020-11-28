<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-detail-activity-{{ $item->id }}">
  Show
</button>

<div class="modal text-left fade" id="modal-detail-activity-{{ $item->id }}" tabindex="-1" aria-labelledby="modal-detail-activity-{{ $item->id }}Label" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header border-0">
        <h5 class="modal-title" id="modal-detail-activity-{{ $item->id }}Label">Activity</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="table-responsive">
        <table class="table">
          <tbody>
            <tr>
              <td colspan="2">
                <p class="card-title font-weight-bold my-2">User Account</p>
              </td>
            </tr>
            <tr>
              <td>Date</td>
              <td>{{ $item->created_at->format('d/m/y H:i') }} - {{ $item->created_at->diffForHumans() }}</td>
            </tr>
            <tr>
              <td>Name</td>
              <td>{{ $item->user->name }}</td>
            </tr>
            <tr>
              <td>Email</td>
              <td>{{ $item->user->email }}</td>
            </tr>

            <tr>
              <td>Event Type</td>
              <td>
                <span class="badge badge-{{ $item->colors[$item->type] ?? 'warning' }}">
                  {{ ucwords($item->type) }}
                </span>
              </td>
            </tr>

            <tr>
              <td>Model</td>
              <td>{{ ucwords($item->logable_type) }}</td>
            </tr>
            <tr>
              <td>ID</td>
              <td>{{ ucwords($item->logable_id) }}</td>
            </tr>
            <tr>
              <td colspan="2">
                <p class="card-title font-weight-bold my-2">New Data</p>
              </td>
            </tr>

            @foreach ((Array) $item->new_data as $field => $data)
            @php
                $new = is_array($data) ? json_encode($data) : $data;
                $old = isset($item->old_data[$field]) ? is_array($item->old_data[$field]) ? json_encode($item->old_data[$field]) : $item->old_data[$field] : $new
            @endphp
                <tr>
                  <td>{{ $field }}</td>
                  <td class="{{ ($old === $new) ? '' : 'text-danger' }}">{!!  $new !!}</td>
                </tr>
            @endforeach

            <tr>
              <td colspan="2">
                <p class="card-title font-weight-bold my-2">Old Data</p>
              </td>
            </tr>

            @forelse ((Array) $item->old_data as $field => $data)
              @php
                  $old = is_array($data) ? json_encode($data) : $data;
                  $new = isset($item->new_data[$field]) ? is_array($item->new_data[$field]) ? json_encode($item->new_data[$field]) : $item->new_data[$field] : $old
              @endphp
                <tr>
                  <td>{{ $field }}</td>
                  <td class="{{ ($old === $new) ? '' : 'text-warning' }}">{!!  $old !!}</td>
                </tr>
                @empty 
                <tr>
                  <td colspan="2">No data available</td>
                </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>