<div class="table-responsive ladmin-datatable" data-options='{!! json_encode($options) !!}'>
  <table class="table">
    <thead>
      <tr>
        @foreach ($fields as $field)
          <td>{{ $field }}</td>
        @endforeach
      </tr>
    </thead>
    <tbody></tbody>
  </table>
</div>