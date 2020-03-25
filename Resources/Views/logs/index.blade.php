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
              @foreach ($logs as $i => $log)
                  <tr>
                    <td>{{ $log['date'] ?? '-' }}</td>
                    <td>{{ $log['code'] ?? '-' }}</td>
                    <td>{{ $log['error'] ?? '-' }}</td>
                    <td>{{ $log['file_name'] ?? '-' }}:{{ $log['line'] ?? null }}</td>
                    <td>
                      @include('ladmin::logs._partials._button_details', ['payload' => $log['payload'], 'id' => $i])
                    </td>
                  </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </x-slot>
    </x-ladmin-card>

@endsection