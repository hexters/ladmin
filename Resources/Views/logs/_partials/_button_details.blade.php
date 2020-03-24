@if(count($payload) > 0)
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-log-{{ $i }}">
  Trace
</button>

<div class="modal fade" id="modal-log-{{ $i }}" tabindex="-1" role="dialog" aria-labelledby="modal-log-{{ $i }}Label" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header border-0">
        <h5 class="modal-title" id="modal-log-{{ $i }}Label">Trace</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table table-striped">
          <tbody>
            @foreach ($payload as $item)
              <tr>
                <td>{!! $item !!}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endif