<x-ladmin-card>
  <x-slot name="flat">
    <div class="table-responsive">
      <div class="top-button">
        {!! $options['topButton'] ?? null !!}
      </div>
      <table class="table ladmin-datatables table-striped m-0" data-options='{!! json_encode($options) !!}'>
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
  </x-slot>
</x-ladmin-card>
