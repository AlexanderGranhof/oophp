<?php

namespace Anax\View;

// $_SESSION["player"] = new Algn\Dice100\Player();
// $_SESSION["ai"] = new Algn\Dice100\Player();
// $_SESSION["gameStart"] = false;


echo "<pre>";


if (!$session->has("player")) {
    $session->set("player", new \Algn\Dice100\Player());
    $session->set("ai", new \Algn\Dice100\Player());
    $session->set("gameStart", false);
}

if (!$session->has("gameStart")) {
    $ai = $session->get("ai");

    if ($ai->getStart() == 0) {
        $aiRoll = $ai->rollStart();
        $aiSum = array_sum($aiRoll);
        echo "AI rolled $aiSum \n";
    } else {
        echo "AI rolled {$ai->getStart()} \n";
    }

    if ($request->getPost("roll", null) && $session->get("player")->getStart() == 0) {
        $playerRoll = $session->get("player")->rollStart();
        $playerSum = array_sum($playerRoll);

        echo "You rolled $playerSum \n\n";
    }

    if ($session->get("ai")->getStart() !== 0 && $session->get("player")->getStart() !== 0) {
        $_SESSION["gameStart"] = true;

        $playerStarts = $session->get("ai")->getStart() < $session->get("player")->getStart();

        echo ($playerStarts ? "Player" : "AI") . " starts!\n";

        if (!$playerStarts) {
            $roll = implode(",", $session->get("ai")->roll());
            $_SESSION["ai"]->finishTurn();
            $ai = $session->get("ai");

            echo "\nAI rolled: $roll\n";
            echo "AI score: {$ai->getScore()}\n\n";
        }
    }
} else {
    $ai = $session->get("ai");
    $player = $session->get("player");

    if ($request->getPost("roll", null)) {

        $roll = implode(",", $session->get("player")->roll());
        echo "You rolled: $roll\n";
        echo "Your turn score: {$session->get("player")->getRoundScore()}\n\n";

        if (strpos($roll, '1') !== false) {
            $roll = implode(",", $ai->roll());
            $ai->finishTurn();

            echo "AI rolled: $roll\n";
            echo "AI score: {$ai->getScore()}\n\n";
        }
    }

    if ($request->getPost("end_turn", null)) {
        $player->finishTurn();

        $roll = implode(",", $ai->roll());
        $ai->finishTurn();

        echo "AI rolled: $roll\n";
        echo "AI score: {$ai->getScore()}\n\n";
    }

    echo "AI score: {$ai->getScore()} \n";
    echo "Your score: {$player->getScore()} \n";
}

if ($session->get("player")->getScore() >= $session->get("player")->getMaxScore()) {
    echo "\nYou win!";

    echo "\n\nYour histogram: \n";
    echo $session->get("player")->getHistogram() . "\n";
    echo "AI histogram: \n";
    echo $session->get("ai")->getHistogram() . "\n";

    $session->delete("player");
    $session->delete("ai");
    $session->delete("gameStart");

    return;
}

if ($session->get("ai")->getScore() >= $session->get("ai")->getMaxScore()) {
    echo "\nAI win!";

    echo "\n\nYour histogram: \n";
    echo $session->get("player")->getHistogram() . "\n";
    echo "AI histogram: \n";
    echo $session->get("ai")->getHistogram() . "\n";

    $session->delete("player");
    $session->delete("ai");
    $session->delete("gameStart");

    return;
}

echo "\n\nYour histogram: \n";
echo $session->get("player")->getHistogram() . "\n";
echo "AI histogram: \n";
echo $session->get("ai")->getHistogram() . "\n";

echo "</pre>";
?>

<form action="./dice" method="POST">
    <input type="submit" name="roll" value="roll">
    <?= $session->get("player")->getRoundScore() > 0 ? "<input type=\"submit\" name=\"end_turn\" value=\"end turn\">" : "" ?>
</form>
