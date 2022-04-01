<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
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
     *code will be shared when our language switcher is composed. Specifically, we’ll share the current locale that can be accessed as {{ $current_locale }}.
     * @return void
     */
    public function boot()
    {
        view()->composer('DI.partials.language_switcher', function ($view) {
            $view->with('current_locale', app()->getLocale());
            $view->with('available_locales', config('app.available_locales'));
        });
    }   
    
}
