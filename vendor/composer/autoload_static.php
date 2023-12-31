<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitd6022948455824609b2e63c1f70bd12b
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'Psr\\' => 4,
        ),
        'M' => 
        array (
            'MvcExample\\' => 11,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Psr\\' => 
        array (
            0 => __DIR__ . '/..' . '/framework',
        ),
        'MvcExample\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInitd6022948455824609b2e63c1f70bd12b::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitd6022948455824609b2e63c1f70bd12b::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitd6022948455824609b2e63c1f70bd12b::$classMap;

        }, null, ClassLoader::class);
    }
}
