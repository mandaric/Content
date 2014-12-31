<?php

/**
 * Index
 */
route("GET", "/", function()
{
    page_view([
        'title' => 'Index Page',
        'content' => 'Welcome to my site'
    ]);
});

/**
 * Homepage
 */
route("GET", "home", function()
{
    page_view([
        'title' => 'Home Page',
        'content' => 'Hello Homepage'
    ]);
});
