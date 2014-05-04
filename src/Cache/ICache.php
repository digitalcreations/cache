<?php

namespace DC\Cache;

interface ICache {
    /**
     * Retrieve an item from cache
     *
     * @param string $key The key to store it under
     * @return mixed
     */
    function get($key);

    /**
     * Set an item in the cache
     *
     * @param string $key
     * @param mixed $value
     * @param int|\DateInterval|\DateTime $validity Number of seconds this is valid for (if int)
     * @return void
     */
    function set($key, $value, $validity = null);

    /**
     * Try to get an item, and if missed call the fallback method to produce the value and store it.
     *
     * @param string $key
     * @param callable $fallback
     * @param int|\DateInterval|\DateTime $validity Number of seconds this is valid for (if int)
     * @return mixed
     */
    function getWithFallback($key, callable $fallback, $validity = null);

    /**
     * Remove a key from the cache.
     *
     * @param string $key
     * @return void
     */
    function delete($key);

    /**
     * Remove all items from the cache (flush it).
     *
     * @return void
     */
    function deleteAll();
} 