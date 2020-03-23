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

<x-ladmin-input name="pass" label="Password" type="password" required="false">
  <x-slot name="prepend">
    <i class="fas fa-lock"></i>
  </x-slot>
</x-ladmin-input>