<?php
include 'connection.php'; //connect the connection page
  
session_start();

if ($_SERVER['REQUEST_METHOD']=='POST'){
$usertype='n';
extract($_POST);
extract($_SESSION);
//$app_id=trim($username);	
// echo $module;
// echo $usertype;
// echo $username;
	$front_snippet_partial_path="../php-front/";
    $profile_mode='l';
	include "../php-front/".$usertype.'/'.$module.'.php';
}
else{
	header("location: ../index.php");
}

?>