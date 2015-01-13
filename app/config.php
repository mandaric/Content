<?php

/**
 * Config
 *
 * If the value is set, set the value by key in the global array
 * If no value is set, try to find the key in the global array
 * and return it's value
 *
 * @param string $key
 * @param mixed $value
 * @return mixed
 */
function config($key, $value = null)
{
    // Create a global (in this function only) array
    global $config;

    // Check if the string contains a dot
    if (strpos($key, ".") !== false)
    {
        // Explode the string and use the first item as configFile and the last as key
        list($configFile, $key) = explode(".", $key);
    }
    else
    {
        // No dot was found, use default file in config directory
        $configFile = 'default';
    }

    // Check if the key (filename) is already set
    if (!isset($config[$configFile]))
    {
        // Create new key (filename) and fill with config file contents
        $config[$configFile] = include __DIR__ . "/config/{$configFile}.php";
    }

    // Check if value is set
    if ($value)
    {
        // Set the value in the global array with the configFile and key as array keys
        $config[$configFile][$key] = $value;
    }
    else
    {
        // Try to find the key in the global array
        if (array_key_exists($key, $config[$configFile]))
        {
            // Return the value
            return $config[$configFile][$key];
        }
    }
}
