<?php
use Anax\Url\Exception;

try {
    $app->db->connect();

    $res = $app->db->executeFetchAll("SELECT * FROM content WHERE type = 'post'");
} catch (Exception $error) {
    header("Location: index");
    exit();
}

// var_dump($res[2])

?>


<nav>
    <a href=".">Home</a>
    <a href="./reset">Reset</a>
    <a href="./admin">Admin</a>
    <a href="./create">Create</a>
    <a href="./delete">Delete</a>
</nav>

<h1>Hem | Mina poster</h1>

<?php foreach ($res as $index => $row) : ?>
    <a href="<?= $row->slug ? $row->slug : $row->path ?>"><?= $row->title ?></a>
    <br>
<?php endforeach; ?>