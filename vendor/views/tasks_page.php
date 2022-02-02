<h1>Tasks page</h1>

<table>
    <thead>
        <tr>
            <th>№</th>
            <th>Task</th>
        </tr>
    </thead>
    <tbody>
    <?php if (count($tasks) > 0): ?>
        <?php foreach ($tasks as $task): ?>
            <tr>
                <td><?= $task['id'] ?></td>
                <td><?= $task['name'] ?></td>
                <td>
                    <form action="<?= core\Route::url('index', 'edit') ?>" method="post">
                        <input type="hidden" name="id" value="<?= $task["id"] ?>"/>
                        <input type="submit" value="edit"/>
                    </form>
                </td>
                <td>
                    <form action="<?= core\Route::url('index', 'delete') ?>" method="post">
                        <input type="hidden" name="id" value="<?= $task["id"] ?>"/>
                        <input type="submit" value="delete"/>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php endif; ?>
    </tbody>

</table>
<a href="<?= core\Route::url('index', 'create') ?>">Create</a>

