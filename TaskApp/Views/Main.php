    <table>
    <thead>
        <td>Name</td>
        <td>E-mail</td>
        <td>Task</td>
    </thead>
<?php
    foreach($data as $v){
        echo "<tr>";
        echo "<td>{$v['name']}</td>";
        echo "<td>{$v['email']}</td>";
        echo "<td>{$v['task']}</td>";
        echo "</tr>";
    }
?>

    </table>
