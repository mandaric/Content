<?php

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