<?php
require_once('db.php');
function view_notice()
{
	$sql="select * from  all_notice";
	$con=conn();
	$res= mysqli_query($con,$sql);
    return $res;
	
}

