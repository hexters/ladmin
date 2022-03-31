# Command

Let's create our first command by running code below

```bash
$ php artisan module:make-command BlogCommand --module=Blog
```

If it was created successfully then a new command's file will be saved as `Modules/Blog/Console/Commands/BlogCommand.php`, to call this command, you must add this command to service provider. Please open `\Modules\Blog\Providers\BlogServiceProvider` and follow the example below.

```php
. . .

use Models\Blog\Console\Commands\BlogCommand;

. . .
/**
 * Register list of command
 *
 * @return void
 */
protected function registerCommand()
{

    if ($this->app->runningInConsole()) {
        $this->commands([
            BlogCommand::class
        ]);
    }
}

. . .
```

If it was registered, then you can call with `artisan`