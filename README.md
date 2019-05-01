# Sage Cache

Sage cache brings Laravel file cache to the Sage WordPress starter theme.

## Installation

Require this package with composer using the following command:

```shell
$ composer require psyao/sage-cache
```

After updating composer, add the service provider to the `providers` array in `config/theme.php`

```php
 \Psyao\Sage\Cache\CacheServiceProvider::class,
```
