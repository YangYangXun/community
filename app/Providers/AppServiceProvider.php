<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

/**
 * �ج[���֤ߡA�b Laravel �ҰʮɡA�N�̥��[�����C
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
