<div class="table-responsive ladmin-datatable" data-options='{!! json_encode($options) !!}'>
  <table class="table">
    <thead>
      @foreach ($fields as $field)
          <tr>
            <td>{{ $field }}</td>
          </tr>
      @endforeach
    </thead>
    <tbody></tbody>
  </table>
</div>