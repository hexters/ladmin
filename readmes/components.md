## Blade Components

### Card Component
```
<x-ladmin-card class="mb-3">
  <x-slot name="header">
    Card Header
  </x-slot>

    {-- Card Content here --}

  <x-slot name="footer">
    Card Footer
  </x-slot>
</x-ladmin-card>
```

#### Attributes
|Attribute|value|require|
|-|-|-|
|`class`|String|NO|
|`title`|String|NO|
|`image`|String URL|NO|

#### Slots 
|Slot Name|Require|
|-|-|
|header|NO|
|footer|NO|

### Form Group Componenet
```
<x-ladmin-form-group name="money" label="Money" help="Information for form input" col-label="4" col-input="8">
  <x-slot name="prepend">
    <i class="fas fa-wallet"></i>
  </x-slot>

  {-- Your bootstrap input component here --}
  <input type="number" name="money" class="form-control">

  <x-slot name="append">
    IDR
  </x-slot>

  <x-slot name="caption">
    Form input informatin
  </x-slot>
</x-ladmin-form-group>
```
#### Attributes
|Attribute|Type|Require|Note|
|-|-|-|-|
|`name`|String|YES|Name must be the same as the input form|
|`label`|String|YES||
|`type`|String|NO|`vertical` or `horizontal` default `horizontal`|
|`help`|String|NO||
|`col-label`|int|NO| Grid `col 1 - 12`|
|`col-input`|int|NO| Grid `col 1 - 12`|

#### Slots
|Slot Name|Require|
|-|-|
|prepend|NO|
|append|NO|
|caption|NO|