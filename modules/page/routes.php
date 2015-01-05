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

/**
 * Page new
 */
route("GET", "/cms/page/new", function()
{
    return page_form_view("/cms/page");
});

/**
 * Page create
 */
route("POST", "/cms/page", function()
{
    $pageData = [
        "title" => $_POST["title"],
        "content" => $_POST["content"]
    ];

    if (page_create($pageData))
    {
        return "page saved";
    }
    else
    {
        return "page not saved";
    }
});
