<x-ladmin-form-group name="name" label="Full Name *">
  <x-slot name="prepend">
    {!! ladmin()->icon('user-circle') !!}
  </x-slot>

  <input type="text" placeholder="Full Name" class="form-control" name="name" id="name" required value="{{ old('name', $user->name) }}">
</x-ladmin-form-group>

<x-ladmin-form-group name="email" label="E-mail Address *">
  <x-slot name="prepend">
    {!! ladmin()->icon('at-symbol') !!}
  </x-slot>

  <input type="email" placeholder="E-mail Address" class="form-control" name="email" id="email" required value="{{ old('email', $user->email) }}">
</x-ladmin-form-group>

<x-ladmin-form-group name="pass" label="Password *">
  <x-slot name="prepend">
    {!! ladmin()->icon('lock-closed') !!}
  </x-slot>

  <input type="password" placeholder="Password" class="form-control" name="pass" id="pass">
</x-ladmin-form-group>


@if (isset($roles))
<x-ladmin-form-group name="role_id" label="Role *">
  <x-slot name="prepend">
    {!! ladmin()->icon('desktop-computer') !!}
  </x-slot>

  <select name="role_id" id="role_id" class="form-control border-0" required>
    <option value="">- Select Role -</option>
    @foreach ($roles as $role)
      <option value="{{ $role->id }}" {{ isset($user->role->id) && $user->role->id == $role->id ? 'selected' : '' }}>{{ $role->name }}</option>
    @endforeach
  </select>
</x-ladmin-form-group>
@endif