<?php
require_once('db.php');

function notice_Check(){
	$return = [];
	$sql_notice_check= "Select top 3 * from class_9_notice";
	$con=conn();
	$res= mysqli_query($con,$sql_notice_check);

    while($resx=mysqli_fetch_assoc($res)){
        $return[] = $resx;
    }
	return $return;
}
