
<?php

$router->get('', 'PagesController@index');
$router->get('guide', 'PagesController@guide');

$router->get('customer', 'CustomersController@index');
$router->get('customer/create', 'CustomersController@create');
$router->post('customer/create', 'CustomersController@store');
$router->get('customer/show', 'CustomersController@show');
$router->get('customer/edit', 'CustomersController@edit');
$router->post('customer/edit', 'CustomersController@update');
$router->post('customer/delete', 'CustomersController@destroy');

$router->get('gender', 'GendersController@index');
$router->get('gender/create', 'GendersController@create');
$router->post('gender/create', 'GendersController@store');
$router->get('gender/show', 'GendersController@show');
$router->get('gender/edit', 'GendersController@edit');
$router->post('gender/edit', 'GendersController@update');
$router->post('gender/delete', 'GendersController@destroy');
