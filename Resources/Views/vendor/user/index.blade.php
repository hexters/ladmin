@extends('ladmin::layouts.app')
@section('title', 'User Admin')
@section('content')
    
  <x-ladmin-card>
    <x-slot name="flat">
      <x-ladmin-datatables :fields="$fields" :options="$options" />
    </x-slot>
  </x-ladmin-card>

@endsection