<?php
    require(__DIR__ . "../../../autoloader.php");

    session_start();

    // $_SESSION["player"] = new Algn\Dice100\Player();
    // $_SESSION["ai"] = new Algn\Dice100\Player();
    // $_SESSION["gameStart"] = false;

    echo "<pre>";


    if (!isset($_SESSION["player"])) {
        $_SESSION["player"] = new Algn\Dice100\Player();
        $_SESSION["ai"] = new Algn\Dice100\Player();
        $_SESSION["gameStart"] = false;
    }

    if (!$_SESSION["gameStart"]) {
        if ($_SESSION["ai"]->start == 0) {
            $aiRoll = $_SESSION["ai"]->rollStart();
            $aiSum = array_sum($aiRoll);
            echo "AI rolled $aiSum \n";
        } else {
            echo "AI rolled {$_SESSION["ai"]->start} \n";
        }
    
        if (isset($_POST["roll"]) && $_SESSION["player"]->start == 0) {
            $playerRoll = $_SESSION["player"]->rollStart();
            $playerSum = array_sum($playerRoll);
    
            echo "You rolled $playerSum \n\n";
        }

        if ($_SESSION["ai"]->start !== 0 && $_SESSION["player"]->start !== 0) {
            $_SESSION["gameStart"] = true;

            $playerStarts = $_SESSION["ai"]->start < $_SESSION["player"]->start;

            echo ($playerStarts ? "Player" : "AI") . " starts!\n";

            if (!$playerStarts) {
                $roll = implode(",", $_SESSION["ai"]->roll());
                $_SESSION["ai"]->finishTurn();
                
                echo "\nAI rolled: $roll\n";
                echo "AI score: {$_SESSION["ai"]->score}\n\n";
            }
        }
    } else {
        if (isset($_POST["roll"])) {
            $roll = implode(",", $_SESSION["player"]->roll());
            echo "You rolled: $roll\n";
            echo "Your turn score: {$_SESSION["player"]->roundScore}\n\n";

            if (strpos($roll, '1') !== false) {
                $roll = implode(",", $_SESSION["ai"]->roll());
                $_SESSION["ai"]->finishTurn();
                
                echo "AI rolled: $roll\n";
                echo "AI score: {$_SESSION["ai"]->score}\n\n";
            }
        }

        if(isset($_POST["end_turn"])) {
            $_SESSION["player"]->finishTurn();

            $roll = implode(",", $_SESSION["ai"]->roll());
            $_SESSION["ai"]->finishTurn();
            
            echo "AI rolled: $roll\n";
            echo "AI score: {$_SESSION["ai"]->score}\n\n";
        }

        echo "AI score: {$_SESSION["ai"]->score} \n";
        echo "Your score: {$_SESSION["player"]->score} \n";
    }

    if ($_SESSION["player"]->score >= $_SESSION["player"]->maxScore) {
        echo "\nYou win!";

        unset($_SESSION["player"]);
        unset($_SESSION["ai"]);
        unset($_SESSION["gameStart"]);

        return;
    }

    if ($_SESSION["ai"]->score >= $_SESSION["ai"]->maxScore) {
        echo "\nAI win!";

        unset($_SESSION["player"]);
        unset($_SESSION["ai"]);
        unset($_SESSION["gameStart"]);

        return;
    }

    echo "</pre>";
?>

<form action="." method="POST">
    <input type="submit" name="roll" value="roll">
    <?= $_SESSION["player"]->roundScore > 0 ? "<input type=\"submit\" name=\"end_turn\" value=\"end turn\">" : "" ?>
</form>