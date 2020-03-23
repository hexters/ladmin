@extends('ladmin::layouts.app')
@section('title', 'User Admin')
@section('component')
    
  <x-ladmin-card>
    <x-slot name="flat">
      <x-ladmin-datatables :fields="$fields" :optinos="$options" />
    </x-slot>
  </x-ladmin-card>

@endsection