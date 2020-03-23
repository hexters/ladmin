<x-ladmin-input name="name" type="text" :value="$user->name" old="true" required="true">
  <x-slot name="prepend">
    <i class="fas fa-account"></i>
  </x-slot>
</x-ladmin-input>

<x-ladmin-input name="email" type="email" :value="$user->email" old="true" required="true">
  <x-slot name="prepend">
    <i class="fas fa-envelope"></i>
  </x-slot>
</x-ladmin-input>

<x-ladmin-input name="password" type="password">
  <x-slot name="prepend">
    <i class="fas fa-lock"></i>
  </x-slot>
</x-ladmin-input>