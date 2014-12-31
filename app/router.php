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

    $segments = explode("/", $_SERVER["REQUEST_URI"]);

    // array_filter removes empty value which appeared after explode function
    // array_values is used to reset the array key
    $segments = array_values(array_filter($segments));

    $route = null;

    // check if $segments is empty
    if (empty($segments))
    {
        // $segments is empty so set route to slash (index)
        $route = $routes["GET"][config("index_page")];
    }
    else
    {
        // check if the key exists in the $routes array
        if (array_key_exists($segments[0], $routes["GET"]))
        {
            $route = $routes["GET"][$segments[0]];
        }
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
}