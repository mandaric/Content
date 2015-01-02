<?php

function db_create($table, $data)
{
    $string = json_encode($data);
    $fileName = __DIR__ . "/db/{$table}.json";
    $file = fopen($fileName, 'w');

    fwrite($file, $string);

    fclose($file);
}