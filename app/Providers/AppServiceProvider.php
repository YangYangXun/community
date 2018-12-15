<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

/**
 * 框架的核心，在 Laravel 啟動時，�N最先加載文件。
 *
 */
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        // \Carbon\Carbon::setLocale('zh-TW');

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
