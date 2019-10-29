<?php

namespace App\Providers;

use App\Models\Role;
use App\Models\User;
use App\Models\Package;
use App\Models\TransactionStatus;

use Illuminate\Support\ServiceProvider;
use View;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(['users.fields'], function ($view) {
            $roleItems = Role::pluck('name','id')->toArray();
            $view->with('roleItems', $roleItems);
        });
        View::composer(['users.fields'], function ($view) {
            $userItems = User::pluck('name','id')->toArray();
            $view->with('userItems', $userItems);
        });
        View::composer(['packages.fields'], function ($view) {
            $userItems = User::pluck('name','id')->toArray();
            $view->with('userItems', $userItems);
        });
        View::composer(['transactions.fields'], function ($view) {
            $userItems = User::pluck('name','id')->toArray();
            $view->with('userItems', $userItems);
        });
        View::composer(['transactions.fields'], function ($view) {
            $userItems = Package::pluck('name','id')->toArray();
            $view->with('packageItems', $userItems);
        });
        View::composer(['transactions.fields'], function ($view) {
            $userItems = TransactionStatus::pluck('name','id')->toArray();
            $view->with('statusItems', $userItems);
        });
        //
    }
}