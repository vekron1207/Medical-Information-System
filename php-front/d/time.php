<div class="min-ht">
    <div class="row z-impcard one" id="one">
        <div class="z-card-description">
        <?php
            $table_db_name="time";
            $table_row=array("profile_date_from"=>"From Date",
                            "profile_date_to"=>"To Date",
                            "profile_time_from"=>"From Time",
                            "profile_time_to"=>"To Time",
                            "profile_next"=>"Next"
                            );
            $query="SELECT props_time from doctor WHERE id='$username'";
            // echo $query;
            $resultgroup=mysqli_query($conn,$query);
            if($row = $resultgroup->fetch_assoc()){
                $table_ids=explode(",",$row["props_time"]);
            }
            $table_type="none";
            $table_f_actions=array("prescription"=>"Presc.");
            include($front_snippet_partial_path."table-template.php");
        ?>
        </div>
    </div>
</div>