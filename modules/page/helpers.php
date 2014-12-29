<?php

/**
 * Create a page view with given data
 *
 * @param array $data Array with title and content keys
 */
function page_view(array $data)
{
    extract($data);

    include __DIR__ . "/../../app/views/page.phtml";
}