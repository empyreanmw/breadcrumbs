<?php

namespace empyrean\breadcrumbs;

use Illuminate\Support\ServiceProvider;

class BreadcrumbsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/css/breadcrumbs.css' => public_path('vendor/breadcrumbs/breadcrumbs.css'),
        ], 'public');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('Breadcrumbs', 'empyrean\breadcrumbs\Breadcrumbs');
    }
}

