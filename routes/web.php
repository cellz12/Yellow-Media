<?php

/** @var Laravel\Lumen\Routing\Router $router */

$router->group(['prefix' => 'api'], function () use ($router) {
    $router->group(['prefix' => 'user'], function () use ($router) {

        $router->group(['middleware' => ['guest']], function () use ($router) {
            $router->post('register', '\App\Http\Controllers\Api\UserController@store');
            $router->post('sign-in', '\App\Http\Controllers\Api\AuthController@signIn');
            $router->post('recover-password', '\App\Http\Controllers\Api\AuthController@recoverPassword');
            $router->get('password/{token}', [
                'as' => 'password.reset',
                'uses' => '\App\Http\Controllers\Api\AuthController@passwordReset'
            ]);

        });

        $router->group(['middleware' => ['auth']], function () use ($router) {
            $router->post('sign-out', '\App\Http\Controllers\Api\AuthController@signOut');
        });

        $router->group(['prefix' => 'companies', 'middleware' => ['auth']], function () use ($router) {
            $router->get('/', '\App\Http\Controllers\Api\UserCompanyController@index');
            $router->post('/', '\App\Http\Controllers\Api\UserCompanyController@store');
        });
    });
});
