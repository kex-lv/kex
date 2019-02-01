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

$router->group(['prefix' => 'organziation'], function () use ($router) {
    $router->get('/',  ['uses' => 'OrganizationController@showOrganizations']);

    $router->get('/{id}', ['uses' => 'OrganizationController@showOrganization']);

    $router->post('/', ['uses' => 'OrganizationController@createOrganization']);

    $router->delete('/{id}', ['uses' => 'OrganizationController@deleteOrganization']);

    $router->put('/{id}', ['uses' => 'OrganizationController@updateOrganization']);
});

$router->group(['prefix' => 'person'], function () use ($router) {
    $router->get('/',  ['uses' => 'PersonController@showPersons']);

    $router->get('/{id}', ['uses' => 'PersonController@showPerson']);

    $router->post('/', ['uses' => 'PersonController@createPerson']);

    $router->delete('/{id}', ['uses' => 'PersonController@deletePerson']);

    $router->put('/{id}', ['uses' => 'PersonController@updatePerson']);
});

$router->group(['prefix' => 'partner'], function () use ($router) {
    $router->get('/',  ['uses' => 'PartnerController@showPartners']);

    $router->get('/{id}', ['uses' => 'PartnerController@showPartner']);

    $router->post('/', ['uses' => 'PartnerController@createPartner']);

    $router->delete('/{id}', ['uses' => 'PartnerController@deletePartner']);

    $router->put('/{id}', ['uses' => 'PartnerController@updatePartner']);
});
