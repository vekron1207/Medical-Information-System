<div class="min-ht">
    <div class="row z-impcard one" id="one">
        <div class="z-card-description">
            <?php
            $table_row=array("profile_name"=>"Name",
            "profile_vitals"=>"Vitals",
            "profile_gender"=>"Gender",
            "profile_dob"=>"DOB",
            "profile_moblie"=>"Mobile",
            "profile_email"=>"Email");
            $query="SELECT props_patient from doctor WHERE id='$username'";
            // echo $query;
            $resultgroup=mysqli_query($conn,$query);
            if($row = $resultgroup->fetch_assoc()){
                $table_ids=explode(",",$row["props_patient"]);
            }
            $table_db_name="patient";
            $table_type="none";
            $table_f_actions=array("prescription"=>"Presc.");
            include($front_snippet_partial_path."table-template.php");
            ?>
        </div>
    </div>
</div>