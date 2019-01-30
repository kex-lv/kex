<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'chart'], function () use ($router) {
    $router->get('/',  ['uses' => 'ChartController@showChart']);

    $router->get('account/{id}', ['uses' => 'ChartController@showAccount']);

    $router->post('account', ['uses' => 'ChartController@createAccount']);

    $router->delete('account/{id}', ['uses' => 'ChartController@deleteAccount']);

    $router->put('account/{id}', ['uses' => 'ChartController@updateAccount']);
});

$router->group(['prefix' => 'document'], function () use ($router) {
    $router->get('/',  ['uses' => 'DocumentController@showDocuments']);

    $router->get('/{id}', ['uses' => 'DocumentController@showDocument']);

    $router->post('/', ['uses' => 'DocumentController@createDocument']);

    $router->delete('/{id}', ['uses' => 'DocumentController@deleteDocument']);

    $router->put('/{id}', ['uses' => 'DocumentController@updateDocument']);
});
