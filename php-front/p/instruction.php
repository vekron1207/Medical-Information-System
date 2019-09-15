<div class="min-ht">
    <div class="row z-impcard one" id="one">
        <div class="z-card-description">
            <?php
                $table_row=array(
                "profile_medicine_id"=>"Medicines",
                "profile_medicine_record"=>"Meds Ins",
                "profile_pathology_id"=>"Tests Prescribed",
                "profile_pathology_record"=>"Test Ins",
                "profile_next"=>"Next Visit");
                $query="SELECT props_instruction from patient WHERE id='$username'";
                // echo $query;
                $resultgroup=mysqli_query($conn,$query);
                if($row = $resultgroup->fetch_assoc()){
                    $table_ids=explode(",",$row["props_instruction"]);
                }
                $table_db_name="instruction";
                $table_type="none";
                $table_f_actions=array();
                include($front_snippet_partial_path."table-template.php");
            ?>
        </div>
    </div>
</div>