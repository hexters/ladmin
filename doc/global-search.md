# Global Search

![](https://github.com/hexters/assets/blob/main/ladmin/v2/captures/global-search.png?raw=true)

Let's start by creating a new class named `ArticleSearch`
```bash
$ php artisan module:make-search ArticleSearch --module=Blog
```

Then the class will be saved as `Modules/Blog/Searches/ArticleSearch.php`, then `extends` the class into model class `Modules\Blog\Models\Article`, see example below.

```php

namespace Modules\Blog\Models;

. . 

use Illuminate\Database\Eloquent\Model;
use Modules\Blog\Searches\ArticleSearch;

class Article extends ArticleSearch
{

. . .

```

If the class is already extended then all database activities such as `create`, `update`, `delete` will be read, and saved into index search. Ladmin uses [laravel/scout](https://laravel.com/docs/9.x/scout) as search engine and `collection` as default `driver`.

# Gate & Permissions

The data will not appear if it does not have permissions on the Menu class.

```php
/**
 * Set permission access
 *
 * @return array:null
 */
protected function searchGates()
{
    return ['article.index', 'article.can.search'];
}
```

# Grouping

Search data will be displayed based on data groups, to make it easier to search.
```php
/**
 * Group name 
 *
 * @return string
 */
protected function searchGropuName()
{
    return 'Article';
}
```

# Title Search & Description

You can determine the title and description you want to display later.

```php
/**
 * Title search
 *
 * @return string
 */
protected function searchTitle()
{
    return $this->title;
}

. . .

/**
 * Description search
 *
 * @return string
 */
protected function searchDescription()
{
    return $this->body;
}

```

# Link Details

You can set detail link to redirect search result to details page

```php
/**
 * Set detail page
 *
 * @return string
 */
protected function searchLinkDetails()
{
    return route('ladmin.article.show', $this->slug);
}
```

# Link Target

You can also change the target of the link like `_self`, `_blank`
```php
/**
 * Link target url
 *
 * @return string
 */
protected function linkTarget()
{
    return '_blank';
}
```

# Custom View

If you need to display other data such as images, and other information, you can add a view method.
```php
/**
 * Custom list view
 *
 * @param \Hexters\Ladmin\Models\LadminGroupSearch $data
 * @return \Illuminate\Support\Facades\Blade
 */
public function view($data)
{
    return view('blog::article.search.custom-list-tile', [
        'data' => $data
    ]);
}
```

# Custom Data

You can also add data such an array to the search.
```php
/**
 * Add custom data
 *
 * @return array
 */
protected function data(): array
{
    return [
        'image' => $this->thumbnail_url,
        'author' => $this->user->name,
    ];
}
```

# Import Data Search

You can adopt all `Article` data manually by follow example below.

```php
use Modules\Blog\Models\Article;

. . .

(new Article)->searchInport()
```

# Flush Data Search

You can delete all `Article` data by this way.

```php
use Modules\Blog\Models\Article;

. . .

(new Article)->searchFlush()
```

# Config Scout

If you want to change the `driver` of the search engine, you can edit in the `config/scout.php` file.