<?php

$app->router->get("guess-intro", function () use ($app) {
    $title = "Guess";
    $data = [
        "class" => "hello-world",
        "content" => "Hello World in " . __FILE__,
    ];

    $app->page->add("anax/v2/guess/default", $data);

    return $app->page->render([
        "title" => $title,
    ]);
});
