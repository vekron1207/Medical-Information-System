<div class="min-ht">
    <div id="response"></div>
    <form role="form" action="javascript:void(0)" onsubmit="return false;" class="form-horizontal ajaxsubmitform" id="register">
        <div class="row z-impcard one" id="one">
            <div class="z-card-description">
                <?php
                $form_status="empty";
				$form_items_types=array("username"=>"text",
									"profile_name"=>"text",
                                    "password"=>"password",
                                    "usertype"=>"select");
				$form_items=array("username"=>"Username",
								"profile_name"=>"Full Name",
                                "password"=>"Password",
                                "usertype"=>"Usertype");
                $form_items_required=array("username","password","usertype");
				$form_items_values=array("usertype"=>array("p"=>"Patient",
                                                    "d"=>"Doctor"));
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