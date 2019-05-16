<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title><?= $title . $titleExtended ?></title>
    <link rel="stylesheet" href="php-pdo-mysql/css/style.css">
</head>

<body>

    <navbar class="navbar">
        <a href="?route=select">Show movies data</a>
        <a href="?">Show all movies</a>
        <a href="?route=reset">Reset database</a>
        <a href="?route=search-title">Search by title</a>
        <a href="?route=search-year">Search by year</a>
        <a href="?route=movie-select">Add / Edit / Delete</a>
        <!--    <a href="?route=movie-edit">Edit</a> | -->
        <a href="?route=show-all-sort">Show sortable movies</a>
        <a href="?route=show-all-paginate">Show all (pages)</a>
    </navbar>

    <h1>My Movie Database</h1>

    <main>