<x-ladmin-input name="name" label="Role Name" type="text" :value="$role->name" old="true" required="true">
  <x-slot name="prepend">
    <i class="fas fa-users-cog"></i>
  </x-slot>
</x-ladmin-input>