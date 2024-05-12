<?php
require_once('db.php');

function assignment_check($id){
	$return = [];
	$sql_assignment_check= "Select * from assignment_class_9 where ID='$id'";
	$con=conn();
	$res= mysqli_query($con,$sql_assignment_check);
	// while($resx=mysqli_fetch_assoc($res)){
	// 	$return[0]=$resx['ID'];
	// 	$return[1]=$resx['NAME'];
    //     $return[2]=$resx['SECTION'];
    //     $return[3]=$resx['SUBJECT'];
    //     $return[4]=$resx['DESCRIPTION'];
    //     $return[5]=$resx['DEADLINE'];
    //     $return[6]=$resx['STATUS'];
	// }

    while($resx=mysqli_fetch_assoc($res)){
        $return[] = $resx;
    }
	return $return;
}
