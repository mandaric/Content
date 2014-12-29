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

$segments = array_values(array_filter($segments));

foreach ($routes as $routeKey => $routeData)
{
    if ($segments[0] == $routeKey) {
        page_view($routeData);
    }
}



