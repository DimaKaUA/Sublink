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

$app->get('/', [
    'as' => 'new', 
    'uses' => 'LinkController@new'
]);

$app->post('/', [
    'as' => 'save', 
    'uses' => 'LinkController@new'
]);

$app->get('/{redirecting_link}', [
    'as' => 'redirect', 
    'uses' => 'LinkController@redirect'
]);

$app->post('/{redirecting_link}', [
    'as' => 'redirectWithPass', 
    'uses' => 'LinkController@redirect'
]);



$app->group(['prefix' => 'user'], function () use ($app) {
    $app->get('sign_up', [
        'as' => 'sign_up',
        'uses' => 'AuthController@signUp'
    ]);

    $app->post('sign_up', [
        'uses' => 'AuthController@signUp'
    ]);

    $app->get('sign_in', [
        'as' => 'sign_in',
        'uses' => 'AuthController@signIn'
    ]);

    $app->post('sign_in', [
        'uses' => 'AuthController@signIn'
    ]);

    $app->get('sign_out', [
        'uses' => 'AuthController@signOut'
    ]);

    $app->get('profile', [
        'uses' => 'AuthController@profile'
    ]);
});




