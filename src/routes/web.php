<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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

$router->group(['prefix' => ''], function () use ($router) {
    $router->get('/',               ['as' => 'getHomePage', 'uses' => 'EmployeeController@getHomePage']);
    $router->get('/withFrequency',  ['as' => 'getHomePageWithFrequency', 'uses' => 'EmployeeController@getHomePageWithNameFrequency']);
    $router->get('/details/{id}',   ['as' => 'getUpdatePage', 'uses' => 'EmployeeController@getUpdatePage']);
    $router->post('/details/{id}',  ['as' => 'postUpdatePage', 'uses' => 'EmployeeController@postUpdatePage']);
    $router->get('/create',         ['as' => 'getCreatePage', 'uses' => 'EmployeeController@getCreatePage']);
    $router->post('/create',        ['as' => 'postCreatePage', 'uses' => 'EmployeeController@postCreatePage']);
    $router->get('/delete/{id}',    ['as' => 'getDeletePage', 'uses' => 'EmployeeController@getDeletePage']);
    $router->post('/delete/{id}',   ['as' => 'postDeletePage', 'uses' => 'EmployeeController@postDeletePage']);
});

