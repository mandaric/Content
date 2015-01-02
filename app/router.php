<?php

$routes = [];

/**
 * Add routes to routing array
 *
 * @param string $method
 * @param string $route
 * @param Closure $callback
 */
function route($method, $route, $callback)
{
    global $routes;

    $routes[$method][$route] = $callback;
}

/**
 * Looks up the routes. If the route is empty, it will lead to the index page.
 */
function start()
{
    global $routes;

    $uri = $_SERVER["REQUEST_URI"];
    $method = $_SERVER["REQUEST_METHOD"];

    $route = null;

    if (array_key_exists($uri, $routes[$method]))
    {
        $route = $routes[$method][$uri];
    }

    // check if $callback can be executed
    if (is_callable($route))
    {
        // execute $callback
        call_user_func($route);
    }
    else
    {
        // raise error
        exit('no valid route found');
    }

//    debug($_SERVER);
//    debug($routes);
}

