<div class="min-ht">
<div id="response"></div>
<form role="form" action="javascript:void(0)" onsubmit="return false;" class="form-horizontal ajaxsubmitform" id="profile">
<div class="row z-impcard one" id="one">
    <span class="pull-right btn btn-lg z-impcard-toggle"><i class="glyphicon glyphicon-pencil"></i> Edit</span>
	<div class="z-card-description">
        <?php
        $form_status="disabled";
        $form_items_types=array("profile_name"=>"text",
        "profile_gender"=>"select",
        "profile_dob"=>"text",
        "profile_identity"=>"string",
        "profile_mobile"=>"text",
        "profile_email"=>"text",
        "profile_address"=>"text",
        "vitals"=>"string");
        $form_items=array("profile_name"=>"Name",
        "profile_gender"=>"Gender",
        "profile_dob"=>"Date of Birth",
        "profile_identity"=>"Govt ID Number",
        "profile_mobile"=>"Mobile",
        "profile_email"=>"Email",
        "profile_address"=>"Contact Address",
        "vitals"=>"Vitals");
        $form_items_required=array("profile_name","profile_dob","profile_mobile","profile_gender");
        $form_items_values=array("profile_gender"=>array("M"=>"Male",
        "F"=>"Female"));
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