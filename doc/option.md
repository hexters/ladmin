# Ladmin Option

You can save data into **Ladmin Option** if at any time needed, the system works like a cache but it was stored in the database and cache and will always sync, if the cache is not found then the data will be retrieved from the database and re-syncronized.

### Save and modify data
```php
ladmin()->setOption('foo', 'bar');
// Input String
```

Bisa juga menyimpan data array

```php
ladmin()->setOption('foo', ['bar' => 'baz']);
// Input Array
```

### Retrieve data
```php
ladmin()->getOptoin('foo');
// Output String | Array
```

### Delete data
```php
ladmin()->deleteOptoin('foo');
// Output Boolean
```

### Checking data
```php
ladmin()->hasOptoin('foo');
// Output Boolean
```

## Inline Method

In addition to the above method, you can also use the `options($method, $key, $value)` method, and the available methods include `has|get|set|delete`. See the example below.
```php
ladmin()->option('set', 'foo', ['bar' => 'baz']);
```

# Cache

If you don't want to store it in cache, you can disable it via the config file `config/ladmin.php`
```php
. . .
'option' => [
    'cache' => [
        'enable' => false,
        'driver' => env('CACHE_DRIVER')
    ]
]
. . .
```

For the driver cache is fetched based on the default cache of laravel `.env`, you can also change it in the config file as above.