<div class="table-responsive">
  <table class="table ladmin-datatable" data-options='{!! json_encode($options) !!}'>
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