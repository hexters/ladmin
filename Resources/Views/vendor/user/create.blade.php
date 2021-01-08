<x-ladmin-layout>
  <x-slot name="title">Create User</x-slot>
    
  <form action="{{ route('administrator.account.admin.store') }}" method="post">
    @csrf 
    
    @include('vendor.ladmin.user._partials._form', ['user' => app(config('ladmin.user', App\Models\User::class))])

    <div class="text-right">
      <button type="submit" class="btn btn-primary">
        Submit User
      </button>
    </div>
  </form>

</x-ladmin-layout>