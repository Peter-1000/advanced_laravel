<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit72be44b38c6b1f09a0c941ce4ba43600
{
    public static $prefixLengthsPsr4 = array (
        'w' => 
        array (
            'wdd\\slug\\' => 9,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'wdd\\slug\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit72be44b38c6b1f09a0c941ce4ba43600::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit72be44b38c6b1f09a0c941ce4ba43600::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit72be44b38c6b1f09a0c941ce4ba43600::$classMap;

        }, null, ClassLoader::class);
    }
}
