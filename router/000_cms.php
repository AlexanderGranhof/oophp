<?php

$app->router->get("cms", function () use ($app) {
    $title = "CMS page";
    $data = [
        "class" => "hello-world",
        "content" => "Hello World in " . __FILE__,
    ];

    $app->page->add("cms/index", $data);

    return $app->page->render([
        "title" => $title,
    ]);
});

$app->router->get("cms/index", function () use ($app) {
    $title = "CMS page";
    $data = [
        "class" => "hello-world",
        "content" => "Hello World in " . __FILE__,
    ];

    $app->page->add("cms/index", $data);

    return $app->page->render([
        "title" => $title,
    ]);
});


$app->router->post("cms/update", function () use ($app) {
    $title = "CMS page";
    $data = [
        "class" => "hello-world",
        "content" => "Hello World in " . __FILE__,
    ];

    $app->page->add("cms/update", $data);

    return $app->page->render([
        "title" => $title,
    ]);
});

$app->router->get("cms/update", function () use ($app) {
    $title = "CMS page";
    $data = [
        "class" => "hello-world",
        "content" => "Hello World in " . __FILE__,
    ];

    $app->page->add("cms/update", $data);

    return $app->page->render([
        "title" => $title,
    ]);
});

$app->router->get("cms/delete", function () use ($app) {
    $title = "CMS page";
    $data = [
        "class" => "hello-world",
        "content" => "Hello World in " . __FILE__,
    ];

    $app->page->add("cms/delete", $data);

    return $app->page->render([
        "title" => $title,
    ]);
});

$app->router->get("cms/hem", function () use ($app) {
    $title = "CMS page";
    $data = [
        "class" => "hello-world",
        "content" => "Hello World in " . __FILE__,
    ];

    $app->page->add("cms/index", $data);

    return $app->page->render([
        "title" => $title,
    ]);
});

$app->router->get("cms/om", function () use ($app) {
    $title = "CMS page";
    $data = [
        "class" => "hello-world",
        "content" => "Hello World in " . __FILE__,
    ];

    $app->page->add("cms/about", $data);

    return $app->page->render([
        "title" => $title,
    ]);
});

$app->router->get("cms/reset", function () use ($app) {
    $title = "CMS page";
    $data = [
        "class" => "hello-world",
        "content" => "Hello World in " . __FILE__,
    ];

    $app->page->add("cms/reset", $data);

    return $app->page->render([
        "title" => $title,
    ]);
});

$app->router->get("cms/admin", function () use ($app) {
    $title = "CMS page";
    $data = [
        "class" => "hello-world",
        "content" => "Hello World in " . __FILE__,
    ];

    $app->page->add("cms/admin", $data);

    return $app->page->render([
        "title" => $title,
    ]);
});


$app->router->get("cms/create", function () use ($app) {
    $title = "CMS page";
    $data = [
        "class" => "hello-world",
        "content" => "Hello World in " . __FILE__,
    ];

    $app->page->add("cms/create", $data);

    return $app->page->render([
        "title" => $title,
    ]);
});

$app->router->get("cms/*", function () use ($app) {
    $title = "CMS page";
    $data = [
        "class" => "hello-world",
        "content" => "Hello World in " . __FILE__,
    ];

    $app->page->add("cms/slug", $data);

    return $app->page->render([
        "title" => $title,
    ]);
});
