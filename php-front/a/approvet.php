<div class="min-ht">
    <div class="row z-impcard one" id="one">
        <div class="z-card-description">
            <?php
            $usernames="";
            $table_type="full";
            $table_f_actions=array();
            switch($approvet){
                case 'patient': $table_row=array("profile_name"=>"Name",
                                                "profile_vitals"=>"Vitals",
                                                "profile_gender"=>"Gender",
                                                "profile_dob"=>"DOB",
                                                "profile_moblie"=>"Mobile",
                                                "profile_email"=>"Email",);
                                $table_db_name="patient";
                                $table_f_actions=array("activate"=>"Activate");
                break;
                case 'doctor': $table_row=array("profile_name"=>"Name",
                                                "profile_qualification"=>"Qualification",
                                                "profile_specialization"=>"Specialization");
                                $table_db_name="doctor";
                                $table_f_actions=array("activate"=>"Activate");
                break;
                case 'medicine': $table_row=array("profile_name"=>"Name",
                                                "profile_description"=>"Description");
                                $table_db_name="medicine";
                break;
                case 'pathology': $table_row=array("profile_name"=>"Name",
                                                "profile_description"=>"Description");
                                $table_db_name="pathology";
                break;
            }
            include($front_snippet_partial_path."table-template.php");
            ?>
        </div>
    </div>
</div>