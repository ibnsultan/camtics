<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit91d2ea16b90581397114d271b15ce41b
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PhpImap\\' => 8,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PhpImap\\' => 
        array (
            0 => __DIR__ . '/..' . '/php-imap/php-imap/src/PhpImap',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit91d2ea16b90581397114d271b15ce41b::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit91d2ea16b90581397114d271b15ce41b::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit91d2ea16b90581397114d271b15ce41b::$classMap;

        }, null, ClassLoader::class);
    }
}
