<div class="min-ht">
    <div id="response"></div>
    <form role="form" action="javascript:void(0)" onsubmit="return false;" class="form-horizontal ajaxsubmitform" id="profile">
        <div class="row z-impcard one" id="one">
            <span class="pull-right btn btn-lg z-impcard-toggle"><i class="glyphicon glyphicon-pencil"></i> Edit</span>
	        <div class="z-card-description">
                <?php
                $form_status="disabled";
                $form_items_types=array("profile_name"=>"text",
                                    "profile_qualification"=>"text",
                                    "profile_specialization"=>"text");
                $form_items=array("profile_name"=>"Name",
                                "profile_qualification"=>"Qualification",
                                "profile_specialization"=>"Specialization");
                                $form_items_required=array("profile_name","profile_qualification","profile_specialization");
                                include($front_snippet_partial_path."form-template.php");
                ?>
	        </div>
	        <button class="btn btn-lg z-card-action">
	        	Continue
	        </button>
	    </div>
    </form>

    <script>
    $(".ajaxsubmitform").zform();
    </script>
</div>