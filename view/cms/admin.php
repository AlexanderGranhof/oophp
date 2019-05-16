<?php
$app->db->connect();

$postid = $app->request->getGet("postid");

if (!$postid) {
    $res = $app->db->executeFetchAll("SELECT * FROM content WHERE type = 'post'");
} else {
    $res = $app->db->executeFetchAll("SELECT * FROM content WHERE id = ?;", [$postid]);

    $post = array_pop($res);
}
?>

<style>
    form>div>input,
    form>div>label {
        display: block;
    }

    form>div>input {
        width: 100%;
    }

    form>div>label::after {
        content: ":"
    }

    form>div {
        margin: 15px 0;
    }
</style>

<nav>
    <a href=".">Home</a>
    <a href="./reset">Reset</a>
    <a href="./admin">Admin</a>
    <a href="./create">Create</a>
    <a href="./delete">Delete</a>
</nav>

<?php if (!$postid) : ?>

    <h1>Välj en post att redigera</h1>

    <?php foreach ($res as $index => $row) : ?>
        <a href="?postid=<?= $row->id ?>"><?= $row->title ?></a>
        <br>
    <?php endforeach; ?>

<?php else : ?>

    <h1>Uppdatera Post</h1>

    <form action="update" method="post">
        <div>
            <label for="title">Title</label>
            <input type="text" id="title" name="title" value="<?= $post->title ?>">
        </div>
        <div>
            <label for="path">Path</label>
            <input required type="text" id="path" name="path" value="<?= $post->path ?>">
        </div>
        <div>
            <label for="slug">Slug</label>
            <input required type="text" id="slug" name="slug" value="<?= $post->slug ?>">
        </div>
        <div>
            <label for="data">Text</label>
            <textarea id="data" name="data"><?= $post->data ?></textarea>
        </div>
        <div>
            <label for="type">Type</label>
            <input type="text" id="type" name="type" value="<?= $post->type ?>">
        </div>
        <div>
            <label for="filter">Filter</label>
            <input type="text" id="filter" name="filter" value="<?= $post->filter ?>">
        </div>
        <div>
            <input type="submit" id="submit" name="submit" value="submit">
        </div>
        <input style="display: none" id="id" name="id" type="text" value="<?= $postid ?>">
    </form>

<?php endif; ?>