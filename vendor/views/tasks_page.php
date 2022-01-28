
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
        </tr>
    <?php endforeach;?>
    <?php endif;?>
    </tbody>


</table>
