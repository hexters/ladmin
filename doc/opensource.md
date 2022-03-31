# Make Money or Make it Open Source

You can sell the modules that you have created on several PHP Software sales provider platforms such as [`https://ppmarket.org`](https://ppmarket.org/developers), [`https://packagist.com`](https://packagist.com/) or others. You can also make it Open Source by uploading your pakcage at [`https://packagist.org`](https://packagist.org/)

Start by publishing the module that has been created by running the command below.

```bash
$ php artisan module:publish Blog
```
> **Note:** before publishing a module, you should first delete the `node_modules` folder if it exists.

You are asked to fill in some information for the package to be created, such as Package name, Author, license, etc.

If all the information has been filled in, the package will be created and stored in the `ladmin-packages/` folder. If there is a package that you need, just go to the folder you created, see the example below.

```bash
$ cd ladmin-packages/hexters/blog

// ------ AND THEN ------

$ composer require laravel/horizon

```

> **Note:** please edit the `README.md` file as an additional information for the package you want to share

## Upload To Git Repository

Upload your package to [github](https://github.com) or [gitlab](https://gitlab.com/).
> **Note:** if you want to sell it, the repository must be `private`

## Selling

You can sell it at [`https://ppmarket.org`](https://ppmarket.org/developers), or at [`https://packagist.com`](https://packagist.com). You can start by registering and [uploading](https://ppmarket.org/member/package/create) your package by sending a link to your `private` github or gitlab repository.

## Make it Open Source
You can also share your packages for free on [`https://packagist.org`](https://packagist.org) by sending a link to your `public` github repository.

# File Structure
```html
    |--- app/
    |--- bootstrap/
    |--- config/
    |--- ladmin-packages/
        |--- hexters/
            |--- blog/
                |--- modules/
                    |--- Blog/
                        |--- **
                |--- src/
                    |--- BlogServiceProvider.php
                |--- composer.json
                |--- README.md

```

