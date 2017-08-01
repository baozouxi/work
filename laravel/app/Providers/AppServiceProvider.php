<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\User;
use App\Models\Role;
use View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        // $admin = User::all()->toArray();
        // $admin = array_column($admin, null, 'id');

        // $roles = Role::all()->toArray();
        // $roles = array_column($roles, 'name', 'id');

        // View::share('admin', $admin);
        // View::share('roles', $roles);
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
