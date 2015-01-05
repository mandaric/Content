<?php

/**
 * Main
 */

// Load Config
require __DIR__ . "/config.php";

// Load generic helper functions
require __DIR__ . "/helpers.php";

// Load routes and execute router
require __DIR__ . "/router.php";

// Load database
require __DIR__ . "/database.php";

/**
 * Modules
 */

// Page Module
require __DIR__ . "/../modules/page/bootstrap.php";

// Post Module
//require __DIR__ . "/../modules/post/bootstrap.php";

// Comment Module
//require __DIR__ . "/../modules/comment/bootstrap.php";

// User Module
//require __DIR__ . "/../modules/user/bootstrap.php";

start();
