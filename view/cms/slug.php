<?php
$filter = new \Algn\TextFilter\TextFilter();

$app->db->connect();

$uriElements = explode("/", $_SERVER['REQUEST_URI']);
$slug = array_pop($uriElements);


$post = $app->db->executeFetchAll("SELECT * FROM content WHERE slug = ?;", [$slug]);

if ($post) {
    $post = array_pop($post);

    $filters = explode(",", $post->filter);

    $text = $post->data;

    foreach ($filters as $filterType) {
        $res = $filter->parse($text, $filterType);

        if ($res) {
            $text = $res;
        }
    }

    $post->data = $text;
}

?>
<nav>
    <a href=".">Home</a>
    <a href="./reset">Reset</a>
    <a href="./admin">Admin</a>
    <a href="./create">Create</a>
    <a href="./delete">Delete</a>
</nav>


<?php if ($post) : ?>

    <h1><?= $post->title ?></h1>
    <p><?= $post->data ?></p>

<?php else : ?>

    <h1>404 post not found</h1>

<?php endif; ?>