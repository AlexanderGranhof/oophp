<?php
$app->db->connect();

$res = $app->db->executeFetchAll("SELECT * FROM content WHERE type = 'post'");

?>

<nav>
    <a href=".">Home</a>
    <a href="./reset">Reset</a>
    <a href="./admin">Admin</a>
    <a href="./create">Create</a>
    <a href="./delete">Delete</a>
</nav>

<h1>Välj en post att radera</h1>

<?php foreach ($res as $index => $row) : ?>
    <a href="update?postid=<?= $row->id ?>"><?= $row->title ?></a>
    <br>
<?php endforeach; ?>