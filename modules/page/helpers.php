<?php

/**
 * Create a slug from a string
 *
 * @param string $str
 * @return string
 */
function slugify($str)
{
    return str_replace([" "], ["-"], $str);
}