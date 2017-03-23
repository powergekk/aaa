<?php

use Illuminate\Routing\Router;

Admin::registerHelpersRoutes();

Route::group([
    'prefix' => config('admin.prefix'),
    'namespace' => Admin::controllerNamespace(),
    'middleware' => ['web', 'admin']
], function (Router $router) {

    $router->get('/', 'HomeController@index');

    //商品分类
    $router->get('category', 'CategoryController@index');

});
