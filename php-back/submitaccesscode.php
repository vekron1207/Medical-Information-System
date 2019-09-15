<?php
include 'functions.php';
include 'f_accesscode_validate.php';

session_start();
$error_main='Access Code Not Generated';

if ($_SERVER['REQUEST_METHOD']=='POST'){
    $_POST=realescape($_POST);//escape single and double quotes using mysqli_real_escape
    $flag=validate($_POST);
    if($flag!='valid')
        errordisplay($error_main,$flag);
    else
    {
        extract($_POST);//get all post parameters
        $access=$department.$course_year.$batch;
        $access_code=generateaccesscode($access);
        $data=array('access'=>$access,'access_code'=>$access_code,'allowed_users'=>$allowed_users,'description'=>$description);
        // errordisplay($error_main,'Registration disabled.');//Enable this to close registration during development, remember to disable code that follows this line
        if(insertintodb('cluster',$data))
            echo '<div class="alert alert-info"><strong>Access Code Generated: </strong> '.$access_code.'</div>';
        else
            errordisplay($error_main,'Server Error, please try again later.');
    }
}
else{
	header("Location:../index.php");
}


?>