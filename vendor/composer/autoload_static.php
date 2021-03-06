<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitdfbf249a0825d1e584363b48539d09e4
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
            $loader->prefixLengthsPsr4 = ComposerStaticInitdfbf249a0825d1e584363b48539d09e4::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitdfbf249a0825d1e584363b48539d09e4::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitdfbf249a0825d1e584363b48539d09e4::$classMap;

        }, null, ClassLoader::class);
    }
}
