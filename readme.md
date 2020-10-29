## Ladmin (Laravel Admin)

This package will handle the admin page for your laravel project.

![Example Image](https://github.com/hexters/ladmin/blob/master/user.png?raw=true)

## Laravel Version

|Version|Laravel|
|:-:|:-:|
| [v1.0.x](https://github.com/hexters/ladmin/blob/master/versions/1.0.md) | 7.x |
| v1.1.x | 8.x |

## Package Requirement
- [DataTables](https://github.com/yajra/laravel-datatables)

## Installation

Before using this package you must already have a login page or route login `route('login')` for your members, you can use [larave/ui](https://github.com/laravel/ui) or [laravel jetstream](https://jetstream.laravel.com/1.x/introduction.html).

You can install this package via composer:
```
$ composer require hexters/ladmin
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

Attach role to user admin with database seed or other
```
. . .

  $role = \App\Models\Role::first();
  \App\Models\User::factory(10)->create()
    ->each(function($user) use ($role) {
      $user->roles()->sync([$role->id]);
    });

. . .
```

Install database
```
$ php artisan migrate --seed
```


Add Ladmin route to your route project `routes/web.php`
```
. . .

use Illuminate\Support\Facades\Route;
use Hexters\Ladmin\Routes\Ladmin;

. . .

Ladmin::route(function() {

    Route::resource('/withdrawal', WithdrawalController::class); // Example

});

. . .

```

Create Datatables server
```
$ php artisan make:datatables UserDataTables  --model=User
```

## Blade
Ladmin layout in `resources/views/vendor/ladmin`

Extends your content module to ladmin layout
```

@extends('ladmin::layouts.app')
@section('title', 'Module Title')
@section('content')
    
    <!-- Component here -->

@endsection

```

And you can Access admin page in this link below.
```
http://localhost:8000/administrator
```
![Example Image](https://github.com/hexters/ladmin/blob/master/login.png?raw=true)

## Ladmin Menu

Open `app/menus/sidenar.php` file and `top_right.php` file to manage ladmin menu

## Blade Component

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

## Custom Style
Install node modules
```
$ npm i jquery popper.js bootstrap @fortawesome/fontawesome-free datatables.net datatables.net-bs4 --save

// OR

$ yarn add jquery popper.js bootstrap @fortawesome/fontawesome-free datatables.net datatables.net-bs4

```

Add this code to your  `webpack.mix.js` file
```

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css');

mix.js('resources/js/ladmin/app.js', 'public/js/ladmin/app.js')
   .sass('resources/sass/ladmin/app.scss', 'public/css/ladmin/app.css');
```

## Notification

Set the true to activated notification

```
. . .

'notification' => true

. . .
```

Send notification
```
(new User)->ladminSendNotification([
  'title' => 'New invoice',
  'link' => 'http://localhost:8000/invoice/2',
  'image_link' => null,
  'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.'
]);

```
Notification required
|Option|Type|required|Note|
|-|-|:-:|-|
|`title`|String|YES|-|
|`link`|String|YES|-|
|`image_link`|String|NO|-|
|`description`|String|YES|-|

Listening For Notification
```
Echo.channel(`ladmin`)
    .listen('.notification', (e) => {
        console.log(e.update);
        // Notification handle
    });
```
