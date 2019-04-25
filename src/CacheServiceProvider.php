<?php

namespace Pmbcom\Sage\Cache;

use Illuminate\Cache\CacheManager;
use Illuminate\Filesystem\Filesystem;
use Roots\Sage\Container;

/**
 * Class Loader
 *
 * @package Pmbcom\Sage\Cache
 */
class CacheServiceProvider
{

    /**
     * @var \Roots\Sage\Container
     */
    protected $container;
    /**
     * @var string
     */
    protected $cachePath;

    /**
     * Loader constructor.
     *
     * @param  \Roots\Sage\Container  $container
     * @param string $cachePath
     */
    public function __construct(Container $container, $cachePath)
    {
        $this->container = $container;
        $this->cachePath = $cachePath;

        $this->maybeMakeCacheDir();
        $this->setConfig();
        $this->registerFileSystem();
        $this->registerCache();
    }

    /**
     *
     */
    protected function setConfig()
    {
        $this->container['config']->set([
            'cache.default'     => 'file',
            'cache.stores.file' => [
                'driver' => 'file',
                'path'   => $this->cachePath,
            ],
        ]);
    }

    /**
     *
     */
    protected function registerFileSystem()
    {
        $this->container->bindIf('files', function () {
            return new Filesystem();
        }, true);
    }

    /**
     *
     */
    protected function registerCache()
    {
        $this->container->bindIf('cache', function (Container $container) {
            $cacheManager = new CacheManager($container);

            return $cacheManager->store();
        }, true);
    }

    /**
     *
     */
    protected function maybeMakeCacheDir()
    {
        if ( ! file_exists($this->cachePath)) {
            wp_mkdir_p($this->cachePath);
        }
    }

}
