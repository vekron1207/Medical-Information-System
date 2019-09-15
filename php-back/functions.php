<?php
function realescape($arr){
    include "../php-back/".'connection.php';
    foreach($arr as $x => $x_value)
    {
        $arr[$x]=mysqli_real_escape_string($conn, $x_value);
        // Get rid of any newline characters in $string.
        $arr[$x] = str_replace(PHP_EOL, '', $x_value);
    }
    return $arr;
    $conn->close();
}

function insertintodb($table,$data){
    include "../php-back/".'connection.php';
    $query1 = "INSERT INTO $table (sno) VALUES (NULL)";
    if ($conn->query($query1) === TRUE) {
        $last_id = $conn->insert_id;
        return updatedb($table,$data,$last_id);
    } else {
        return false;
    }
    $conn->close();
}

function updatedb($table,$data,$sno){
    include "../php-back/".'connection.php';
    $flag_update_statement=0;
    foreach($data as $x => $x_value){
        // echo $x."\n";
        // echo $x_value."\n";
        $stmt = $conn->prepare("UPDATE $table SET $x = ? WHERE sno='$sno'");
        $stmt->bind_param("s", $x_value);
        $flag_update_statement = $stmt->execute()?$flag_update_statement+1:$flag_update_statement;
        $stmt->close();
    }
    return ($flag_update_statement==sizeof($data));
    $conn->close();
}

function findfromdb($back_snippet_partial_path,$table,$data,$id){
    include $back_snippet_partial_path.'connection.php';
    $query = "SELECT id,".$data." FROM $table WHERE id='$id'";
    // echo $query;
    $resultgroup=mysqli_query($conn,$query);
    $resultdata=[];
    if($row = $resultgroup->fetch_assoc()){
        $resultdata[$row['id']]=$row[$data];
    }
    $conn->close();
    return $resultdata;
}

function findanyfromdb($back_snippet_partial_path,$table,$data){
    include $back_snippet_partial_path.'connection.php';
    $query = "SELECT id,".$data." FROM $table ORDER BY profile_name";
    // echo $query;
    $resultgroup=mysqli_query($conn,$query);
    $resultdata=[];
    while($row = $resultgroup->fetch_assoc()){
        $resultdata[$row['id']]=$row[$data];
    }
    $conn->close();
    return $resultdata;
}

function findmyfromdb($back_snippet_partial_path,$table,$data){
    include $back_snippet_partial_path.'connection.php';
    $query = "SELECT id,".$data." FROM $table ORDER BY profile_name";
    // echo $query;
    $resultgroup=mysqli_query($conn,$query);
    $resultdata=[];
    while($row = $resultgroup->fetch_assoc()){
        $resultdata[$row['id']]=$row[$data];
    }
    $conn->close();
    return $resultdata;
}

function findallfromdb($back_snippet_partial_path,$table,$data){
    include $back_snippet_partial_path.'connection.php';
    $query = "SELECT ".$data." FROM $table WHERE sno='$sno'";
    // echo $query;
    $resultgroup=mysqli_query($conn,$query);
    $resultdata=[];
    while($row = $resultgroup->fetch_assoc()){
        $resultdata[$row['id']]=$row[$data];
    }
    $conn->close();
    return $resultdata;
}

function responselabel($type,$main,$desc){
    switch($type){
        case "error":echo '<div class="alert alert-danger"><strong>'.$main.'!</strong> '.$desc.'</div>';
                    break;
        case "info":echo '<div class="alert alert-info"><strong>'.$main.'!</strong> '.$desc.'</div>';
                    break;
    }
}
function inputvalidate($mode,$data){
    $flag=0;
    if($mode=='max-length')
    {
        foreach($data as $x => $x_value)
            if(strlen($x)>$x_value)
            {
                $flag=1;
                break;
            }
    }
    else if($mode=='exact-length')
    {
        foreach($data as $x => $x_value)
            if(strlen($x)!=$x_value)
            {
                $flag=1;
                break;
            }
    }
    else if($mode=='min-length')
    {
        foreach($data as $x => $x_value)
            if(strlen($x)<$x_value)
            {
                $flag=1;
                break;
            }
    }
    return $flag==0?true:false;
}
function generateaccesscode($access){
    $bytes = random_bytes(3);
    $code=bin2hex($bytes);
    return $access.$code;
}
function sendmail($to,$subject,$body){
    $mail = new PHPMailer(); // create a new object
    $mail->IsSMTP(); // enable SMTP
    $mail->SMTPDebug = 0; // debugging: 1 = errors and messages, 2 = messages only
    $mail->SMTPAuth = true; // authentication enabled
    $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 465; // or 587
    $mail->IsHTML(true);
    $mail->Username = "authenticatorkaprakop";
    $mail->Password = "asli!pass";
    $mail->SetFrom("authenticatorkaprakop@gmail.com");
    $mail->Subject = $subject;
    $mail->Body = $body;
    $mail->AddAddress($to);

    if(!$mail->Send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    }
    else {
        echo "Message has been sent";
    }
}
?>
