<?php

/**
 * Index
 */
route("GET", "/", function()
{
    page_view([
        "title" => "Index Page",
        "content" => "Welcome to my site"
    ]);
});

/**
 * Homepage
 */
route("GET", "/home", function()
{
    page_view([
        "title" => "Home Page",
        "content" => "Hello Homepage"
    ]);
});

route("GET", "/cms/page/create", function()
{
    form_view("/cms/page");
});

route("POST", "/cms/page", function()
{
    $data = [
        "title" => $_POST["title"],
        "content" => $_POST["content"]
    ];

    db_create("pages", $data);
});
