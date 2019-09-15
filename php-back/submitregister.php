<?php
include '..\PHPMailer\src\PHPMailer.php';
include '..\PHPMailer\src\SMTP.php';
include '..\PHPMailer\src\Exception.php';
include 'functions.php';
include 'f_registration_validate.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

session_start();
$error_main='Registration Failed';
$success_main='Registration Success';

if ($_SERVER['REQUEST_METHOD']=='POST'){
    $_POST=realescape($_POST);//escape single and double quotes using mysqli_real_escape
    extract($_POST);//get all post parameters
    $usertype_input=$usertype;
    $username_input=$username;
    extract($_SESSION);
    $hashandsalt = password_hash($password, PASSWORD_BCRYPT);//hash password
    // echo $hashandsalt;
    if($usertype=='a'){
        $data=array('username'=>$username_input,'pass'=>$hashandsalt,'usertype'=>$usertype_input,'userstatus'=>'t');
    }
    else if($usertype_input!='a'){
        $data=array('username'=>$username_input,'pass'=>$hashandsalt,'usertype'=>$usertype_input);
    }
    else{
        responselabel("error",$error_main,'Cannot create admin.');
    }
    // errordisplay($error_main,validate($_POST));
    // responselabel("error",$error_main,'Registration disabled.');//Enable this to close registration during development
        if(insertintodb('regist',$data))
        {
            $data2=array('id'=>$username,'profile_name'=>$profile_name);
            $userprofile_db=array('p'=>'patient','d'=>'doctor');
            if($usertype_input!='a')
            if(insertintodb($userprofile_db[$usertype_input],$data2))
                responselabel("info",$success_main,'Please contact administrator to activate account.');

        }
        else
            responselabel("error",$error_main,'Server Error, please try again later.');
    // if( password_verify($password, $hashandsalt) )
    //     responselabel("info",$success_main,'Password hash verified.');//Enable this to verify if hash was generated successfully during development
}
else{
	header("Location:../index.php");
}


?>