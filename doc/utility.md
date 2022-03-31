# Utility

## Get Version

Get **Ladmin Pacakge** version

```php
ladmin()->version()
```

## Get Admin Class

Get the user class that has been set in the config file.

```php
ladmin()->admin()

#----- OR -----

ladmin()->user()

```
# Route

All routes that enter the ladmin module, must be in this function.

```php
ladmin()->route( function() {
    /**
     * All routes listed here are accessible
     * on the Administrator page
     * http://localhost:8000/administrator/article
     */
});

/**
 * All routes listed here, can be accessed
 * outside the Administrator page
 * * http://localhost:8000/blog
 */


```

# Indicator Back Page

![Button Back](https://github.com/hexters/assets/blob/main/ladmin/v2/captures/button-back.png?raw=true)

To display the back button on the page, it is must add a back parameter in each url such as
```php
route('ladmin.blog.show', ['uuid', 'back' => 'http://url-target.test'])
```

You can also write it like below.

```php
ladmin()->back( ? Array )
```
If in `route` it will be like below.
```php
route('ladmin.blog.show', ladmin()->back(['uuid', 'page' => 1]))
```

Then the output of the function can be seen below.
```
http://localhost:8000/blog/uuid-uuid-uuid?page=1&back=http://current-url.test
```

# Access & Permission

Inside each controller it is necessary to add the below function, to give access by Role to each admin user.
```php
ladmin()->allows(['name.of.gate.in.menu.class'])
```

For example in `controller` `create` can be seen below.
```php
/**
 * Show the form for creating a new resource.
 *
 * @return \Illuminate\Http\Response
 */
public function create()
{
    ladmin()->allows(['article.can.create']);

    return view('blog::article.create');
}
```

# Helpers

The function below serves to retrieve the path of each module.

```php
module_path('Blog')
```

# Traits

If you use uuid in this project, you can use the provided trait, please add it to each model that has the uuid attribute.

```php

. . .

use Illuminate\Database\Eloquent\Model;
use Hexters\Ladmin\UuidGenerator;

. . . 

class Article extends Model
{
    use HasFactory, UuidGenerator;

    . . .

```