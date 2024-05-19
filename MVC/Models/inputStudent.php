<?php
session_start();
require_once('../Models/db.php');
$id=$_POST['st-id'];
$name=$_POST['st-name'];
$section=$_POST['st-sec'];
$class=$_POST['st-class'];
$password=$_POST['st-pass'];
$email=$_POST['st-email'];
$mobile=$_POST['st-number'];
$type="STUDENT";

if(empty($id)||empty($name)||empty($section)||empty($class)||empty($password)||empty($email)||empty($mobile)){
    
    header("location: ../Views/admin.php");
}
else{
    $sql = "INSERT INTO `login_info`(`ID`, `NAME`, `SECTION`, `CLASS`, `PASSWORD`, `EMAIL`, `MOBILE`, `TYPE`) VALUES ('$id','$name','$section','$class','$password=','$email','$mobile','$type')";
    $connection = conn();
    mysqli_query($connection,$sql);

}



header("location: ../Views/admin.php");
?>