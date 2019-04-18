<?php
    error_reporting(-1);
    ini_set("display_errors", 1);

    set_exception_handler(function ($e) {
        echo "<p>Anax: Uncaught exception:</p><p>Line "
            . $e->getLine()
            . " in file "
            . $e->getFile()
            . "</p><p><code>"
            . get_class($e)
            . "</code></p><p>"
            . $e->getMessage()
            . "</p><p>Code: "
            . $e->getCode()
            . "</p><pre>"
            . $e->getTraceAsString()
            . "</pre>";
    });
