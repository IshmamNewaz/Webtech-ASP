<?php
require_once('../Models/assignmentdb.php');
$fees_curr_month;

function assignment_view($id){
    return assignment_check($id);
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