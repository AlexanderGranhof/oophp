<?php

$app->router->get("textfilter", function () use ($app) {
    $title = "CMS page";
    $data = [
        "class" => "hello-world",
        "content" => "Hello World in " . __FILE__,
    ];

    $app->page->add("textfilter/index", $data);

    return $app->page->render([
        "title" => $title,
    ]);
});

$app->router->post("textfilter", function () use ($app) {
    $title = "CMS page";
    $data = [
        "class" => "hello-world",
        "content" => "Hello World in " . __FILE__,
    ];

    $app->page->add("textfilter/index", $data);

    return $app->page->render([
        "title" => $title,
    ]);
});
