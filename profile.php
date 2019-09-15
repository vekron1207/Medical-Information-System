<?php
$canvas_heading='Profile - Medical Information System';
session_start();
if(isset($_SESSION['usertype'])) { // if already login
  extract($_SESSION);
  if($usertype=='a'||$usertype=='d'||$usertype=='p')
    {
      $nav_type='logout';
    }
    else{
      $nav_type='login';
      $usertype='n';
    }
}
else{
  $nav_type='login';
  $usertype='n';
}
$canvas_heading="Information";  
$profile_mode="n";
$nav_state=false;
extract($_REQUEST);
$canvas_paint=$module.'/profile.php';
$module_mode="full";
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>MISweb Portal - Doctor and Patient Interaction Platform</title>

<!-- Bootstrap -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- Validator   -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.5/validator.min.js"></script> 

<!-- universal css -->
<link rel="stylesheet" href="css/universal.css">
<!-- index css -->
<link rel="stylesheet" href="css/index.css">

<!-- universal js -->
<script src="js/universal.js"></script>
<!-- index js -->
<script src="js/index.js"></script>
</head>
<?php
include "php-back/"."connection.php"; //connect the connection page

?>
<body>

<?php
  include 'php-front/ajaxloader.php';
  
  include 'php-front/nav/'.$nav_type.'.php';
  include 'php-front/canvaspainter.php';
  include 'php-front/footer.php'; 
?>
<script>
$( '.z-menubar' ).fragmentLoader();
</script>
</body>
</html>

