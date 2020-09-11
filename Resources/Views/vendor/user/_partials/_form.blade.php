<x-ladmin-input name="name" label="Full Name" type="text" :value="$user->name" old="true" required="true">
  <x-slot name="prepend">
    <i class="fas fa-user-circle"></i>
  </x-slot>
</x-ladmin-input>

<x-ladmin-input name="email" label="E-Mail Address" type="email" :value="$user->email" old="true" required="true">
  <x-slot name="prepend">
    <i class="fas fa-envelope"></i>
  </x-slot>
</x-ladmin-input>

<x-ladmin-input name="pass" label="Password" type="password">
  <x-slot name="prepend">
    <i class="fas fa-lock"></i>
  </x-slot>
</x-ladmin-input>

@if (isset($roles))
  <div class="form-group">
    <label for="role_id">Role</label>
    <select name="role_id" id="role_id" class="form-control" required>
      <option value="">- Select Role -</option>
      @foreach ($roles as $role)
        <option value="{{ $role->id }}" {{ isset($user->role->id) && $user->role->id == $role->id ? 'selected' : '' }}>{{ $role->name }}</option>
      @endforeach
    </select>
  </div>
@endif