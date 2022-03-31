# Model

Let's start by creating a model
```bash
$ php artisan module:make-model Article --module=Blog
```

After successfully creating the model, the file will be saved as `Modules/Blog/Models/Article.php` folder, see the sample contents below.
```php 

namespace Modules\Blog\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected static function newFactory()
    {
        return \Modules\Blog\Databases\Factories\ArticleFactory::new();
    }
}
```

By default the factory class `\Modules\Blog\Databases\Factories\ArticleFactory` will be created, but if you don't want to create it have it then the `newFactory()` method can be removed so that it becomes as below.

```php 

namespace Modules\Blog\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
}
```