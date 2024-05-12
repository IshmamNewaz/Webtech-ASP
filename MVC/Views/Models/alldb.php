<?php
require_once('db.php');
function auth($id,$pass)
{
	$sql="select * from login_info where ID='$id' and PASSWORD='$pass'";
	$con=conn();
	$res= mysqli_query($con,$sql);
	$row=mysqli_num_rows($res);
	if($row==1)
	{
		return $res;
	}
	else
	{
		return false;
	}
}



?>