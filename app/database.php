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
    // get the file handler and contents of the file
    list($fileHandler, $contents) = db_get_file($table);

    // add the new data to the end of the array
    $contents[] = $data;

    // save the data to the database
    return db_save($fileHandler, $contents);
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

    // get the contents of a file
    $contents = @file_get_contents($fileName);

    // open the file for reading and writing
    $fileHandler = fopen($fileName, "w+");

    // decode to array if not empty else new array
    $contents = $contents ? json_decode($contents, true) : [];

    // return the file handler and contents of the file
    return [$fileHandler, $contents];
}

/**
 * Save the file and return a boolean if successful
 *
 * @param object $fileHandler
 * @param array $contents
 * @return bool
 */
function db_save($fileHandler, array $contents)
{
    // add index
    $contents = db_index($contents);

    // encode the array to a string
    $contents = json_encode($contents);

    // write the new content to the file
    $success = fwrite($fileHandler, $contents);

    // close the file handle
    fclose($fileHandler);

    // return the result
    return $success  !== false;
}

/**
* Add the index to the $content array items
*
* @param array $contents
* @return array
*/
function db_index($contents)
{
    // get the last item
    $last_item = end($contents);

    // check if the last item has an id
    if (!isset($last_item['id']))
    {
        // set the default id
        $item_id = 1;

        // check if there are more than 1 items
        if (count($contents) > 1)
        {
            // get the former last item key
            $former_last_array_key = (count($contents) - 2);

            // check if it exists
            if (array_key_exists($former_last_array_key, $contents))
            {
                // and add 1
                $item_id = $contents[$former_last_array_key]['id'] + 1;
            }
        }

        // get the last item array key
        $last_item_array_key = (count($contents) - 1);

        // set the new id to the last item if it exists in the array
        if (array_key_exists($last_item_array_key, $contents))
        {
            $contents[$last_item_array_key]['id'] = $item_id;
        }
    }

    return $contents;
}
