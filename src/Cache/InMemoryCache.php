<?php

namespace DC\Cache;

/**
 * Cache that stores everything in an array. No expiry times supported.
 *
 * Useful for unit testing.
 *
 * @package DC\Cache
 */
class InMemoryCache implements ICache
{
    private $cache = [];

    function get($key)
    {
        if (isset($this->cache[$key])) {
            return $this->cache[$key];
        }
        return null;
    }

    function set($key, $value, $validity = null)
    {
        $this->cache[$key] = $value;
    }

    function getWithFallback($key, callable $fallback, $validity = null)
    {
        if (isset($this->cache[$key])) {
            return $this->cache[$key];
        }

        return $this->cache[$key] = $fallback();
    }

    function delete($key)
    {
        unset($this->cache[$key]);
    }

    function deleteAll()
    {
        $this->cache = [];
    }

    function getAllKeys()
    {
        return array_keys($this->cache);
    }
}