<?php
session_start();
require_once('../Models/db.php');
$id=$_POST['ud'];
$sql = "DELETE FROM `all_notice` WHERE `ID`='$id'";
$connection = conn();
mysqli_query($connection,$sql);

header("location: ../Views/notice.php")
?>