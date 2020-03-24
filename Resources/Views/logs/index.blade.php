@extends('ladmin::layouts.app')
@section('title', 'System Log')
@section('content')
    
    <x-ladmin-card>
      <x-slot name="flat">
        <div class="table-responsive">
          <table class="table ladmin-datatable-base">
            <thead>
              <tr>
                <th>Date</th>
                <th>Code</th>
                <th>Error</th>
                <th>File:line</th>
                <th>Trace</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($logs as $i => $log)
                  <tr>
                    <td>{{ $log['date'] ?? '-' }}</td>
                    <td>{{ $log['code'] ?? '-' }}</td>
                    <td>{{ $log['error'] ?? '-' }}</td>
                    <td>{{ $log['file_name'] ?? '-' }}:{{ $log['line'] }}</td>
                    <td>
                      @include('ladmin::logs._partials._button_details', ['payload' => $log['file_name', 'id' => $i]])
                    </td>
                  </tr>
              @empty
                  <tr>
                    <td colspan="6">No record found</td>
                  </tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </x-slot>
    </x-ladmin-card>

@endsection