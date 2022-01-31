<form action="<?php Route::url("index", "edit"); ?>" method="post">
    <label for="article">Article:</label>
    <input type="text" name="article" value="<?= $task["article"] ?>" id="article" autofocus/>
    <input type="hidden" name="id" value="<?= $task["id"] ?>"/>
    <input type="submit" value="Change value"/>
</form>