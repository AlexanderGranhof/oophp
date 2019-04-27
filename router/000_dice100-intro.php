<?php

$app->router->get("dice100-intro", function () use ($app) {
    $title = "Dice100";
    $data = [
        "class" => "hello-world",
        "content" => "Hello World in " . __FILE__,
    ];

    $app->page->add("anax/v2/dice100/default", $data);

    return $app->page->render([
        "title" => $title,
    ]);
});
