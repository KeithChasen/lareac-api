<?php

$router->post('/post', 'PostController@store');
$router->get('/posts', 'PostController@index');
$router->get('/post/{id}', 'PostController@show');
$router->put('/post/{id}', 'PostController@update');

