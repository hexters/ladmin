@extends('ladmin::layouts.app')
@section('title', $title ?? null)
@section('content')
    
  <x-ladmin-datatables :fields="$fields" :options="$options" />

@endsection