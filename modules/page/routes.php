<?php

/**
 * Index
 */
route("GET", "/", function()
{
    return render("page/page", [
        "title" => "Index Page",
        "content" => "Welcome to my site"
    ]);
});

/**
 * Homepage
 */
route("GET", "/home", function()
{
    return render("page/page", [
        "title" => "Home Page",
        "content" => "Hello Homepage"
    ]);
});

/**
 * Page new
 */
route("GET", "/cms/page/new", function()
{
    return render("page/form", [
        "title" => "Create a new page",
        "action" => "/cms/page"
    ]);
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
