# 🪄 Laravel Admin (Ladmin v2)

[![Latest Stable Version](https://poser.pugx.org/hexters/ladmin/v/stable)](https://packagist.org/packages/hexters/ladmin)
[![Total Downloads](https://poser.pugx.org/hexters/ladmin/downloads)](https://packagist.org/packages/hexters/ladmin)
[![License](https://poser.pugx.org/hexters/ladmin/license)](https://packagist.org/packages/hexters/ladmin)

The magic of creating an Administrator page.

![Dashboard](https://github.com/hexters/assets/blob/main/ladmin/v2/captures/dashboard.png?raw=true)

# 🏷️ Laravel Version

|Version|Laravel|
|:-:|:-:|
| [v1.0.x](https://github.com/hexters/ladmin/blob/v1.0.3/readme.md) | 7.x |
| [v1.8.*](https://github.com/hexters/ladmin/blob/v1.8.3/readme.md)| 8.x |
|v2.*|9.x|

Schema for apps that have a login page for members. You can use [laravel/breeze](https://github.com/laravel/breeze), [larave/ui](https://github.com/laravel/ui), [laravel jetstream](https://jetstream.laravel.com/1.x/introduction.html), etc.

![Scheme Member](https://github.com/hexters/assets/blob/main/ladmin/v2/captures/scheme.png?raw=true)
# ℹ️ What's New ?

Now **Ladmin** comes with the concept of **HMVC** (Hierarchical Model View Controller) . [Click here for more details.](https://github.com/hexters/ladmin/wiki/Module)

```bash
$ php artisan module:make Blog
```

# 🚀 Quickstart

Follow the steps below to get started faster! Add the repository by running the command below.

```bash
$ composer require hexters/ladmin
```

Follow the installation with the `--with-admin-table` option.
```
$ php artisan ladmin:install --with-admin-table
```

Run migrate and seed, to install ladmin database tables
```bash
$ php artisan migrate --seed
```

And run seeder ladmin module, to assign role and permission to existing user.
```bash
$ php artisan module:seed Ladmin
```

Installation is complete, please access `http://localhost:8000/administrator`

![Login Page](https://github.com/hexters/assets/blob/main/ladmin/v2/captures/login-page.png?raw=true)


# 🗂️ Custom Namespaces

To call `view`, `language`, `config`, and `component` file, you need to add the prefix of module's name eg `blog`, see example below.

Calling View:
```php
  view('blog::article.index');
```

Calling Lang:
```php
  __('blog::error.auth.message');

  trans('blog::error.auth.message');

  Lang::get('blog::error.auth.message');
```

Calling Config:
```php
  config('blog.name')
```

For component view, if you have component named `\Modules\Blog\View\Components\Input` class, then the way to call it by running.
```html
  <x-blog-input />
```

# 🌇 Layout Templating

Follow the documentation to view complete `slots` and `stacks` in layout component [Documentation Layout](https://github.com/hexters/ladmin/wiki/Template-Layout)

```html
<x-ladmin-auth-layout>

  <x-slot name="title">Page Title</x-slot>

  <!-- Follow guest layout for slots & stacks -->
  
</x-ladmin-auth-layout>
```

# 👓 Ladmin Awesome
Get modules & template collections in [Ladmin Awesome](https://github.com/hexters/ladmin-awesome)

# 📖 Documentation
View complete [Documentation here](https://github.com/hexters/ladmin/wiki)
