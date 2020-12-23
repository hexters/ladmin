<x-ladmin-layout>
  <x-slot name="title">Create Role</x-slot>
    
  <form action="{{ route('administrator.access.role.store') }}" method="post">
    @csrf 
    
    @include('vendor.ladmin.role._partials._form', ['role' => (new App\Models\Role)])

    <div class="text-right">
      <button type="submit" class="btn btn-primary">
        Submit Role
      </button>
    </div>
  </form>

</x-ladmin-layout>