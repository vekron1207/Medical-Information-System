<?php // var_dump($table_row);?>
<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <?php foreach($table_row as $row_id=>$row_name){?>
                <th><?php echo $row_name;?></th>
                <?php
            }
            if(sizeof($table_f_actions)>0){?>
                <th>Action(s)</th>
            <?php } ?>
        </tr>
    </thead>
    <tbody>
        <?php
        if($table_type=="full"){
            $query="SELECT * from ".$table_db_name;
            // echo $query;
            $resultgroup=mysqli_query($conn,$query);
            while($row = $resultgroup->fetch_assoc()){
                ?>
                <tr>
                    <?php foreach($table_row as $row_id=>$row_name){ ?>
                    <td><?php echo $row[$row_id];?></td>
                    <?php } 
                    foreach($table_f_actions as $table_f_action=>$table_f_action_value){?>
                        <td><button class="btn btn-danger"><?php echo $table_f_action_value;?></button></td>
                    <?php } ?>
                </tr>
                <?php 
            }
        }
        else{
            foreach($table_ids as $table_id){
                $query="SELECT * from ".$table_db_name." WHERE id='".$table_id."'";
                // echo $query;
                $resultgroup=mysqli_query($conn,$query);
                if($row = $resultgroup->fetch_assoc()){
                    ?>
                    <tr>
                        <?php foreach($table_row as $row_id=>$row_name){ ?>
                        <td><?php echo $row[$row_id];?></td>
                        <?php } 
                        foreach($table_f_actions as $table_f_action=>$table_f_action_value){?>
                            <td><button class="btn btn-danger"><?php echo $table_f_action_value;?></button></td>
                        <?php } ?>
                    </tr>
                    <?php 
                }
            }
        }
        ?>
    </tbody>
</table>