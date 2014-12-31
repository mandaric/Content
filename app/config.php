<?php

$config = [
    "index_page" => "/",
    "author" => "Mladen Mandaric",
    "year" => 2015
];

/**
 * Config
 *
 * @param string $key
 * @param mixed $value
 * @return mixed
 */
function config($key, $value = null)
{
    global $config;

    if ($value)
    {
        $config[$key] = $value;
    }
    else
    {
        if (array_key_exists($key, $config))
        {
            return $config[$key];
        }
    }

}
