<?php
require_once __DIR__ . '/../vendor/autoload.php';

spl_autoload_register(function ($class)
{
    if (strpos($class, 'KnotPhp\\Framework\\Test\\') === 0) {
        $name = substr($class, strlen('KnotPhp\\Framework\\Test\\'));
        $name = array_filter(explode('\\',$name));
        $file = __DIR__ . '/include/' . implode('/',$name) . '.php';
        /** @noinspection PhpIncludeInspection */
        require_once $file;
    }
});
