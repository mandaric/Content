<?php

/**
 * Create a page view with given data
 *
 * @param array $data Array with title and content keys
 * @return string
 */
function page_view(array $data)
{
    // Start a new output buffer
    ob_start();

    // extract the array keys into variables
    // example: $data['title'] becomes $title
    extract($data);

    // include the view
    include __DIR__ . "/../../app/views/page.phtml";

    // Get the content of the output buffer
    $output = ob_get_contents();

    // End and clean the output buffer
    ob_end_clean();

    // return the contents of the output buffer
    return $output;
}

/**
 * Create a page form
 *
 * @param $action
 * @return string
 */
function page_form_view($action)
{
    // Start a new output buffer
    ob_start();

    include __DIR__ . "/../../app/views/form.phtml";

    // Get the content of the output buffer
    $output = ob_get_contents();

    // End and clean the output buffer
    ob_end_clean();

    // return the contents of the output buffer
    return $output;
}

/**
 * Create a new Page
 *
 * @param array $postData
 * @return bool
 */
function page_create(array $postData)
{
    // setup the page data
    $pageData = [
        "title" => $postData["title"],
        "slug" => slugify($postData["title"]),
        "content" => $postData["content"]
    ];

    return db_create("pages", $pageData);
}