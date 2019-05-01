<?php

namespace Psyao\Sage\Cache;

use Illuminate\Cache\CacheManager;
use Illuminate\Support\ServiceProvider;

/**
 * Class CacheServiceProvider
 *
 * @package Psyao\Sage\Cache
 */
class CacheServiceProvider extends ServiceProvider
{

    /**
     *
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/cache.php', 'cache');

        $this->app->bindIf('cache', function ($app) {
            return new CacheManager($app);
        }, true);

        $this->app->bindIf('cache.store', function ($app) {
            return (new CacheManager($app))->driver();
        }, true);
    }

    /**
     *
     */
    public function boot()
    {
        $this->maybeMakeCacheDir();
    }

    /**
     *
     */
    protected function maybeMakeCacheDir()
    {
        $fs = $this->app['files'];
        $cachePath = $this->app['config']->get('cache.stores.file.path');

        if ( ! $fs->exists($cachePath)) {
            $fs->makeDirectory($cachePath, 0755, true);
        }
    }

}
