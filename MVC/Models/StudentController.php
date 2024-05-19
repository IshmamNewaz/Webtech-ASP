<?php
session_start();
require_once('../Models/Studentdb.php');
$resutl_Pre_test=[];
$resutl_test_test=[];
$resutl_final_test=[];
$student_sec="";

function current_mont_fees_calc($id){
	$date = date("Y-m-d");
	$result=date('F', strtotime($date));
	return $result;
}
//echo current_mont_fees_calc();
function call_for_marks($id){

	if(class_check($id)[0]==9){
		global $resutl_Pre_test;
		global $resutl_test_test;
		global $resutl_final_test;
		global $student_sec;
		global $schedule;
		$student_sec=class_check($id)[1];

		$res_pre=pre_test($id);
		$res_test=mid_test($id);
		$res_final=final_test($id);
		if(!($res_pre==false))
		{
			while($resx=mysqli_fetch_assoc($res_pre)){
			array_push($resutl_Pre_test,$resx['BAGNLA_1ST']);
			array_push($resutl_Pre_test,$resx['BAGNLA_2ND']);
			array_push($resutl_Pre_test,$resx['ENGLISH_1ST']);
			array_push($resutl_Pre_test,$resx['ENGLISH_2ND']);
			array_push($resutl_Pre_test,$resx['G_MATH']);
			array_push($resutl_Pre_test,$resx['RELIGION']);
			array_push($resutl_Pre_test,$resx['H_MATH']);
			array_push($resutl_Pre_test,$resx['CHEMISTRY']);
			array_push($resutl_Pre_test,$resx['PHYSICS']);
			array_push($resutl_Pre_test,$resx['BIOLOGY']);
			array_push($resutl_Pre_test,$resx['ICT']);
			array_push($resutl_Pre_test,$resx['BGS']);
			}
		
		}
		if(!($res_test==false))	
		{
			while($resx=mysqli_fetch_assoc($res_test)){
				array_push($resutl_test_test,$resx['BAGNLA_1ST']);
				array_push($resutl_test_test,$resx['BAGNLA_2ND']);
				array_push($resutl_test_test,$resx['ENGLISH_1ST']);
				array_push($resutl_test_test,$resx['ENGLISH_2ND']);
				array_push($resutl_test_test,$resx['G_MATH']);
				array_push($resutl_test_test,$resx['RELIGION']);
				array_push($resutl_test_test,$resx['H_MATH']);
				array_push($resutl_test_test,$resx['CHEMISTRY']);
				array_push($resutl_test_test,$resx['PHYSICS']);
				array_push($resutl_test_test,$resx['BIOLOGY']);
				array_push($resutl_test_test,$resx['ICT']);
				array_push($resutl_test_test,$resx['BGS']);
				}
		
		}
		if(!($res_final==false))
		{
			while($resx=mysqli_fetch_assoc($res_final)){
				array_push($resutl_final_test,$resx['BAGNLA_1ST']);
				array_push($resutl_final_test,$resx['BAGNLA_2ND']);
				array_push($resutl_final_test,$resx['ENGLISH_1ST']);
				array_push($resutl_final_test,$resx['ENGLISH_2ND']);
				array_push($resutl_final_test,$resx['G_MATH']);
				array_push($resutl_final_test,$resx['RELIGION']);
				array_push($resutl_final_test,$resx['H_MATH']);
				array_push($resutl_final_test,$resx['CHEMISTRY']);
				array_push($resutl_final_test,$resx['PHYSICS']);
				array_push($resutl_final_test,$resx['BIOLOGY']);
				array_push($resutl_final_test,$resx['ICT']);
				array_push($resutl_final_test,$resx['BGS']);
				}
		}
		if($student_sec=="A"){
			$schedule=class_schedule(class_check($id)[0],$student_sec);

		}
		
	}
	else if(class_check($id)==10){

	}

}



?>