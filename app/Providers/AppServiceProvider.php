<?php

namespace PaoloDavila\TodosBackend\Providers;

use PaoloDavila\TodosBackend\User;
use Illuminate\Support\ServiceProvider;
use Spatie\Permission\Models\Role;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
      User::created(function ($user) {
        $user->assignRole('admin');
      });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
