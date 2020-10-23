@extends('ladmin::layouts.app')
@section('title', 'Select Role')
@section('content')
    
  <x-ladmin-datatables :fields="$fields" :options="$options" />

@endsection