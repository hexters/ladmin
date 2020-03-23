@extends('ladmin::layouts.app')
@section('title', 'Edit User')
@section('content')
    
  <form action="{{ route('administrator.account.admin.edit', $user->id) }}" method="post">
    @csrf 
    @method('PUT')
    @include('vendor.ladmin.user._partials._form', ['user' => $user])

    <div class="text-right">
      <button type="submit" class="btn btn-primary">
        Update User
      </button>
    </div>
  </form>

@endsection