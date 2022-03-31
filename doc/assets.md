# Compiling Assets (Laravel Mix)

When you create a new module it also create assets for CSS/JS and the `webpack.mix.js` configuration file.

Change directory to the module path:

```bash
$ cd Modules/Blog
```

The default `package.json` file includes everything you need to get started. You may install the dependencies it references by running:
```bash
$ npm install
```

# Running Mix

Mix is a configuration layer on top of Webpack, so to run your Mix tasks you only need to execute one of the NPM scripts that is included with the default **Ladmin** `package.json` file

```bash
// Run all Mix tasks...
$ npm run dev

// Run all Mix tasks and minify output...
$ npm run production
```

After generating the versioned file, you won't know the exact file name. So, you should use Laravel's global mix function within your views to load the appropriately hashed asset. The mix function will automatically determine the current name of the hashed file:
```html
<link rel="stylesheet" href="{{ mix('css/blog.css') }}">

<script src="{{ mix('js/blog.js') }}"></script>
```

For more info on Laravel Mix view the documentation here: [https://laravel.com/docs/mix](https://laravel.com/docs/mix)