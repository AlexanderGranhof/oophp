<?php
require(__DIR__ . "/autoload.php");
require(__DIR__ . "/config.php");

session_start();

// Change to JSON post instead of form
$_POST = json_decode(file_get_contents('php://input'), true);

if (!isset($_POST["method"])) {
    echo "missing 'method' parameter in json body";
    return http_response_code(400);
}

$method = $_POST["method"];

switch ($method) {
    case "makeGuess":
        if (!isset($_POST["guess"])) {
            echo "missing 'guess' parameter in json body";
            return http_response_code(400);
        }
        try {
            echo $_SESSION["guess"]->makeGuess($_POST["guess"]);
        } catch (GuessException $error) {
            echo $error->getMessage();
            return http_response_code(400);
        }
        break;
    case "getTries":
        echo $_SESSION["guess"]->getTries();
        break;
    case "getNumber":
        echo $_SESSION["guess"]->getNumber();
        break;
    case "reset":
        echo $_SESSION["guess"]->reset();
        break;
    default:
        echo "invalid 'method' value in json body";
        return http_response_code(400);
};
