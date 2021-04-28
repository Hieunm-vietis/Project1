<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\User as UserServices;
use App\Services\Admin as AdminServices;

class AppServiceProvider extends ServiceProvider
{
    protected $applicationServices = [
        UserServices\Interfaces\UserServiceInterface::class => UserServices\UserService::class,
        UserServices\Interfaces\BlogServiceInterface::class => UserServices\BlogService::class,
        AdminServices\Interfaces\AdminServiceInterface::class => AdminServices\AdminService::class,
        AdminServices\Interfaces\BlogServiceInterface::class => AdminServices\BlogService::class,
    ];
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        foreach ($this->applicationServices as $interface => $service) {
            $this->app->bind($interface, $service);
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
