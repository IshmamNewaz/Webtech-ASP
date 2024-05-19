<?php
session_start();
require_once('../Models/db.php');
$id=$_POST['id'];
$notice=$_POST['notice'];
$date=date("Y-m-d");


if(empty($id)||empty($notice)||empty($date)){
    
    header("location: ../Views/notice.php");
}
else{
    $sql = "INSERT INTO `all_notice`(`id`, `notice`, `date`) VALUES ('$id','$notice','$date')";
    $connection = conn();
    mysqli_query($connection,$sql);

}



header("location: ../Views/notice.php");
?>