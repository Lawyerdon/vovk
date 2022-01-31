
<h1>Tasks page</h1>

<table>
    <thead>
        <tr>
            <th>№</th>
            <th>Tansk</th>
        </tr>
    </thead>
    <tbody>
    <?php if(count($tasks) > 0):?>
    <?php foreach($tasks as $task):?>
        <tr>
            <td><?= $task['id']?></td>
            <td><?= $task['name']?></td>
            <td>
                <form action="">
                    <input type="hidden" name="edit">
                    <input type="hidden" name="id" value="<?= $task["id"] ?>"/>
                    <input type="submit" value="edit"/>
                </form>
            </td>
            <td>
                <form action="">
                    <input type="hidden" name="delete">
                    <input type="hidden" name="id" value="<?= $task["id"] ?>"/>
                    <input type="submit" value="delete"/>
                </form>
            </td>
        </tr>
    <?php endforeach;?>
    <?php endif;?>
    </tbody>


</table>
