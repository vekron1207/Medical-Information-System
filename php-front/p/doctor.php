<div class="min-ht">
    <div class="row z-impcard one" id="one">
        <div class="z-card-description">
            <?php
            $table_row=array("profile_name"=>"Name",
            "profile_qualification"=>"Qualification",
            "profile_specialization"=>"Specialization");
            $query="SELECT props_doctor from patient WHERE id='$username'";
            // echo $query;
            $resultgroup=mysqli_query($conn,$query);
            if($row = $resultgroup->fetch_assoc()){
                $table_ids=explode(",",$row["props_doctor"]);
            }
            $table_db_name="doctor";
            $table_type="not";
            $table_f_actions=array("next"=>"Book Appointment");
            include($front_snippet_partial_path."table-template.php");
            ?>
        </div>
    </div>
</div>