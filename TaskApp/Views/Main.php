<table class="table">
    <thead>
    <tr>
        <th>#</th>
        <th>Name</th>
        <th>E-mail</th>
        <th>Task</th>
        <th>Completed</th>
        <th>Edited</th>
    </tr>
    </thead>
    <tbody>

    <?php
    foreach($data['db'] as $v){
        echo "<tr>";
        echo "<td>{$v['id']}</td>";
        echo "<td>{$v['name']}</td>";
        echo "<td>{$v['email']}</td>";
        echo "<td>{$v['task']}</td>";
        echo "<td>{$v['completed']}</td>";
        echo "<td>{$v['edited']}</td>";
        echo "</tr>";
    }
    ?>

    </tbody>
</table>

