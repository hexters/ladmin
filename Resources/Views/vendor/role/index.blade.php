@extends('ladmin::layouts.app')
@section('title', 'Admin Role')
@section('content')
    
  <x-ladmin-datatables :fields="$fields" :options="$options" />

@endsection