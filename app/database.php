<?php

/**
 * Create new record and returns true upon success
 *
 * @param string $table
 * @param array $data
 * @return bool
 */
function db_create($table, array $data)
{
    list($fileHandler, $content) = db_get_file($table);

    // add the new data to the end of the array
    array_push($content, $data);

    // encode the array to a string
    $content = json_encode($content);

    // write the new content to the file
    $success = fwrite($fileHandler, $content);

    // close the file handle
    fclose($fileHandler);

    // return true if success contains other than boolean false
    return $success !== false;
}

/**
 * Open a file and get the contents
 * Return fileHandler and content
 *
 * @param string $table
 * @return array
 */
function db_get_file($table)
{
    // set the complete path and filename
    $fileName = __DIR__ . "/db/{$table}.json";

    // open the file for reading and writing
    $fileHandler = fopen($fileName, "w");

    // get the content of the file
    $content = fgets($fileHandler);

    // decode to array if not empty else new array
    $content = ($content != "") ? json_decode($content, true) : [];

    return [$fileHandler, $content];
}