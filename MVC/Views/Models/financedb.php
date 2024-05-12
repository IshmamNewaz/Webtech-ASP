<?php
require_once('db.php');

function curr_month_check($id){
	$return = [];
	$sql_month_check= "Select * from student_fees_monthly where ID='$id'";
	$con=conn();
	$res= mysqli_query($con,$sql_month_check);
	while($resx=mysqli_fetch_assoc($res)){
		$return[0]=$resx['ID'];
		$return[1]=$resx['NAME'];
        $return[2]=$resx['JANUARY'];
        $return[3]=$resx['FEBRUARY'];
        $return[4]=$resx['MARCH'];
        $return[5]=$resx['APRIL'];
        $return[6]=$resx['MAY'];
        $return[7]=$resx['JUNE'];
        $return[8]=$resx['JULY'];
        $return[9]=$resx['AUGUST'];
        $return[10]=$resx['SEPTEMBER'];
        $return[11]=$resx['OCTOBER'];
        $return[12]=$resx['NOVEMBER'];
        $return[13]=$resx['DECEMBER'];

	}
	return $return;
}

function other_fees_check($id){
    $return = [];
	$sql_others_check= "Select * from student_other_fees_monthly where ID='$id'";
	$con=conn();
	$res= mysqli_query($con,$sql_others_check);
	while($resx=mysqli_fetch_assoc($res)){
		$return[0]=$resx['ID'];
		$return[1]=$resx['NAME'];
        $return[2]=$resx['M1'];
        $return[3]=$resx['M2'];
        $return[4]=$resx['M3'];
        $return[5]=$resx['M4'];
        $return[6]=$resx['M5'];
        $return[7]=$resx['M6'];
        $return[8]=$resx['M7'];
        $return[9]=$resx['M8'];
        $return[10]=$resx['M9'];
        $return[11]=$resx['M10'];
        $return[12]=$resx['M11'];
        $return[13]=$resx['M12'];

	}
	return $return;

}

?>