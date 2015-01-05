<?php

/**
 * Create a slug from a string
 *
 * @param string $str
 * @return string
 */
function slugify($str)
{
    $str = strtolower($str);

    // replace spaces, question marks and exclamation marks
    $search = [" ", "?", "!"];
    $replace = ["-", null, null];

    return str_replace($search, $replace, $str);
}

/**
 * Print out a nice overview of $var inside <pre>
 *
 * @param mixed $var
 */
function debug($var)
{
    echo "<pre>";
    print_r($var);
    echo "</pre>";
}