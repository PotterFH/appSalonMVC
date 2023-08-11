<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitfef8ec99b8f75c3e2a157e45017eacb9
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        spl_autoload_register(array('ComposerAutoloaderInitfef8ec99b8f75c3e2a157e45017eacb9', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitfef8ec99b8f75c3e2a157e45017eacb9', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitfef8ec99b8f75c3e2a157e45017eacb9::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}