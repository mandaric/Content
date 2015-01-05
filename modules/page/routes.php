<?php

/**
 * Index
 */
route("GET", "/", function()
{
    return page_view([
        "title" => "Index Page",
        "content" => "Welcome to my site"
    ]);
});

/**
 * Homepage
 */
route("GET", "/home", function()
{
    return page_view([
        "title" => "Home Page",
        "content" => "Hello Homepage"
    ]);
});

route("GET", "/cms/page/create", function()
{
    return page_form_view("/cms/page");
});

route("POST", "/cms/page", function()
{
    if (page_create($_POST))
    {
        return "page saved";
    }
    else
    {
        return "page not saved";
    }
});
