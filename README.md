# Sage Cache

Sage cache brings Laravel file cache to the Sage WordPress starter theme.

## Installation

Add to your composer.json file:

```json
{
    "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/pmbcom/sage-cache"
        }
    ],
    "require": {
        "pmbcom/sage-cache": "dev-master"
    }
}
```

Then update composer.

```shell
$ composer update
```

Finally add at the end of 'lib/setup.php':

```php
$container  = sage();
$cache_path = wp_upload_dir()['basedir'].'/cache/data';
new \Pmbcom\Sage\Cache\CacheServiceProvider($container, $cache_path);
```
