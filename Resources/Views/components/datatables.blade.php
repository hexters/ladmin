<div class="table-responsive">
  <table class="table ladmin-datatables" data-options='{!! json_encode($options) !!}'>
    <thead>
      <tr>
        @foreach ($fields as $field)
          <th class="{{ $field['class'] ?? null }}">{{ $field['name'] }}</th>
        @endforeach
      </tr>
    </thead>
    <tbody></tbody>
  </table>
</div>