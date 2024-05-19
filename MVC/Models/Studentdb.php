<?php
require_once('db.php');

function class_check($id){
	$return = [];
	$sql_class_check= "Select * from student_info where ID='$id'";
	$con=conn();
	$res= mysqli_query($con,$sql_class_check);
	while($resx=mysqli_fetch_assoc($res)){
		$return[0]=$resx['CLASS'];
		$return[1]=$resx['SEC'];
	}
	return $return;
}
function class_schedule($class,$sec){
	$sql_class_check= "Select * from student_class_schedule_9 where CLASS='$class' and SEC='$sec'";
	$con=conn();
	$res= mysqli_query($con,$sql_class_check);
	return $res;
}
function pre_test($id)
{
	$sql_Marks_pre= "Select * from student_marks_class_9_pre where ID='$id'";
	$con=conn();
	$res= mysqli_query($con,$sql_Marks_pre);
	$row=mysqli_num_rows($res);
	if($row==1)
	{
		return $res;
	}
	else
	{
		return false;
	}
}
function mid_test($id)
{
	$sql_Marks_test= "Select * from student_marks_class_9_test where ID='$id'";
	$con=conn();
	$res= mysqli_query($con,$sql_Marks_test);
	$row=mysqli_num_rows($res);
	if($row==1)
	{
		return $res;
	}
	else
	{
		return false;
	}
}
function final_test($id)
{
	$sql_Marks_final= "Select * from student_marks_class_9_final where ID='$id'";
	$con=conn();
	$res= mysqli_query($con,$sql_Marks_final);
	$row=mysqli_num_rows($res);
	if($row==1)
	{
		return $res;
	}
	else
	{
		return false;
	}
}

?>