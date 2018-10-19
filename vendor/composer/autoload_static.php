<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit577eaa3f89c706d46c6dbfce7fa7847d
{
    public static $prefixLengthsPsr4 = array (
        'D' => 
        array (
            'Delight\\Http\\' => 13,
            'Delight\\Db\\' => 11,
            'Delight\\Cookie\\' => 15,
            'Delight\\Base64\\' => 15,
            'Delight\\Auth\\' => 13,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Delight\\Http\\' => 
        array (
            0 => __DIR__ . '/..' . '/delight-im/http/src',
        ),
        'Delight\\Db\\' => 
        array (
            0 => __DIR__ . '/..' . '/delight-im/db/src',
        ),
        'Delight\\Cookie\\' => 
        array (
            0 => __DIR__ . '/..' . '/delight-im/cookie/src',
        ),
        'Delight\\Base64\\' => 
        array (
            0 => __DIR__ . '/..' . '/delight-im/base64/src',
        ),
        'Delight\\Auth\\' => 
        array (
            0 => __DIR__ . '/..' . '/delight-im/auth/src',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $prefixesPsr0 = array (
        'J' => 
        array (
            'JasonGrimes' => 
            array (
                0 => __DIR__ . '/..' . '/jasongrimes/paginator/src',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit577eaa3f89c706d46c6dbfce7fa7847d::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit577eaa3f89c706d46c6dbfce7fa7847d::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit577eaa3f89c706d46c6dbfce7fa7847d::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}
