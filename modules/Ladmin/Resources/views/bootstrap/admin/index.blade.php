<x-ladmin-auth-layout>
    <x-slot name="title">List of Admin accounts</x-slot>
    @can(['ladmin.admin.create'])
        <x-slot name="button">
            <a href="{{ route('ladmin.admin.create', ladmin()->back()) }}" class="btn btn-primary">&plus; Add New</a>
        </x-slot>
    @endcan
    <x-ladmin-card>
        <x-slot name="body">
            {{ \Modules\Ladmin\Datatables\AdminDatatables::table() }}
        </x-slot>
    </x-ladmin-card>
    
</x-ladmin-auth-layout>
