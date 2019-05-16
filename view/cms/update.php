<?php
$app->db->connect();
$create = $app->request->getPost("create");
$delete = $app->request->getGet("postid");

function slugify($str)
{
    $str = mb_strtolower(trim($str));
    $str = str_replace(array('å', 'ä', 'ö'), array('a', 'a', 'o'), $str);
    $str = preg_replace('/[^a-z0-9-]/', '-', $str);
    $str = trim(preg_replace('/-+/', '-', $str), '-');
    return $str;
}

$params = array(
    $app->request->getPost("title"),
    slugify($app->request->getPost("path")),
    slugify($app->request->getPost("slug")),
    $app->request->getPost("data"),
    $app->request->getPost("type"),
    $app->request->getPost("filter"),
    $app->request->getPost("published"),
    $app->request->getPost("id")
);

if (!$create && !$delete) {
    $sql = "UPDATE content SET title = ?, path = ?, slug = ?, data = ?, type = ?, filter = ?, published = ? WHERE id = ?";

    $res = $app->db->executeFetchAll("SELECT * FROM content WHERE slug = ?", [slugify($app->request->getPost("slug"))]);

    if (count($res) > 0) {
        header("Location: " . $_SERVER["HTTP_REFERER"] . "?error=slug");
        exit();
    }

    $res = $app->db->executeFetchAll("SELECT * FROM content WHERE path = ?", [slugify($app->request->getPost("path"))]);

    if (count($res) > 0) {
        header("Location: " . $_SERVER["HTTP_REFERER"] . "?error=path");
        exit();
    }

    $app->db->execute($sql, $params);

    echo "did update";
} else if (!$delete) {
    $sql = "INSERT INTO content (title, path, slug, data, type, filter, published) VALUES  (?, ?, ?, ?, ?, ?, ?)";

    $res = $app->db->executeFetchAll("SELECT * FROM content WHERE slug = ?", [slugify($app->request->getPost("slug"))]);

    if (count($res) > 0) {
        header("Location: " . $_SERVER["HTTP_REFERER"] . "?error=slug");
        exit();
    }

    $res = $app->db->executeFetchAll("SELECT * FROM content WHERE path = ?", [slugify($app->request->getPost("path"))]);

    if (count($res) > 0) {
        header("Location: " . $_SERVER["HTTP_REFERER"] . "?error=path");
        exit();
    }

    $params = array(
        $app->request->getPost("title"),
        slugify($app->request->getPost("path")),
        slugify($app->request->getPost("slug")),
        $app->request->getPost("data"),
        $app->request->getPost("type"),
        $app->request->getPost("filter"),
        $app->request->getPost("published", null)
    );

    var_dump($params);

    $app->db->execute($sql, $params);

    echo "did insert";
} else {
    $sql = "DELETE FROM content WHERE id = ?";

    $app->db->execute($sql, [$delete]);

    echo "did delete";
}


if ($delete) {
    header("Location: delete");
    echo "did location1";
    exit();
} else {
    header("Location: index");
    echo "did location2";
    exit();
}
