<x-ladmin-auth-layout>
    <x-slot name="title">Admin Details</x-slot>
    
    <form action="{{ route('ladmin.admin.update', $admin->id) }}" method="POST">
        @csrf
        @method('PUT')

        @include( ladmin()->view_path('admin._parts._form'), ['admin' => $admin] )

        @include(ladmin()->view_path('admin._parts._role'), ['admin' => $admin])

        <input type="hidden" name="id" value="{{ $admin->id }}">

        <div class="text-end">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>

    </form>

</x-ladmin-auth-layout>
