<?php

/**
 * Create a page view with given data
 *
 * @param array $data Array with title and content keys
 */
function page_view(array $data)
{
    // extract the array keys into variables
    // example: $data['title'] becomes $title
    extract($data);

    // include the view
    include __DIR__ . "/../../app/views/page.phtml";
}

function form_view($action)
{
    include __DIR__ . "/../../app/views/form.phtml";
}