<form action="<?= core\Route::url("index", "update"); ?>" method="post">
    <label for="article">Article:</label>
    <textarea name="name"> <?= $task['name'] ?> </textarea>
    <input type="hidden" name="id" value="<?= $task["id"] ?>"/>
    <input type="submit" value="Change value"/>
</form>