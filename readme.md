## Ladmin (Laravel Admin)

[![Latest Stable Version](https://poser.pugx.org/hexters/ladmin/v/stable)](https://packagist.org/packages/hexters/ladmin)
[![Total Downloads](https://poser.pugx.org/hexters/ladmin/downloads)](https://packagist.org/packages/hexters/ladmin)
[![License](https://poser.pugx.org/hexters/ladmin/license)](https://packagist.org/packages/hexters/ladmin)


Make an Administrator page in 5 minutes

![Example Image](https://github.com/hexters/ladmin/blob/master/user.png?raw=true)

## Laravel Version

|Version|Laravel|
|:-:|:-:|
| [v1.0.x](https://github.com/hexters/ladmin/blob/master/versions/1.0.md) | 7.x |
| Last version | 8.x |

## Package Requirement
- [DataTables](https://github.com/yajra/laravel-datatables)

## Suggestion
Before using this package you must already have a login page or route login `route('login')` for your members, you can use [laravel/breeze](https://github.com/laravel/breeze), [larave/ui](https://github.com/laravel/ui) or [laravel jetstream](https://jetstream.laravel.com/1.x/introduction.html).

*For member pages, you should use a different guard from admin or vice versa.*

![Scheme](https://github.com/hexters/ladmin/blob/master/scheme.png?raw=true)

## Installation
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

Migrate database
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

## Sidebar Menu
To add a menu open `app/Menus/sidebar.php` file and `top_right.php`

## Create Datatables server
Create datatables server to handle your list data, [click here](https://github.com/hexters/ladmin#role--permission) for example uses
```
$ php artisan make:datatables UserDataTables  --model=User

```

## Role & Permission
Protect your module via Controller
```
. . .

use App\DataTables\UserDataTables;  // Datatables Server

. . . 
class UserController {

. . .

  public function index() {
    ladmin()->allow(['administrator.account.admin.index']) // Call the gates based on menu `app/Menus/sidebar.php`

    . . .

    return UserDataTables::view();

    // OR custom view and custom data

    return UserDataTables::view('your.custom.view', [ 'foo' => 'bar' ]);
  }

}
```

For an other you can use `@can()` from blade or `auth()->user()->can()` more [Gates](https://laravel.com/docs/8.x/authorization#gates)

![Example Image](https://github.com/hexters/ladmin/blob/master/gates.png?raw=true)

## User Activity

Add this trait `Hexters\Ladmin\LadminLogable` to all the models you want to monitor. Example below
```
. . .

use Hexters\Ladmin\LadminLogable;

class Role extends Model {
    
    use HasFactory, LadminLogable;

. . .

```

![Example Image](https://github.com/hexters/ladmin/blob/master/logable.png?raw=true)

## Blade
Ladmin layout in `resources/views/vendor/ladmin`

Insert your module content to ladmin layout

```

  <x-ladmin-layout>
    <x-slot name="title">Title Page</x-slot>

    {-- Your content here --}    

  </x-ladmin-layout>
  
```

And you can Access admin page in this link below.
```
http://localhost:8000/administrator
```
![Example Image](https://github.com/hexters/ladmin/blob/master/login.png?raw=true)

## Blade Components

### Datatables Render
If you have a custom view for render data from [Datatables server](https://github.com/hexters/ladmin#create-datatables-server) you should call this component to render your table
```
<x-ladmin-datatables :fields="$fields" :options="$options" />
```
#### Attributes
|Attribute|value|require|
|-|-|-|
|`fields`|don't be changed the value should be still `$fields`|YES|
|`options`|don't be changed the value should be still `$options`|YES|

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

## Icons 
You can user [Fontawesome](https://fontawesome.com) or SVG file in `resources/assets/icons`, svg file retrieved from site [Heroicons](https://heroicons.com)
```
  ladmin()->icon('fas fa-user')

  // OR

  ladmin()->icon('user')

  // OR 

  ladmin()->icon('somefolder.customicon') // resources/assets/icons/somefolder/customicon.svg

```

## Custom Style
Install node modules
```
$ npm i jquery popper.js bootstrap @fortawesome/fontawesome-free datatables.net@1.10.21 datatables.net-bs4@1.10.21 --save

// OR

$ yarn add jquery popper.js bootstrap @fortawesome/fontawesome-free datatables.net@1.10.21 datatables.net-bs4@1.10.21

```

Add this code to your  `webpack.mix.js` file
```
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
ladmin()
  ->notification()
    ->setTitle('new Invoice')
    ->setLink('http://project.test/invoice/31eb6d58-3622-42a4-9206-d36e7a8d6c06')
    ->setDescription('Pay invoice #123455')
    ->setImageLink('http://porject.test/icon-invoice.ong') // optional
    ->setGates(['administrator.accounting', 'administrator.owner']) // optional
  ->send()

```
Notification required
|Option|Type|required|Note|
|-|-|:-:|-|
|`setTitle`|String|YES|-|
|`setLink`|String|YES|-|
|`setImageLink`|String|NO|-|
|`setDescription`|String|YES|-|
|`setGates`|Array|NO| default all gates |

Listen with [Larave Echo Server](https://github.com/tlaverdure/laravel-echo-server)
```
Echo.channel(`ladmin`)
    .listen('.notification', (e) => {
        console.log(e.update);
        // Notification handle
    });
```
![Example Image](https://github.com/hexters/ladmin/blob/master/notification.png?raw=true)
