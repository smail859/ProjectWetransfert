<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit10ebf926e1385589b167bf9b067658fe
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit10ebf926e1385589b167bf9b067658fe::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit10ebf926e1385589b167bf9b067658fe::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit10ebf926e1385589b167bf9b067658fe::$classMap;

        }, null, ClassLoader::class);
    }
}