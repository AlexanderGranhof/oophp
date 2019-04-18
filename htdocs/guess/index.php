<?php

    require(__DIR__ . "../../../autoloader.php");
    require(__DIR__ . "/config.php");

    use Algn\Guess\Guess;

    session_start();

    $_SESSION["guess"] = new Guess();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preload" href="htdocs/css/main.min.css" as="style">
    <link rel="stylesheet" href="htdocs/css/main.min.css">
    <title>Guess my number</title>
</head>
<body>
    <div class="input-container">
        <input style="background-color: #484848;"  type="number" placeholder="Make your guess..." id="guess">
        <button style="background-color: #616161;" id="submitGuess">Submit guess</button>
        <div class="column-2">
            <button style="background-color: #616161;" id="reset">Reset</button>
            <button style="background-color: #616161;" id="cheat">Cheat</button>
        </div>
    </div>

    <div class="message-container">
        <h1>Im thinking of a number, can you guess it?</h1>
        <h1></h1>
    </div>

    <footer>
        <script src="htdocs/js/main.js"></script>
    </footer>
</body>
</html>