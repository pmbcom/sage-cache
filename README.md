# Sage Cache

Sage cache brings Laravel file cache to the Sage WordPress starter theme.

## Installation

Add to your composer dependencies:

```shell
$ composer require psyao/sage-cache
```

Finally add at the end of 'lib/setup.php':

```php
$container  = sage();
$cache_path = wp_upload_dir()['basedir'].'/cache/data';
new \Pmbcom\Sage\Cache\CacheServiceProvider($container, $cache_path);
```
