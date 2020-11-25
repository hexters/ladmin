<x-ladmin-input name="name" label="Full Name" type="text" :value="$user->name" old="true" required="true">
  <x-slot name="prepend">
    {!! ladmin()->icon('user-circle') !!}
  </x-slot>
</x-ladmin-input>

<x-ladmin-input name="email" label="E-Mail Address" type="email" :value="$user->email" old="true" required="true">
  <x-slot name="prepend">
    {!! ladmin()->icon('at-symbol') !!}
  </x-slot>
</x-ladmin-input>

<x-ladmin-input name="pass" label="Password" type="password">
  <x-slot name="prepend">
    {!! ladmin()->icon('lock-closed') !!}
  </x-slot>
</x-ladmin-input>

@if (isset($roles))
  <x-ladmin-form-group name="role_id" label="Role" type="vertical">
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