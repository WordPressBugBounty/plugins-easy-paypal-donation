<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitb1a1489a49d92a7098f9d55fd570b10f
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

        spl_autoload_register(array('ComposerAutoloaderInitb1a1489a49d92a7098f9d55fd570b10f', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitb1a1489a49d92a7098f9d55fd570b10f', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitb1a1489a49d92a7098f9d55fd570b10f::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
