<x-ladmin-auth-layout>
    <x-slot name="title">{{ $title }}</x-slot>
    <x-slot name="button">{!! $buttons !!}</x-slot>

    <x-ladmin-card>
        <x-slot name="body">
            <x-ladmin-data-tables :options="$options" :headers="$headers" />
        </x-slot>
    </x-ladmin-card>

</x-ladmin-auth-layout>
