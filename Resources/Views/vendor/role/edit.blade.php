@extends('ladmin::layouts.app')
@section('title', 'Edit Role')
@section('content')
    
  <x-ladmin-card>
    <form action="{{ route('administrator.access.role.update', $role->id) }}" method="post">
      @csrf 
      @method('PUT')
      
      @include('vendor.ladmin.role._partials._form', ['role' => $role])
  
      <div class="text-right">
        <button type="submit" class="btn btn-primary">
          Update Role
        </button>
      </div>
    </form>
  </x-ladmin-card>

@endsection