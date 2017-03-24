<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoriesServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //测试仓库
        $this->registerTestRepository();
        //商品分类
        $this->registerGoodsRepository();
    }

    public function registerTestRepository()
    {
        $this->app->singleton('test', 'App\Repository\Test\Eloquent\TestRepository');
    }

    public function registerGoodsRepository()
    {
        $this->app->singleton('category', 'App\Repository\Category\Eloquent\CategoryRepository');
    }

}
