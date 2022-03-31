# Module

This package is inspired by [nwidart/laravel-modules](https://github.com/nWidart/laravel-modules) with slight modifications to suit [hexters/ladmin](https://github.com/hexters/ladmin)

### Create Module
Create new module
```bash
$ php artisan module:make Blog
```

You can directly access the admin page via the link below.
```
http://localhost:8000/administrator/blog
```
Open route `Modules/Blog/routes/web.php` file, protect route based on [Menu `gate`](https://github.com/hexters/ladmin/blob/master/doc/menu.md#gates- permission) so that it cannot be accessed directly without the permissions [`Role`](https://github.com/hexters/ladmin/blob/master/doc/menu.md#gate)

## Module Namespace

The namespace doesn't use `App\` anymore but instead becomes `Modules\`, see example below.

```php
namespace Modules\Blog;
```

# Folder structure
```
app/
bootstrap/
config/
Modules/
    |--- Ladmin/
    |--- Blog /
        |--- config/
            |--- module.php
        |--- Console/
            |--- Commands/
        |--- Databases/
            |--- Seeders/
                |--- DatabaseSeeder.php
        |--- Exceptions/
            |--- Http/
                |--- Controllers/
                    |--- Controller.php
                |--- Middleware/
        |--- lang/
            |--- en/
        |--- Models/
        |--- Providers/
            |--- BlogServiceProvider.php
            |--- EventServiceProvider.php
            |--- RouteServiceProvider.php
        |--- Resources/
            |--- css/
                |--- app.css
            |--- js/
                |--- app.js
            |--- sass/
                |--- app.scss
            |--- views/
        |--- routes/
            |--- api.php
            |--- web.php
        |--- app.json
        |--- package.json
        |--- webpack.mix.js
```

### Create Menu
After the module is created, you need to create a menu and register it in the sidebar menu.

To create a menu class, click the link beside to see how to register the menu . [Menu Documentation](https://github.com/hexters/ladmin/blob/master/doc/menu.md)
```bash
$ php artisan module:make-menu PostMenu --module=Blog
```

### Create DataTables
Create a DataTables class, For more information Click the link beside. [DataTables Documentation](https://github.com/hexters/ladmin/blob/master/doc/datatables.md)

```bash
$ php artisan module:make-datatable PostDatatables --module=Blog
```

# Artisan

In addition to the commands above, there are several commands that can be used to help you complete your Laravel project.

### Create Model class
```bash
$ php artisan module:make-model Article --module=Blog
```

### Create Controller class
```bash
$ php artisan module:make-controller ArticleController --module=Blog
```

### Create casting class
```bash
$ php artisan module:make-cast BlogCast --module=Blog
```

### Create channel class
```bash
$ php artisan module:make-channel BlogChannel --module=Blog
```

### Create Command class

For more information click the link beside. [Command Documentation](https://github.com/hexters/ladmin/blob/master/doc/command.md)

```
$ php artisan module:make-command BlogCommand --module=Blog
```

### Create component class

For more information click the link beside. [Component Documentation](https://github.com/hexters/ladmin/blob/master/doc/component.md)

```bash
$ php artisan module:make-component BlogComponent --module=Blog
```

### Create Event class
```bash
$ php artisan module:make-event BlogEvent --module=Blog
```

### Create Exception class
```bash
$ php artisan module:make-exception BlogException --module=Blog
```

### Create Factory class
```bash
$ php artisan module:make-factory BlogFactory --module=Blog
```

### Create job class
```bash
$ php artisan module:make-job BlogJob --module=Blog
```

### Create Listener class
```bash
$ php artisan module:make-listener BlogListener --module=Blog
```

### Create email class
```bash
$ php artisan module:make-mail BlogMail --module=Blog
```

### Create middleware class
```bash
$ php artisan module:make-middleware BlogMiddleware --module=Blog
```

### Create miggration class
```bash
$ php artisan module:make-migration BlogMigration --module=Blog
```

### Create notificaiton class
```bash
$ php artisan module:make-notification BlogNotification --module=Blog
```

### Create Observer class
```bash
$ php artisan module:make-observer BlogObserver --module=Blog
```

### Create Policy class
```bash
$ php artisan module:make-policy BlogPolicy --module=Blog
```

### Create service provider class
```bash
$ php artisan module:make-provider BlogProvider --module=Blog
```

### Create request class
```bash
$ php artisan module:make-request BlogRequest --module=Blog
```

### Create resource class
```bash
$ php artisan module:make-resource BlogResource --module=Blog
```

### Create rule class
```bash
$ php artisan module:make-rule BlogRule --module=Blog
```

### Create scope class
```bash
$ php artisan module:make-scope BlogScope --module=Blog
```
### Create Searchable class
For more information click the link beside. [Component Documentation](https://github.com/hexters/ladmin/blob/master/doc/global-search.md)
```bash
$ php artisan module:make-search ArticleSearch --module=Blog
```

### Create seeder class
```bash
$ php artisan module:make-seeder BlogSeeder --module=Blog
```

### Execute seeder class

Seed the given module, or without an argument, seed all modules

```bash
$ php artisan module:seed Blog
```
### Publish your module

For more information click the link beside. [Component Documentation](https://github.com/hexters/ladmin/blob/master/doc/component.md)
```bash
$ php artisan ladmin:publish Blog
```


# Artisan Options

Anda juga dapat menggunakan opsi opsi seperti yang ada pada laravel, misalnya.

Contoh opsi pada pembuatan model class
```bash
$ php artisan module:make-model Article -m --module=Blog
```

Contoh opsi pada pembuatan controller class
```bash
$ php artisan module:make-controller PostController --invokable --module=Blog
```

Dan masih banyak lagi opsi-opsi yang lainnya.