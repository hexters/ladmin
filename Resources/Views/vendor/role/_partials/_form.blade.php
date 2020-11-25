<x-ladmin-input name="name" label="Role Name" type="text" :value="$role->name" old="true" required="true">
  <x-slot name="prepend">
    {!! ladmin()->icon('desktop-computer') !!}
  </x-slot>
</x-ladmin-input>