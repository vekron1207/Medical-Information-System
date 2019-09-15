<div class="min-ht">
    <div class="row z-impcard one" id="one">
        <div class="z-card-description">
            <?php
                $table_row=array("profile_type"=>"Appointment Status",
                                "props_doctor"=>"Doctor",
                                "props_patient"=>"Patient",
                                "props_time"=>"Time");
                $query="SELECT props_record from patient WHERE id='$username'";
                // echo $query;
                $resultgroup=mysqli_query($conn,$query);
                if($row = $resultgroup->fetch_assoc()){
                    $table_ids=explode(",",$row["props_record"]);
                }
                $table_db_name="record";
                $table_type="none";
                $table_f_actions=array();
                include($front_snippet_partial_path."table-template.php");
            ?>
        </div>
    </div>
</div>