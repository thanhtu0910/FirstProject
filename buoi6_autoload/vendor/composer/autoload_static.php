<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit2b0135237308d80a84ccf11c9257e5d9
{
    public static $files = array (
        '57511c86bfe1852887c23cc1336cf34d' => __DIR__ . '/../..' . '/common/function.php',
    );

    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit2b0135237308d80a84ccf11c9257e5d9::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit2b0135237308d80a84ccf11c9257e5d9::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit2b0135237308d80a84ccf11c9257e5d9::$classMap;

        }, null, ClassLoader::class);
    }
}
