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

use app\Hello;

$router->get('/', function () use ($router) {
    // return $router->app->version();
    $users = App\User::all()->toJson();

    echo $users;
    
});



$router->group(['middleware' => 'auth','prefix' => 'api'], function () use ($router)
{
    $router->get('profile', 'AuthController@profile');
    $router->get('logout', 'AuthController@logout');
});

$router->group(['prefix' => 'api'], function () use ($router) 
{
   $router->post('register', 'AuthController@register');
   $router->post('login', 'AuthController@login');

   $router->get('asset_reservation/create_dummy','AssetReservationController@create_dummy');
});


// Use this route for generate key and paste it to APP_KEY .env (Development only)
// $router->get('/key', function() {
//     return \Illuminate\Support\Str::random(32);
// });

