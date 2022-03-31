# Route

Each module created already contains two route files `Module\Blog\routes\web.php` and `Module\Blog\routes\api.php`.

```php

use Illuminate\Support\Facades\Route;
use Modules\Blog\Http\Controllers\ArticleController;

. . .

ladmin()->route(function() {

    Route::group(['prefix' => 'blog', 'as' => 'blog.'], function () {
        Route::get('/', function () {
            return 'Welcome to Blog Module';
        })->name('home');
    });

    /**
     * All routes listed here are accessible
     * on the Administrator page
     * http://localhost:8000/administrator/article
     */
    
    Route::resource('article', ArticleController::class);

});


/**
 * All routes listed here, can be accessed
 * outside the Administrator page
 * * http://localhost:8000/blog
 */
Route::group(['prefix' => 'blog', 'as' => 'blog.'], function () {
    Route::get('/', function () {
        return 'Welcome to Blog Module';
    })->name('blog');
});

```

All routes will be converted into a **ladmin** module must be registered in the route helper `ladmin()->route( Closure )` so that the module can be accessed.