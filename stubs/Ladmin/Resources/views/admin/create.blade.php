<x-ladmin-auth-layout>
    <x-slot name="title">Add New Admin</x-slot>

    <form action="{{ route('ladmin.admin.store') }}" method="POST">
        @csrf

        @include(ladmin()->view_path('admin._parts._form'), ['admin' => ladmin()->admin()])
        @include(ladmin()->view_path('admin._parts._role'), ['admin' => ladmin()->admin()])
        
        <div class="text-end">
            <x-ladmin-button>Submit</x-ladmin-button>
        </div>

    </form>

</x-ladmin-auth-layout>
