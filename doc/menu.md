# Menu 

See the following example to create new menu.
```bash
$ php artisan module:make-menu PostMenu --module=Blog
```

If it was created successfully then a new component's file will be saved as `Modules/Blog/Menus/PostMenu.php` then add the menu that was created to `Sidebar` class in `App/Menu/Sidebar.php`

```php
. . .

use Modules\Ladmin\Menus\System;
use Modules\Blog\Menus\PostMenu;

. . .

return [

    PostMenu::class,

    Account::class,

    . . .

```
# Submenu 

To create a submenu you just need to create a menu class as above, and register it in the `submenu()` method which will be served as the parent.

For example, we will create a submenu on the menu class `Modules\Blog\Menus\PostMenu`, create a menu class first.

Create article submenu
```bash
$ php artisan module:make-menu ArticleMenu --module=Blog
```
Creare comment submenu
```bash
$ php artisan module:make-menu CommentMenu --module=Blog
```

Register in the `Modules\Blog\Menus\PostMenu` class, see the example below.

```php
. . .

namespace Modules\Blog\Menus;

use Hexters\Ladmin\Menus\Gate;
use Hexters\Ladmin\Supports\BaseMenu;

use Modules\Blog\Menus\CommentMenu;
use Modules\Blog\Menus\ArticleMenu;

class PostMenu extends BaseMenu
{

    /**
     * Gate name for accessing module
     *
     * @var string
     */
    protected $gate = 'blog.post.index';

    /**
     * Name of menu
     *
     * @var string
     */
    protected $name = 'Post';

    . . .

    /**
     * Other menus
     *
     * @return void
     */
    protected function submenus()
    {
        return [
            ArticleMenu::class, #<-- tambahkan menu di sini

            CommentMenu::class, #<-- tambahkan menu di sini
        ];
    }

```

If you add a submenu automatically the link in the **Post menu** will not work.

We recommend you to not use icons for submenus.
```php
/**
     * Font icons 
     *
     * @var string
     */
    protected $icon = null; // fontawesome
```

Assign permission at role `Super Admin` before that

![Assing](https://github.com/hexters/assets/blob/main/ladmin/v2/captures/assign-submenu-permission.png?raw=true)

Result after assign permission

![Submenu](https://github.com/hexters/assets/blob/main/ladmin/v2/captures/submenu.png?raw=true)

# Route Menu & Link Url

By default the prefix route for **Ladmin Pakcage** is `ladmin.` not `administrator.` like the previous version. but the url prefix can still be changed in the `config/ladmin.php` file
```php
'prefix' => env('LADMIN_PREFIX_PAGE', 'administrator'),
```

You can call the route name without the `route()` helper, but instead with an array like the previous version. see example below.

```php
/**
 * Route name
 *
 * @return Array|string|null
 * @example ['route.name', ['uuid', 'foo' => 'bar']]
 */
protected function route()
{
    return ['ladmin.article.index'];
}
```

You can also add parameters, for example.
```php
/**
 * Route name
 *
 * @return Array|string|null
 * @example ['route.name', ['uuid', 'foo' => 'bar']]
 */
protected function route()
{
    return ['ladmin.article.index', ['status' => 'draft']];
}
```

Then the output will be like this
```txt
http://localhost:8000/administrator/article?status=draft
```

In addition to the route you can also add a regular url, for example

```php
/**
 * Route name
 *
 * @return Array|string|null
 * @example ['route.name', ['uuid', 'foo' => 'bar']]
 */
protected function route()
{
    return 'https://laravel-news.com';
}
```
You can make it null as the first menu class was created.

You can also add target attributes like `_self`, `_blank`, etc. by default every menu has a target method `_self`, see example.
```php
/**
 * Menu target
 *
 * @return void
 */
protected function target() {
    
    return '_blank';

}
```

# Gates & Permission

All permissions to menus or events in the **Ladmin Package** must be specified, you can specify **GATE** on each menu that has been created. see the example below

## Gate
```php
namespace Modules\Blog\Menus;

. . .

class ArticleMenu extends BaseMenu
{

    /**
     * Gate name for accessing module
     *
     * @var string
     */
    protected $gate = 'article.index';
```

The gate above will be used to provide access to **Module**

![Role Article](https://github.com/hexters/assets/blob/main/ladmin/v2/captures/menu-gate.png?raw=true)

Protect the `controller` by adding the function below to all methods `index`,`create`,`store`, etc based on the specified gate. So that the page cannot be accessed directly without permission. See the example below.
```php
/**
 * Display a listing of the resource.
 *
 * @return \Illuminate\Http\Response
 */
public function index()
{
    ladmin()->allows(['article.index']);

    return view('blog::article.index');
}
```

## Permission

In addition to the gate you also have to specify permissions for each event and permissions on the module to be created
```php
/**
 * Other gates
 *
 * @return Array(Hexters\Ladmin\Menus\Gate)
 */
protected function gates()
{
    return [
        new Gate(gate: 'article.can.write', title: 'Write Article', description: 'User can write Article'),
        new Gate(gate: 'article.can.review', title: 'Review Article', description: 'User can review Article'),
    ];
}
```

The above permissions will give access to every event in the module that is being created.

![Permission](https://github.com/hexters/assets/blob/main/ladmin/v2/captures/menu-permission.png?raw=true)

Also add the function below for each event to be executed, see example
```php
/**
 * Store a newly created resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return \Illuminate\Http\Response
 */
public function store(Request $request)
{
    ladmin()->allows(['article.can.write']);

    return $request->createArticle();
}
```

And also give permission to the button event on the blade, see the example below.
```html
@can(['article.can.write'])
    <a href="{{ route('ladmin.article.create') }}">+ Add Article</a>
@endcan
```

In addition to the `ladmin()->allows()` function you can also use the `auth()->user()->can()` function, click the [Documentation](https://laravel.com/docs/9.x/authorization#via-blade-templates) to see more details [Documentation](https://laravel.com/docs/9.x/authorization#via-blade-templates)

# Active Menu

You may use the * character as a wildcard when utilizing this method:

```php
/**
 * Status active menu
 *
 * @var string
 */
protected $isActive = 'article*';
```
# Badge

You can add badges to the sidebar menu. first add `ID` on menu class.

```php
/**
 * Menu ID
 *
 * @var string
 */
protected $id = 'menu-account';
```

Call the javascript function below.

```javascript
Ladmin.addMenuBadge('menu-account', 4)
```

![Menu Badge](https://github.com/hexters/assets/blob/main/ladmin/v2/captures/menu-badge.png?raw=true)

# Menu Divider

You can give a separator on the sidebar menu by implementing the `\Hexters\Ladmin\Contracts\MenuDivider` interface, to your menu class, for example I have a menu with the name `BlogDivider` class. see example below.

### Divider Line

![Line Divider](https://github.com/hexters/assets/blob/main/ladmin/v2/captures/divider-line.png?raw=true)

To create a border in the form of a line, you just simply make the name `null` or empty.

```php
<?php

. . .

use Hexters\Ladmin\Contracts\MenuDivider;

class BlogDivider extends BaseMenu implements MenuDivider
{

    /**
     * Gate name for accessing module
     *
     * @var string
     */
    protected $gate = 'blog.divider';

    /**
     * Name of menu
     *
     * @var string
     */
    protected $name = '';
```

## Divider With Title

![Title Divider](https://github.com/hexters/assets/blob/main/ladmin/v2/captures/divider-text.png?raw=true)

Otherwise if you want to create a menu delimiter with a title, fill in the property `$name`

```php
<?php

. . .

use Hexters\Ladmin\Contracts\MenuDivider;

class BlogDivider extends BaseMenu implements MenuDivider
{

    /**
     * Gate name for accessing module
     *
     * @var string
     */
    protected $gate = 'blog.divider';

    /**
     * Name of menu
     *
     * @var string
     */
    protected $name = 'Journalist';
```
