<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite6128e409989a956a9b5bbaa8525b971
{
    public static $files = array (
        '42e3dc2cf7383276e8c418f14b63f194' => __DIR__ . '/../..' . '/config/config.php',
        'e175220e986eaaa9f4a6c75272e13816' => __DIR__ . '/../..' . '/lib/Facebook/polyfills.php',
    );

    public static $prefixLengthsPsr4 = array (
        'l' => 
        array (
            'lib\\' => 4,
        ),
        'd' => 
        array (
            'database\\' => 9,
        ),
        'c' => 
        array (
            'core\\' => 5,
        ),
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
        'L' => 
        array (
            'Liquid\\' => 7,
        ),
        'F' => 
        array (
            'Facebook\\' => 9,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'lib\\' => 
        array (
            0 => __DIR__ . '/../..' . '/lib',
        ),
        'database\\' => 
        array (
            0 => __DIR__ . '/../..' . '/database',
        ),
        'core\\' => 
        array (
            0 => __DIR__ . '/../..' . '/core',
        ),
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/../..' . '/lib/PHPMailer',
        ),
        'Liquid\\' => 
        array (
            0 => __DIR__ . '/../..' . '/core/Liquid',
        ),
        'Facebook\\' => 
        array (
            0 => __DIR__ . '/../..' . '/lib/Facebook',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInite6128e409989a956a9b5bbaa8525b971::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInite6128e409989a956a9b5bbaa8525b971::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
