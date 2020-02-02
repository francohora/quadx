<?php
declare(strict_types=1);

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

/** @var $router */
$router->group(['prefix' => '/orders'], static function () use ($router): void {
    $router->post('/', ['uses' => 'Orderscontroller@create']);
    $router->put('/{trackingId}', ['uses' => 'OrdersController@update']);
});
