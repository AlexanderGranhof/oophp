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

    input.error {
        border: 1px solid red;
    }
</style>

<nav>
    <a href=".">Home</a>
    <a href="./reset">Reset</a>
    <a href="./admin">Admin</a>
    <a href="./create">Create</a>
    <a href="./delete">Delete</a>
</nav>


<h1>Skapa en post</h1>

<form action="update" method="post">
    <div>
        <label for="title">Title</label>
        <input type="text" id="title" name="title">
    </div>
    <div>
        <label for="path">Path <?= $app->request->getGet("error") == "path" ? "(pathen finns redan)" : "" ?></label>
        <input required class="<?= $app->request->getGet("error") == "path" ? "error" : "" ?>" type="text" id="path" name="path">
    </div>
    <div>
        <label for="slug">Slug <?= $app->request->getGet("error") == "slug" ? "(sluggen finns redan)" : "" ?></label>
        <input required class="<?= $app->request->getGet("error") == "slug" ? "error" : "" ?>" type="text" id="slug" name="slug">
    </div>
    <div>
        <label for="data">Text</label>
        <textarea id="data" name="data"></textarea>
    </div>
    <div>
        <label for="type">Type</label>
        <input type="text" id="type" name="type">
    </div>
    <div>
        <label for="filter">Filter</label>
        <input type="text" id="filter" name="filter">
    </div>
    <!-- <div>
        <label for="published">Published</label>
        <input type="text" id="published" name="published">
    </div> -->
    <div>
        <input type="submit" id="submit" name="submit" value="submit">
    </div>
    <input style="display: none" id="create" name="create" type="text" value="true">
</form>