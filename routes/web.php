<?php

$router->post('/post', 'PostController@store');
$router->get('/posts', 'PostController@index');
