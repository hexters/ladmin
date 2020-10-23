@extends('ladmin::layouts.app')
@section('title', 'User Admin')
@section('content')
    
  <x-ladmin-datatables :fields="$fields" :options="$options" />

@endsection