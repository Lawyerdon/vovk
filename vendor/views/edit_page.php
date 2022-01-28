<form action="<?php Route::url("index", "edit"); ?>">
    <label for="article">Article:</label>
    <input type="text" name="article" id="article" autofocus/>
    <input type="hidden" name="id" value="<?= $_POST["forChange"]; ?>"/>
    <input type="submit" value="Change value"/>
</form>