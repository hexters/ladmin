## Ladmin (Laravel Admin)

This package will be handle admin page for yor laravel project.

### Installation

Follow installation step below

Add github repository to `composer.json` (beta)
```
. . .

"require": {
    . . .
    "hexters/ladmin": "dev-master",
    . . .
},
"repositories": [
    {
        "type": "vcs",
        "url":  "git@github.com:hexters/ladmin.git"
    }
]
. . .
```

Update the package
```
$ composer update hexters/ladmin
```

Add this trait to your user model
```
. . .
use Hexters\Ladmin\LadminTrait;

class User extends Authenticatable {

  use Notifiable, LadminTrait;

  . . .
```

Publish asset and system package
```
$ php artisan vendor:publish --tag=assets --force
$ php artisan vendor:publish --tag=core

```

Install database
```
$ php artisan migrate
```

Attach role to user admin with database seed or other
```
. . .
use App\User;
use Hexters\Ladmin\Models\Role;
. . .

$user = User::first();
$role = Role::first();
$user->roles()->attach($role->id, [], false);


```


Add Ladmin route to route project `routes/web.php`
```
. . .

use Hexters\Ladmin\Routes\Ladmin;

. . .

Ladmin::route(function() {

    // Your module route here
    
    // namespace App\Http\Controllers\Administrator
    Route::resource('withdrawal', 'WithdrawalController');

});

. . .

```

Blade extend layout
```

@extends('ladmin::layouts.app')
@section('title', 'Module Title')
@section('content')
    
    <!-- Component here -->

@endsection

```

Access admin page
```
http://domain.com/administrator
```


### Blade Component

Card Component
```
<x-ladmin-card class="mb-3">
  <x-slot name="header"> <!-- not required -->
    Card Header
  </x-slot>

    Card Content

  <x-slot name="footer"> <!-- not required -->
    Card Footer
  </x-slot>
</x-ladmin-card>
```
|Attribute|value|require|
|-|-|-|
|`class`|String|NO|

Input Component
```
<x-ladmin-input name="money" type="number" placeholder="Input your income">
  <x-slot name="prepend"> <!-- not required -->
    <i class="fas fa-wallet"></i>
  </x-slot>

  <x-slot name="append"> <!-- not required -->
    USD
  </x-slot>
</x-ladmin-input>

// OR

<x-ladmin-input name="email" type="email" label="E-Mail Address" />

```

|Attribute|value|require|
|-|-|-|
|`name`|String|YES|
|`type`|String|YES|
|`label`|String|NO|
|`placeholder`|String|NO|
|`old`|Boolean default `false`|NO|
|`value`|String|NO|
|`required`|Boolean default `false`|NO|