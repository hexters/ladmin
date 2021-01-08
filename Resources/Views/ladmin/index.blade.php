<x-ladmin-layout>
  <x-slot name="title">{{ $title ?? null }}</x-slot>
  
  <x-slot name="buttons">
    {!! $buttons ?? null !!}
  </x-slot>

  <x-ladmin-datatables :fields="$fields" :options="$options" />

</x-ladmin-layout>