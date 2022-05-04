<?php

namespace App\Providers;

use App\Repositories\{CompanyRepository, UserRepository};
use App\Repositories\interfaces\{CompanyRepositoryInterface, UserRepositoryInterface};
use Laravel\Lumen\Providers\EventServiceProvider as ServiceProvider;

/**
 * Class RepositoryServiceProvider
 */
class RepositoryServiceProvider extends ServiceProvider
{
    /* @var array REPOSITORIES */
    private const REPOSITORIES = [
        CompanyRepositoryInterface::class => CompanyRepository::class,
        UserRepositoryInterface::class => UserRepository::class
    ];

    /**
     * @return void
     */
    public function register()
    {
        foreach (self::REPOSITORIES as $interface => $repository) {
            $this->app->bind($interface, $repository);
        }
    }
}
