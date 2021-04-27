<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\User as UserServices;

class AppServiceProvider extends ServiceProvider
{
    protected $applicationServices = [
        UserServices\Interfaces\UserServiceInterface::class => UserServices\UserService::class,
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
