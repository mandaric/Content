<?php

$routes = [];

function route($method, $route, $callback)
{
    global $routes;

    $routes[$method][$route] = $callback;
}