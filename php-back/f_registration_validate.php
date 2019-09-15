<?php
function validate($data)
{
extract($_POST);
if( !inputvalidate('min-length',array($username=>4,$password=>6)) )
    return 'Username(minimum 4 characters)/Password(minimum 6 characters) is of incorrect length.';
}
?>