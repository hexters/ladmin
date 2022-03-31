# Custom Style

If you want to change the style, or add a script to the **Ladmin** module, you can start by going to the **Ladmin** directory.

```bash
$ cd Modules/Ladmin && npm install
```

## Change Accent Color

You can also change the accent color of the **Ladmin** template, open the file `Modules/Ladmin/Resources/scss/_variable.scss` and after that change the variable `$primary` with the color you want.
```scss
. . .

$primary:       green;

. . .
```

And rebuild the mix assets.
```bash
// in Modules/Ladmin

$ npm run dev

// ---- OR-----

$ npm run prod

```

![Green Dashboard](https://github.com/hexters/assets/blob/main/ladmin/v2/captures/green-dashboard.png?raw=true)

You can also add some feature by add other package, for example adding `vue`, `Laravel Echo`, etc.