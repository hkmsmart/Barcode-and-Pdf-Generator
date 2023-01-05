<?php

/** @var \Laravel\Lumen\Routing\Router $router */


$router->get('/', 'GenerateController@index');
$router->get('/createBarcode', 'BarocdeController@create');
