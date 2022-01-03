<?php

namespace App\Providers;

use App\Memcache;
use App\Config;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\App;

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
     *
     * @return void
     */
    public function boot()
    {
        $s = null;
        $model = new Memcache();
        $recordQuery = $model->cacheQuery($s);
        $configQueries = 3;//задаем этот параметр в конфиге
        $related = array_slice($recordQuery, -$configQueries, $configQueries, true);//получаем последние три элемента
        $reverse = array_reverse($related);// получаем значения в обратном порядке
        View::share('related', $reverse);
        $modelConfig = new Config();
        $configRelatedSearch = $modelConfig->forRedirect();
        View::share('configRelatedSearch', $configRelatedSearch);
    }
}
