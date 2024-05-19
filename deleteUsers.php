<?php
session_start();
require_once('../Models/db.php');
$id=$_POST['ud'];
$sql = "DELETE FROM `login_info` WHERE `ID`='$id'";
$connection = conn();
mysqli_query($connection,$sql);

header("location: ../Views/admin.php")
?>