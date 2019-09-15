<div id="response"></div>
<form role="form" action="javascript:void(0)" onsubmit="return false;" class="ajaxsubmitform" id="dashboard" >
	<div class="row z-impcard one" id="one">
		<div class="z-card-description">
			<div class="row form-group">
				<label for="username" class="col-sm-2 control-label">Username</label>
				<div class="col-sm-10">
					<input id="username" name="username" type="text" class="form-control" required />
				</div>
			</div>
			<div class="row form-group">
				<label for="pass" class="col-sm-2 control-label">Password</label>
				<div class="col-sm-10">
					<input id="pass" name="pass" type="password" class="form-control" required />
				</div>
			</div>
		</div>
		<button class="btn btn-lg z-card-action">
			Continue
		</button>
		</div>
</form>

<script>
    $(".ajaxsubmitform").validator();
    $(".ajaxsubmitform").on('submit',function(e) {
        var formid=$(this).attr('id');//get this form's id
        e.preventDefault(); // avoid to execute the actual submit of the form.
	    setTimeout(function(e){ //wait 50ms to allow validator to execute
            // var data1=$("#"+formid).serialize()+"&flag"+formid+"=Y";
	        // alert($("#"+formid).find('.has-error').length);//No of errors in the form
            if($("#"+formid).find('.has-error').length==0) 
            {
                var data= $("#"+formid).serialize();
                $('#response').ajaxReload("request",formid,data);
            }
        }, 50);
    });
</script>