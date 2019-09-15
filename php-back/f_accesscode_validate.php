<?php
function validate($data)
{
extract($_POST);
if( !inputvalidate('max-length',array($allowed_users=>3,$department=>3)) )
    return 'Allowed users/Department invalid, input max 3 characters';
if( !inputvalidate('exact-length',array($course_year=>1,$batch=>2)) )
    return 'Course year (should be exactly 1 character) invalid/Batch (should be exactly 2 characters) invalid';
return 'valid';
}
?>