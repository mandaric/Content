<?php

/**
 * Main
 */

// Load generic helper functions
require __DIR__ . "/helpers.php";

// Load routes and execute router
require __DIR__ . "/router.php";

/**
 * Modules
 */

// Page Module
require __DIR__ . '/../modules/page/bootstrap.php';

// Post Module
//require __DIR__ . '/../modules/post/bootstrap.php';

// Comment Module
//require __DIR__ . '/../modules/comment/bootstrap.php';

// User Module
//require __DIR__ . '/../modules/user/bootstrap.php';

$segments = explode("/", $_SERVER["REQUEST_URI"]);

// array_filter removes empty value which appeared after explode function
// array_values is used to reset the array key
$segments = array_values(array_filter($segments));

if (empty($segments))
{
    $route = '/';
}
else
{
    $route = $segments[0];
}

call_user_func($routes["GET"][$route]);

//
//debug($routes["GET"][$route]);
