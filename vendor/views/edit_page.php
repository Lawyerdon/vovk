<form action="<?php Route::url("index", "edit"); ?>">
    <label for="article">Article:</label>
    <input type="text" name="article" value="<?= $data["task"] ?>" id="article" autofocus/>
    <input type="hidden" name="id" value="<?= $data["id"] ?>"/>
    <input type="submit" value="Change value"/>
</form>