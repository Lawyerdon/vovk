<form action="<?= core\Route::url("index", "store")?>" method="post">
    <label for="article">Article:</label>
    <input type="text" name="name" id="article" autofocus/>
    <input type="submit">
</form>