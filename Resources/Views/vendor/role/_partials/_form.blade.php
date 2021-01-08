<x-ladmin-form-group name="name" label="Role Name *">
  <x-slot name="prepend">
    {!! ladmin()->icon('desktop-computer') !!}
  </x-slot>

  <input type="text" placeholder="Role Name" class="form-control" name="name" id="name" value="{{ old('name', $role->name) }}" required>
</x-ladmin-form-group>