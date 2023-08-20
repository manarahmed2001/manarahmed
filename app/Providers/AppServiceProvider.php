<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Builder;
use App\Filters\Filters;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        Builder::macro('apply', function ($request) {
            /** @var \Illuminate\Database\Eloquent\Builder $this */
            return (new Filters($request))->apply($this);
        });
    }
}
