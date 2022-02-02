<form action="<?= core\Route::url('index', 'update'); ?>" method="post">
    <label for="article">Article:</label>
    <input type="text" name="name" value="<?= $task['name'] ?>"/>
    <input type="hidden" name="id" value="<?= $task['id'] ?>"/>
    <input type="submit" value="Change value"/>
</form>