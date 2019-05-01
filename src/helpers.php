<?php

namespace App;

/**
 * @param  dynamic  key|key,default|data,expiration|null
 *
 * @return mixed|\Illuminate\Cache\CacheManager
 * @throws \Exception
 */
function cache()
{
    $arguments = func_get_args();
    $cache     = \Roots\Sage\Container::getInstance()->makeWith('cache.store');

    if (empty($arguments)) {
        return $cache;
    }

    if (is_string($arguments[0])) {
        return $cache->get(...$arguments);
    }

    if ( ! is_array($arguments[0])) {
        throw new Exception(
            'When setting a value in the cache, you must pass an array of key / value pairs.'
        );
    }

    if ( ! isset($arguments[1])) {
        throw new Exception(
            'You must specify an expiration time when setting a value in the cache.'
        );
    }

    return $cache->put(key($arguments[0]), reset($arguments[0]), $arguments[1]);
}
