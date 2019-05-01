# Sage Cache

Sage cache brings Laravel file cache to the Sage WordPress starter theme.

## Installation

Add to your composer dependencies:

```shell
$ composer require psyao/sage-cache
```

Add at the end of 'lib/setup.php':

```php
$cacheProvider = new \Pmbcom\Sage\Cache\CacheServiceProvider(sage());
$cacheProvider->register();
$cacheProvider->boot();
```
