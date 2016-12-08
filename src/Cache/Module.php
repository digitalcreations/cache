<?php

namespace DC\Cache;

/**
 * In memory module for unit testing purposes.
 *
 * Most likely not what you are looking for.
 */
class Module extends \DC\IoC\Modules\Module
{
    public function __construct()
    {
        parent::__construct("dc/cache", []);
    }

    function register(\DC\IoC\Container $container) {
        $container->register('\DC\Cache\InMemoryCache')->to('\DC\Cache\ICache')->withContainerLifetime();
    }
}