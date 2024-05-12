<?php
session_start();
require_once('../Models/alldb.php');
if(empty($_SESSION['id'])){
	header("location:../Views/log.php");
}
$id=$_POST['id'];
$pass=$_POST['pass'];

$res=auth($id,$pass);
if(!($res==false))
{
	$resx=mysqli_fetch_assoc($res);
	if($resx['TYPE']=="STUDENT"){
		$_SESSION['id']=$id;
		$_SESSION['name']=$resx['NAME'];
		$_SESSION['section'] = $resx['SECTION'];
		$_SESSION['class'] = $resx['CLASS'];
		header("location:../Views/student.php");
	}
	
}
else
{	header("location:../Views/log.php");
	$_SESSION['AuthError']="Please Enter Correctly!";
}

?>