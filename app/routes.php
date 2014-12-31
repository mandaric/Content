<?php

$routes = [
    "home" => [
        "title" => "homepage",
        "content" => "This is the home page"
    ],
    "about" => [
        "title" => "about us",
        "content" => "This is the about page"
    ]
];

$segments = explode("/", $_SERVER["REQUEST_URI"]);

// array_filter removes empty value which appeared after explode function
// array_values is used to reset the array key

$segments = array_values(array_filter($segments));

foreach ($routes as $routeKey => $routeData)
{
    if ($segments[0] == $routeKey) {
        page_view($routeData);
    }
}



