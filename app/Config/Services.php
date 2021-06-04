<?php

namespace Config;

use App\Services\AuthService;
use CodeIgniter\Config\BaseService;
use App\Services\EventService;
use App\Services\VideogameService;

/**
 * Services Configuration file.
 *
 * Services are simply other classes/libraries that the system uses
 * to do its job. This is used by CodeIgniter to allow the core of the
 * framework to be swapped out easily without affecting the usage within
 * the rest of your application.
 *
 * This file holds any application-specific services, or service overrides
 * that you might need. An example has been included with the general
 * method format you should use for your service methods. For more examples,
 * see the core Services file at system/Config/Services.php.
 */
class Services extends BaseService
{
	// public static function example($getShared = true)
	// {
	//     if ($getShared)
	//     {
	//         return static::getSharedInstance('example');
	//     }
	//
	//     return new \CodeIgniter\Example();
	// }

    public static function event($getShared = false)
    {
        if(! $getShared)
        {
            return new EventService();
        }

        return static::getSharedInstance('event');
    }

    public static function auth($getShared = false)
    {
        if(! $getShared)
        {
            return new AuthService();
        }
        return static::getSharedInstance('auth');
    }

    public static function videogame($getShared = false)
    {
        if(! $getShared)
        {
            return new VideogameService();
        }

        return static::getSharedInstance('videogame');
    }
}
