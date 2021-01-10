<x-ladmin-card>
  <x-slot name="flat">
    <div class="table-responsive">
      <table class="table ladmin-datatables table-striped m-0" data-options='{!! json_encode($options) !!}'>
        <thead>
          <tr>
            @foreach ($fields as $field)
              <th>{{ $field }}</th>
            @endforeach
          </tr>
        </thead>
        <tbody></tbody>
      </table>
    </div>
  </x-slot>
</x-ladmin-card>
