<?php
require_once('db.php');

function notice_Check(){
	$return =[]; 
	$sql_notice_check= "SELECT * FROM class_9_notice LIMIT 3";
	$con=conn();
	$res= mysqli_query($con,$sql_notice_check);
	while($resx=mysqli_fetch_assoc($res)){
        $return[] = $resx;
    }
	return $return;
}
