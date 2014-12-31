<?php

/**
 * Index
 */
route("GET", "/", function()
{
    echo 'index page';
});

/**
 * Homepage
 */
route("GET", "home", function()
{
    echo 'homepage';
});
