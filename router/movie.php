<?php

/**
 * Show all movies.
 */
$app->router->get("movie", function () use ($app) {
    $title = "Movie database | oophp";

    // $app->db->connect();
    // $sql = "SELECT * FROM movie;";
    // $res = $app->db->executeFetchAll($sql);

    $app->page->add("../htdocs/php-pdo-mysql/index");

    return $app->page->render([
        "title" => $title,
    ]);
});

$app->router->post("movie", function () use ($app) {
    $title = "Movie database | oophp";

    // $app->db->connect();
    // $sql = "SELECT * FROM movie;";
    // $res = $app->db->executeFetchAll($sql);

    $app->page->add("../htdocs/php-pdo-mysql/index");

    return $app->page->render([
        "title" => $title,
    ]);
});
