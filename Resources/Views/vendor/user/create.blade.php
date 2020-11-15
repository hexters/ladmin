<x-ladmin-layout>
  <x-slot name="title">Create User</x-slot>
    
  <x-ladmin-card>
    <form action="{{ route('administrator.account.admin.store') }}" method="post">
      @csrf 
      
      @include('vendor.ladmin.user._partials._form', ['user' => (new App\Models\User)])
  
      <div class="text-right">
        <button type="submit" class="btn btn-primary">
          Submit User
        </button>
      </div>
    </form>
  </x-ladmin-card>

</x-ladmin-layout>