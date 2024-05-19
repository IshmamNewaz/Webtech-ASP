<?php
session_start();
require_once('../Models/db.php');
$id=$_POST['t-id'];
$name=$_POST['t-name'];
$section="N/A";
$class="N/A";
$password=$_POST['t-pass'];
$email=$_POST['t-email'];
$mobile=$_POST['t-number'];
$type="TEACHER";

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