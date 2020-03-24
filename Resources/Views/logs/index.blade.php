@extends('ladmin::layouts.app')
@section('title', 'Module Title')
@section('content')
    
    <x-ladmin-card>
      <x-slot name="flat">
        <table class="table ladmin-datatable-base">
          <thead>
            <tr>
              <th>Date</th>
              <th>Code</th>
              <th>Error</th>
              <th>Payload</th>
              <th>File</th>
              <th>Line</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($logs as $log)
                <tr>
                  <td>{{ $log['date'] }}</td>
                  <td>{{ $log['code'] }}</td>
                  <td>{{ $log['error'] }}</td>
                  <td>{{ json_encode($log['payload']) }}</td>
                  <td>{{ $log['file'] }}</td>
                  <td>{{ $log['line'] }}</td>
                </tr>
            @empty
                <tr>
                  <td colspan="6">No record found</td>
                </tr>
            @endforelse
          </tbody>
        </table>
      </x-slot>
    </x-ladmin-card>

@endsection