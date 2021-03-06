<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\UrlGenerator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if (config('app.env') == 'production') {
            $this->app['url']->forceScheme('https');
        }

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(UrlGenerator $url )
    {
        // if ( env(‘APP_ENV’) == ‘production’ ){
        //     $url->forceSchema(‘https’); //5.3
        //     $url->forceScheme(‘https’); //5.4
        // }
    }
}
