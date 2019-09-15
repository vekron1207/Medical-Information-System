<?php
$query="SELECT access_code FROM regist WHERE username='$username'";
$resultsum=mysqli_query($conn,$query);
// echo $query;
	if($row = $resultsum->fetch_assoc()){
        extract($row);
        // echo $access_code;
        $query="SELECT access from cluster WHERE access_code='$access_code'";
        // echo $query;
        $resultgroup=mysqli_query($conn,$query);
        if($row = $resultgroup->fetch_assoc()){
            extract($row);
            $query="SELECT feedback_code from access WHERE access='$access' and feedback_status='f'";
            // echo $query;
            $resultaccess=mysqli_query($conn,$query);
        }
    }

?>

<div class="panel panel-danger">
	<div class="panel-heading" data-toggle="collapse" data-target="#available" style="font-size:150%;"><b>Available Feedbacks</b><span class="btn btn-danger pull-right glyphicon glyphicon-chevron-up"></span></div>
	<div  class="panel-body collapse in one" id="available">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>S. No.</th>
                    <th>Feedback Code</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
<?php
while($rowaccess = $resultaccess->fetch_assoc())
{
?>
                <tr>
                    <?php $feedback_code = htmlspecialchars($rowaccess['feedback_code']);?>
                    <td>1</td>
                    <td><?php echo $feedback_code; ?></td>
                    <td class="playground">
                        <button type="submit" class="btn btn-danger z-optionbtn" data-target=".z-optionbox.z-i0" style="float:left;">
                            <span class="glyphicon glyphicon-cog"></span>
                        </button>
                        <div class="col-xs-12" style="float:left;position:relative">
                            <ul class="z-optionbox z-i0" data-requester='trinket' data-fragment='feedbackt' style="display:none;">
                                <li class="z-option" data-feedbackt="edit&feedback_code=<?php echo $feedback_code; ?>" title="Open Feedback Form as Student"><span class="glyphicon glyphicon-edit"></span><br>Edit</li>
                                <li class="z-option" data-feedbackt="preview&feedback_code=<?php echo $feedback_code; ?>" title="Open Feedback Preview as Student"><span class="glyphicon glyphicon-eye-open"></span><br>Preview</li>
                            </ul>
                        </div>
                    </td>
                </tr>
<?php 
}
?>
            </tbody>
        </table>
    </div>
</div>


<div class="panel panel-danger">
	<div class="panel-heading" data-toggle="collapse" data-target="#feedbackt" style="font-size:150%;"><b>Feedback Form</b><span class="btn btn-danger pull-right glyphicon glyphicon-chevron-up"></span></div>
	<div  class="panel-body collapse in one" id="feedbackt">
		
	</div>
</div>


<script>
    $(".z-optionbtn").zoption();
    $(".playground").fragmentLoader();
    
</script>

