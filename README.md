## Ladmin (Laravel Admin)

[![Latest Stable Version](https://poser.pugx.org/hexters/ladmin/v/stable)](https://packagist.org/packages/hexters/ladmin)
[![Total Downloads](https://poser.pugx.org/hexters/ladmin/downloads)](https://packagist.org/packages/hexters/ladmin)
[![License](https://poser.pugx.org/hexters/ladmin/license)](https://packagist.org/packages/hexters/ladmin)


Make an Administrator page in 5 minutes

![Example Image](https://github.com/hexters/ladmin/blob/master/examples/user.png?raw=true)

## Index 
- [Laravel Version](https://github.com/hexters/ladmin#laravel-version)
- [Note](https://github.com/hexters/ladmin#note)
- [Installation](https://github.com/hexters/ladmin#installation)
- [Manage Sidebar & Top Menu](https://github.com/hexters/ladmin#manage-sidebar--top-menu)
- [Create Datatables server](https://github.com/hexters/ladmin#create-datatables-server)
- [Role & Permission](https://github.com/hexters/ladmin#role--permission)
- [User Activity](https://github.com/hexters/ladmin#user-activity)
- [Blade Layout](https://github.com/hexters/ladmin#blade-layout)
- [Blade Components](https://github.com/hexters/ladmin/blob/master/readmes/components.md#blade-components)
  - [Card Component](https://github.com/hexters/ladmin/blob/master/readmes/components.md#card-component)
  - [Form Group Componenet](https://github.com/hexters/ladmin/blob/master/readmes/components.md#form-group-componenet)
- [Icons](https://github.com/hexters/ladmin#icons)
- [Custom Style](https://github.com/hexters/ladmin#custom-style)
- [Notification](https://github.com/hexters/ladmin#notification)
- [Ladmin Plugins](https://github.com/hexters/ladmin/blob/master/readmes/plugins.md)


## Laravel Version

|Version|Laravel|
|:-:|:-:|
| [v1.0.x](https://github.com/hexters/ladmin/blob/master/versions/1.0.md) | 7.x |
| Last version | 8.x |

## Note
Before using this package you must already have a login page or route login `route('login')` for your members, you can use [laravel/breeze](https://github.com/laravel/breeze), [larave/ui](https://github.com/laravel/ui) or [laravel jetstream](https://jetstream.laravel.com/1.x/introduction.html).

*For member pages, you should use a different guard from admin or vice versa.*

![Scheme](https://github.com/hexters/ladmin/blob/master/examples/scheme.png?raw=true)

## Installation
You can install this package via composer:
```
$ composer require hexters/ladmin
```

Add this trait to your user model
```php
. . .
use Hexters\Ladmin\LadminTrait;

class User extends Authenticatable {

  use Notifiable, LadminTrait;

  . . .
```

Publish asset and system package
```bash

$ php artisan vendor:publish --tag=assets --force
$ php artisan vendor:publish --tag=core

```

Attach role to user admin with database seed or other
```php
. . .

  $role = \App\Models\Role::first();
  \App\Models\User::factory(10)->create()
    ->each(function($user) use ($role) {
      $user->roles()->sync([$role->id]);
    });

. . .
```
Ladmin need the database notification. see the documentation [Database Notifications](https://laravel.com/docs/8.x/notifications#database-notifications)

```bash
$ php artisan notifications:table

```

Migrate database
```bash

$ php artisan migrate --seed
```

Add Ladmin route to your route project `routes/web.php`
```php
. . .

use Illuminate\Support\Facades\Route;
use Hexters\Ladmin\Routes\Ladmin;

. . .

Ladmin::route(function() {

    Route::resource('/withdrawal', WithdrawalController::class); // Example

});

. . .

```

Installation finish, you can Access admin page in this link below.

```
http://localhost:8000/administrator
```

## Manage Sidebar & Top Menu
To add a menu open `app/Menus/sidebar.php` file and `top_right.php`

## Create Datatables server
Create datatables server to handle your list of data
```bash

$ php artisan make:datatables UserDataTables  --model=User

```
Example below
```php
. . .

use App\DataTables\UserDataTables;

class UserController extends Controller {

  . . .

  public function index() { 

    . . .

    return UserDataTables::view();

    // OR custom view and custom data

    return UserDataTables::view('your.custom.view', [ 
      /**
       * You can catch this data form blade or UserDatatables class 
       * via static property `self$data`
       */
      'foo' => 'bar'
    ]);

  }

. . .

```

## Role & Permission
Protect your module via Controller
```php

. . . 
class UserController extends Controller {

  . . .

  public function index() {

    ladmin()->allow(['administrator.account.admin.index']) // Call the gates based on menu `app/Menus/sidebar.php`

    . . .

    
```

For an other you can use `@can()` from blade or `auth()->user()->can()` more [Gates](https://laravel.com/docs/8.x/authorization#gates)

![Example Image](https://github.com/hexters/ladmin/blob/master/examples/gates.png?raw=true)

## User Activity

Add this trait `Hexters\Ladmin\LadminLogable` to all the models you want to monitor. Inspired by [haruncpi/laravel-user-activity](https://github.com/haruncpi/laravel-user-activity)
```php

. . .

use Hexters\Ladmin\LadminLogable;

class Role extends Model {
    
    use HasFactory, LadminLogable;

. . .

```

![Example Image](https://github.com/hexters/ladmin/blob/master/examples/activity.png?raw=true)

## System Log

![Example Image](https://github.com/hexters/ladmin/blob/master/examples/log.png?raw=true)

## Blade Layout
Ladmin layout

```html

  <x-ladmin-layout>
    <x-slot name="title">Title Page</x-slot>
    <x-slot name="buttons">
      {-- Top Buttons --}      
    </x-slot>

    {-- Your content here --}    

  </x-ladmin-layout>
  
```

![Example Image](https://github.com/hexters/ladmin/blob/master/examples/login.png?raw=true)

### Datatables Render
If you have a custom view for render data from [Datatables server](https://github.com/hexters/ladmin#create-datatables-server) you should call this component to render your table
```html
<x-ladmin-datatables :fields="$fields" :options="$options" />
```
#### Attributes
|Attribute|value|require|
|-|-|-|
|`fields`|don't be changed the value should be still `$fields`|YES|
|`options`|don't be changed the value should be still `$options`|YES|

## Icons 
You can user [Fontawesome](https://fontawesome.com) or SVG file in `resources/assets/icons`, svg file retrieved from site [Heroicons](https://heroicons.com)
```php
  ladmin()->icon('fas fa-user')

  // OR

  ladmin()->icon('user')

  // OR 

  ladmin()->icon('somefolder.customicon') // resources/assets/icons/somefolder/customicon.svg

```

## Custom Style
Install node modules
```javascript
$ npm i jquery popper.js bootstrap @fortawesome/fontawesome-free datatables.net@1.10.21 datatables.net-bs4@1.10.21 vue --save

// OR

$ yarn add jquery popper.js bootstrap @fortawesome/fontawesome-free datatables.net@1.10.21 datatables.net-bs4@1.10.21 vue

```

Add this code to your  `webpack.mix.js` file
```javascript
mix.js('resources/js/ladmin/app.js', 'public/js/ladmin/app.js')
   .sass('resources/sass/ladmin/app.scss', 'public/css/ladmin/app.css');
```

## Custom Avatar 
By default admin uses gravatar. If you want to change it, add the `avatar_url` field to your` users` table and it must be a URL value.

Call avatar url below
```php
  $user->gravatar_url
  // out: gravatar url / your custom url
```

## Notification

By default notification has activated, you can disable notification with set value to `false`

```php
. . .

'notification' => false

. . .
```

Send notification
```php
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

### Listening For Notifications

Notifications will broadcast on a private channel formatted using a {notifiable}.{id} convention. View complete [Documentation](https://laravel.com/docs/8.x/notifications#listening-for-notifications)

```javascript

  // Change App.Models.User bas on config('ladmin.user')

  Echo.private('App.Models.User.' + userId)
    .notification((notification) => {
        console.log(notification.type);
    });
```
![Example Image](https://github.com/hexters/ladmin/blob/master/examples/notification.png?raw=true)

## Options
You can store the option for your application with the ladmin option, 
### Create or Update option
Data type of value is `String`, `Number` and `Array`
```php
  ladmin()->update_option('my-option', ['foo', 'bar', 'baz']);
  // out: boolean
```

### Get Option Value
```php
  ladmin()->get_option('my-option');
  // out: Array ['foo', 'bar', 'baz']
```

### Delete Option
```php
ladmin()->delete_option('my-option');
// out: boolean
```