<?php

namespace App\Providers;

use App\Services\{CompanyService, UserService};
use App\Services\interfaces\{CompanyServiceInterface, UserServiceInterface};
use Illuminate\Support\ServiceProvider;

/**
 * Class AppServiceProvider
 */
class AppServiceProvider extends ServiceProvider
{
    /* @var array SERVICES */
    private const SERVICES = [
        CompanyServiceInterface::class => CompanyService::class,
        UserServiceInterface::class => UserService::class
    ];

    /**
     * @return void
     */
    public function register()
    {
        foreach (self::SERVICES as $interface => $service) {
            $this->app->bind($interface, $service);
        }
    }
}
