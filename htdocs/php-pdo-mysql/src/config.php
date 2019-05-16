<?php
/**
 * Set the error reporting.
 */
error_reporting(-1);              // Report all type of errors
ini_set("display_errors", 1);     // Display all errors



/**
 * Default exception handler.
 */
set_exception_handler(function ($e) {
    echo "Uncaught exception: <p>"
        . $e->getMessage()
        . "</p><p>Code: "
        . $e->getCode()
        . "</p><pre>"
        . $e->getTraceAsString()
        . "</pre>";
});



/**
 * Details for connecting to the database.
 */

if ($_SERVER["SERVER_NAME"] === "www.student.bth.se") {
    // Studentserver
    $databaseConfig = [
        "dsn"      => "mysql:host=blu-ray.student.bth.se;dbname=algn18;",
        "login"    => "algn18",
        "password" => null,
        "options"  => [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'"],
    ];
} else {
    // Lokal
    $databaseConfig = [
        "dsn"      => "mysql:host=127.0.0.1;dbname=algn18;",
        "login"    => "algn18",
        "password" => "algn18",
        "options"  => [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'"],
    ];
}
