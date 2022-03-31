# Component View

This is how to create a new component.
```bash
$ php artisan module:make-component Card --module=Blog
```

If it was created successfully then a new component's file will be saved as `Modules/Blog/View/Components/Card.php`, after that please add this component to service provider by open `\Modules\Blog\Providers\BlogServiceProvider` and see the example below.
```php
. . .

use Modules\Blog\View\Components\Card;

. . .

/**
 * Load view component
 *
 * @return void
 */
protected function registerViewComponent()
{
    $this->loadViewComponentsAs('blog', [
        Card::class,
    ]);
}

. . .
```

If it was registered, then you can call it by add prefix `x-blog` before component's name and you can replace 'blog' with your module's name, see the example.

```html
<x-blog-card>
    lorem ipsum dolor sit amet
</x-blog-card>
```