<?php

namespace PaoloDavila\TodosBackend\Providers;

use Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Laravel\Passport\Passport;
use Route;

/**
 * Class AuthServiceProvider.
 *
 * @package PaoloDavila\TodosBackend\Providers
 */
class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'PaoloDavila\TodosBackend\Task' => 'PaoloDavila\TodosBackend\Policies\TaskPolicy',
//        'PaoloDavila\TodosBackend\User' => 'PaoloDavila\TodosBackend\Policies\UserPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Route::group(['middleware' => 'cors'], function() {
            Passport::routes();
        });

        Passport::enableImplicitGrant();

        $this->defineGates();
    }

    protected function defineGates()
    {
        Gate::define('gate-name',function() {
        });

        Gate::define('impossible-gate',function() {
            return false; //No autoritzat
        });

        Gate::define('easy-gate',function() {
            return true; //Autoritzat
        });

    }
}
