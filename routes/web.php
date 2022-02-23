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

$router->get('/', function () use ($router) {
    return response()->json([
        "name" => "PMT-AUTH",
        "build" => $router->app->version(),
    ]);
});


$router->group(['prefix' => 'api'], function ($router) {
    
    $router->post('login', 'AuthController@login');
    $router->post('register', 'AuthController@register');

    $router->get('users', function() {
        return \App\Models\User::all();
    });

    $router->group(['middleware' => 'auth:jwt'], function ($router) {
        $router->get('user', 'AuthController@user');
    });

    
    $router->group(['middleware' => 'auth:token'], function ($router) {
        $router->get('user-token', function() {
            return response()->json(auth('token')->user()->toArray());
        });
    });

});