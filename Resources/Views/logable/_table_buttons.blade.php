<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-detail-activity-{{ $item->id }}">
  Show
</button>

<!-- Modal -->
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
                <h4 class="card-title font-weight-bold my-2">User Account</h4>
              </td>
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
              <td>{{ ucwords($item->type) }}</td>
            </tr>

            <tr>
              <td>Table Name</td>
              <td>{{ ucwords($item->activiesable_type) }}</td>
            </tr>
            <tr>
              <td>Table ID</td>
              <td>{{ ucwords($item->activiesable_id) }}</td>
            </tr>
            <tr>
              <td colspan="2">
                <h4 class="card-title font-weight-bold my-2">New Data of Table</h4>
              </td>
            </tr>

            @foreach ((Array) json_decode($item->new_data) as $field => $data)
                <tr>
                <td>{{ $field }}</td>
                  <td>{!! str_replace('"', '', json_encode($data)) !!}</td>
                </tr>
            @endforeach

            <tr>
              <td colspan="2">
                <h4 class="card-title font-weight-bold my-2">Old Data of Table</h4>
              </td>
            </tr>

            @foreach ((Array) json_decode($item->old_data) as $field => $data)
                <tr>
                <td>{{ $field }}</td>
                  <td>{!! str_replace('"', '', json_encode($data)) !!}</td>
                </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>