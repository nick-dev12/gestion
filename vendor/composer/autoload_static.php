<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit938df29450d597cad9f32c53e512986a
{
    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'UltraMsg\\WhatsAppApi' => __DIR__ . '/..' . '/ultramsg/whatsapp-php-sdk/ultramsg.class.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInit938df29450d597cad9f32c53e512986a::$classMap;

        }, null, ClassLoader::class);
    }
}
