<?php

namespace App\Core;

use Exception;

class GlobalStuff
{
    const DEV_PLATFORM = "DEV_PLATFORM";
    const PROD_PLATFORM = "PROD_PLATFORM";

    private static $activePlatform = self::DEV_PLATFORM;

    public static function GetDatabaseInfos()
    {
        if (self::$activePlatform == self::PROD_PLATFORM) :
            return array(
                'driver'    => 'mysql',
                'host'      => 'localhost',
                'database'  => 'scyth_db',
                'username'  => 'root',
                'password'  => '',
                'charset'   => 'utf8',
                'collation' => 'utf8_unicode_ci',
                'prefix'    => '',
            );
        elseif (self::$activePlatform == self::DEV_PLATFORM) :
            return array(
                'driver'    => 'mysql',
                'host'      => 'localhost',
                'database'  => 'scyth_db',
                'username'  => 'root',
                'password'  => '',
                'charset'   => 'utf8',
                'collation' => 'utf8_unicode_ci',
                'prefix'    => '',
            );
        else :
            throw new Exception("GlobalStuff - no active platform");
        endif;
    }
}
