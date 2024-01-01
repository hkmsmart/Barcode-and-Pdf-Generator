<?php

/** @var \Laravel\Lumen\Routing\Router $router */


$router->get('/', 'GenerateController@index');

//$router->middleware('CreateBarcode')->post('/createBarcode', 'BarocdeController@create');
$router->post('/createBarcode',['middleware'=>'CreateBarcodeRequest','uses' => 'BarocdeController@create']);
$router->post('/editPdf', 'PdfController@edit');
