@extends('ladmin::layouts.app')
@section('title', 'Create Role')
@section('content')
    
  <x-ladmin-card>
    <form action="{{ route('administrator.access.role.store') }}" method="post">
      @csrf 
      
      @include('vendor.ladmin.role._partials._form', ['role' => (new Hexters\Ladmin\Models\Role)])
  
      <div class="text-right">
        <button type="submit" class="btn btn-primary">
          Submit Role
        </button>
      </div>
    </form>
  </x-ladmin-card>

@endsection