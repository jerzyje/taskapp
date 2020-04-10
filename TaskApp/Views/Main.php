<?php
if(is_array($data['params'])){
    $params = $data['params'][0];
}else{
    $params=$data['params'].'';
}

$parts= explode('+',$params);
?>
<table class="table">
    <thead>
    <tr>
        <th><a href="/main/action_index/sort=id_<?php echo explode('_',$parts[0])[1];?>+<?php echo $parts[1];?>">#</a></th>
        <th><a href="/main/action_index/sort=name_<?php echo explode('_',$parts[0])[1];?>+<?php echo $parts[1];?>">Name</a></th>
        <th><a href="/main/action_index/sort=email_<?php echo explode('_',$parts[0])[1];?>+<?php echo $parts[1];?>">E-mail</a></th>
        <th><a href="/main/action_index/sort=task_<?php echo explode('_',$parts[0])[1];?>+<?php echo $parts[1];?>">Task</a></th>
        <th><a href="/main/action_index/sort=completed_<?php echo explode('_',$parts[0])[1];?>+<?php echo $parts[1];?>">Completed</a></th>
        <th><a href="/main/action_index/sort=edited_<?php echo explode('_',$parts[0])[1];?>+<?php echo $parts[1];?>">Edited</a></th>
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
        if( isset($_SESSION['user']) && $_SESSION['user']=='admin' ){
            echo "<td>{$v['edited']}<a class='btn btn-xs btn-primary ml-2' href='/main/edit_task/{$v['id']}'>edit</a></td>";
        }else{
            echo "<td>{$v['edited']}</td>";
        }
        echo "</tr>";
    }
    ?>

    </tbody>
</table>
<?php
for($i=0;$i<$data['rows']; $i+=3 ){
    echo '<a class="btn btn-xs btn-white ml-2" href="/main/action_index/'.$parts[0].'+page='.($i/3).'">'.($i/3+1).'</a>';
}
?>
