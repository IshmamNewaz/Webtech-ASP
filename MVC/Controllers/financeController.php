<?php
require_once('../Models/financedb.php');
$fees_curr_month;

function current_mont_fees_calc($id){
	$date = date("Y-m-d");
	$result=date('F', strtotime($date));
	if($result=="JANUARY" || $result=="January"){
        $res[0]=0;
        $res[1]=0;
        $i=2;
        while($i<3){
            $res[0] = $res[0] + curr_month_check($id)[$i];
            $res[1] = $res[1] + other_fees_check($id)[$i];
            $i++;
        }
        
        if($res[0]>0 || $res[1]>1){
            return $res;
        }
        else{
            return 0;
        }
        
    }
    else if($result=="February" || $result == "FEBRUARY"){
        $res[0]=0;
        $res[1]=0;
        $i=2;
        while($i<4){
            $res[0] = $res[0] + curr_month_check($id)[$i];
            $res[1] = $res[1] + other_fees_check($id)[$i];
            $i++;
        }
        
        if($res[0]>0 || $res[1]>1){
            return $res;
        }
        else{
            return 0;
        }
    }
    else if($result=="March" || $result == "MARCH"){
        $res[0]=0;
        $res[1]=0;
        $i=2;
        while($i<5){
            $res[0] = $res[0] + curr_month_check($id)[$i];
            $res[1] = $res[1] + other_fees_check($id)[$i];
            $i++;
        }
        
        if($res[0]>0 || $res[1]>1){
            return $res;
        }
        else{
            return 0;
        }
    }
    else if($result=="April" || $result == "APRIL"){
        $res[0]=0;
        $res[1]=0;
        $i=2;
        while($i<6){
            $res[0] = $res[0] + curr_month_check($id)[$i];
            $res[1] = $res[1] + other_fees_check($id)[$i];
            $i++;
        }
        
        if($res[0]>0 || $res[1]>1){
            return $res;
        }
        else{
            return 0;
        }
    }
    else if($result=="May" || $result == "MAY"){
        $res[0]=0;
        $res[1]=0;
        $i=2;
        while($i<7){
            $res[0] = $res[0] + curr_month_check($id)[$i];
            $res[1] = $res[1] + other_fees_check($id)[$i];
            $i++;
        }
        
        if($res[0]>0 || $res[1]>1){
            return $res;
        }
        else{
            return 0;
        }
    }
    else if($result=="June" || $result == "JUNE"){
        $res[0]=0;
        $res[1]=0;
        $i=2;
        while($i<8){
            $res[0] = $res[0] + curr_month_check($id)[$i];
            $res[1] = $res[1] + other_fees_check($id)[$i];
            $i++;
        }
        
        if($res[0]>0 || $res[1]>1){
            return $res;
        }
        else{
            return 0;
        }
    }
    else if($result=="July" || $result == "JULY"){
        $res[0]=0;
        $res[1]=0;
        $i=2;
        while($i<9){
            $res[0] = $res[0] + curr_month_check($id)[$i];
            $res[1] = $res[1] + other_fees_check($id)[$i];
            $i++;
        }
        
        if($res[0]>0 || $res[1]>1){
            return $res;
        }
        else{
            return 0;
        }
    }
    else if($result=="August" || $result == "AUGUST"){
        $res[0]=0;
        $res[1]=0;
        $i=2;
        while($i<10){
            $res[0] = $res[0] + curr_month_check($id)[$i];
            $res[1] = $res[1] + other_fees_check($id)[$i];
            $i++;
        }
        
        if($res[0]>0 || $res[1]>1){
            return $res;
        }
        else{
            return 0;
        }
    }
    else if($result=="September" || $result == "SEPTEMBER"){
        $res[0]=0;
        $res[1]=0;
        $i=2;
        while($i<11){
            $res[0] = $res[0] + curr_month_check($id)[$i];
            $res[1] = $res[1] + other_fees_check($id)[$i];
            $i++;
        }
        
        if($res[0]>0 || $res[1]>1){
            return $res;
        }
        else{
            return 0;
        }
    }
    else if($result=="October" || $result == "OCTOBER"){
        $res[0]=0;
        $res[1]=0;
        $i=2;
        while($i<12){
            $res[0] = $res[0] + curr_month_check($id)[$i];
            $res[1] = $res[1] + other_fees_check($id)[$i];
            $i++;
        }
        
        if($res[0]>0 || $res[1]>1){
            return $res;
        }
        else{
            return 0;
        }
    }
    else if($result=="November" || $result == "NOVEMBER"){
        $res[0]=0;
        $res[1]=0;
        $i=2;
        while($i<13){
            $res[0] = $res[0] + curr_month_check($id)[$i];
            $res[1] = $res[1] + other_fees_check($id)[$i];
            $i++;
        }
        
        if($res[0]>0 || $res[1]>1){
            return $res;
        }
        else{
            return 0;
        }
    }
    else if($result=="December" || $result == "DECEMBER"){
        $res[0]=0;
        $res[1]=0;
        $i=2;
        while($i<14){
            $res[0] = $res[0] + curr_month_check($id)[$i];
            $res[1] = $res[1] + other_fees_check($id)[$i];
            $i++;
        }
        
        if($res[0]>0 || $res[1]>1){
            return $res;
        }
        else{
            return 0;
        }
    }
}
function financial_status($id){
    return curr_month_check($id);
}
function financial_other_status($id){
    return other_fees_check($id);
}
function month_print(){
    global $months;
    $months = array ("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
    return $months;
}



?>