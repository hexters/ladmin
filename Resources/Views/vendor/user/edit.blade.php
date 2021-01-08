<x-ladmin-layout>
  <x-slot name="title">Edit User</x-slot>
    
  <form action="{{ route('administrator.account.admin.update', $user->id) }}" method="post">
    @csrf 
    @method('PUT')
    
    @include('vendor.ladmin.user._partials._form', ['user' => $user])

    <div class="text-right">
      <button type="submit" class="btn btn-primary">
        Update User
      </button>
    </div>
  </form>

</x-ladmin-layout>