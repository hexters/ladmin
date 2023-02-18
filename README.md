# L-admin v3 (HMVC)

[![Latest Stable Version](https://poser.pugx.org/hexters/ladmin/v/stable)](https://packagist.org/packages/hexters/ladmin)
[![Total Downloads](https://poser.pugx.org/hexters/ladmin/downloads)](https://packagist.org/packages/hexters/ladmin)
[![License](https://poser.pugx.org/hexters/ladmin/license)](https://packagist.org/packages/hexters/ladmin)

**[L-Admin](https://github.com/hexters/ladmin)** is a Laravel administration package that allows web developers to quickly create an admin panel for their website. The package includes features such as user management, access control management, task management, file management, email management, and many more. The package is designed to save time and effort in building an admin panel and allows developers to focus on building the core features of their web application.

![Dashboard](https://raw.githubusercontent.com/hexters/assets/main/ladmin/v3/captures/home-page.png)

# 🏷️ Laravel Version

|Version|Laravel|
|:-:|:-:|
| [v1.0.x](https://github.com/hexters/ladmin/blob/v1.0.3/readme.md) | 7.x |
| [v1.8.*](https://github.com/hexters/ladmin/tree/v1.8.0)| 8.x |
|[v2.*](https://github.com/hexters/ladmin/tree/2.1.0)|9.x|
|[v3.*](https://github.com/hexters/ladmin/blob/master/README.md)|10.x|

# 🚀 Quickstart

Follow the steps below to get started faster! Add the repository by running the command below.

```bash
composer require hexters/ladmin
```

Follow the installation to start build awesome apps.
```bash
php artisan ladmin:install --and=ladmin:setup
```

Run migrate and seed, to install ladmin database tables
```bash
php artisan migrate --seed
```

Installation is complete, please access `http://localhost:8000/administrator`

![Login Page](https://raw.githubusercontent.com/hexters/assets/main/ladmin/v3/captures/login-page.png)


# Customization Color and Assets

To change the ladmin style, you just need to run `Vite`, before that you should install nodejs modules in `Modules/Ladmin` folder. Follow this steps below.

```bash

// Install node modules 

cd Modules/Ladmin && npm install

// Go back to directory root project and run vitejs

npm run dev

```
You can start changing javascript and css.

# 🗂️ Custom Namespaces

To call `view`, `language`, `config`, and `component` file, you need to add the prefix of module's name e.g `blog`, see example below.

### Calling View:
```php
  view('blog::article.index');
```

### Calling Lang:
```php
  __('blog::error.auth.message');

  trans('blog::error.auth.message');

  Lang::get('blog::error.auth.message');
```

### Calling Config:
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
