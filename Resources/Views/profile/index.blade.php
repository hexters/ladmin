@extends('ladmin::layouts.app')
@section('title', 'Profile')
@section('content')
    
<x-ladmin-card>
  <form action="{{ route('administrator.profile.store') }}" method="post">
    @csrf

    @include('vendor.ladmin.user._partials._form', ['user' => auth()->user()])

    <div class="text-right">
      <button type="submit" class="btn btn-primary">
        Update
      </button>
    </div>
  </form>
</x-ladmin-card>

@endsection