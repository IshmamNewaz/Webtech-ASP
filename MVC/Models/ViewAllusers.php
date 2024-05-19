<?php
require_once('db.php');
function view_users()
{
	$sql="select * from  login_info";
	$con=conn();
	$res= mysqli_query($con,$sql);
    return $res;
	
}



?>