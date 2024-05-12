<?php
    require('./fpdf/fpdf.php');
    require('../../MVC/Controllers/financeController.php');
    session_start();
    $id=$_SESSION['id'];
    $name=$_SESSION['name'];
    $bank = $_POST['bank-option'];
    $fees = current_mont_fees_calc($id)[0];
    $fees_others = current_mont_fees_calc($id)[1];
    
    $right=true; 
    if($bank=="NULL"){
        $right=false;
        header("location: ../../MVC/Views/financial.php");
    }
    

    $pdf = new FPDF('P', 'mm', "A4");
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 15);
    
    $pdf->Image('images/EduNext_Logo.png',55,10, 100);

    $pdf->Ln(30);
    $pdf->Cell(80);
    $pdf->Cell(30,10,'Education Fees',0,1,'C');
    $pdf->Cell(5);
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(30,5,'Name: '.$name,0,1);
    $pdf->Cell(5);
    $pdf->Cell(30,5,'ID: '.$id,0,0);
    $pdf->Cell(45);
    $pdf->Cell(30,5,"Ref ID: ".rand(100000,999999),0,0);
    $pdf->Cell(35);
    $pdf->Cell(30,5,"DATE: ".date("Y-m-d"),0,1);
    $pdf->Cell(5);
    $pdf->Line(10, 65, 200,65);
    $pdf->Cell(30,5,'',0,0);
    $pdf->Ln(2);
    $pdf->Cell(5);
    $pdf->Cell(30,5,'',0,1);
    $pdf->Cell(5);
    $pdf->Cell(30,5,'---EXPENSES---',0,0);
    $pdf->Cell(112);
    $pdf->Cell(30,5,'---COSTS---',0,1);
    $pdf->Cell(5);
    $pdf->Cell(30,5,'Tution:',0,0);
    $pdf->Cell(112);
    $pdf->Cell(30,5,$fees." Tk",0,1);
    $pdf->Cell(5);
    $pdf->Cell(30,5,'Others:',0,0);
    $pdf->Cell(112);
    $pdf->Cell(30,5,$fees_others." Tk",0,1);
    $pdf->Cell(5);
    
    $pdf->Cell(30,5,'',0,1);
    $pdf->Cell(30,5,'',0,1);
    $pdf->Cell(30,5,'',0,1);
    $pdf->Cell(30,5,'',0,1);
    $pdf->Cell(5);
    $pdf->Cell(30,5,'Total:',0,0);
    $pdf->Cell(112);
    $pdf->Cell(30,5,$fees_others+$fees." Tk",0,1);
    $pdf->Cell(30,5,'',0,1);

    $pdf->Cell(5);
    $pdf->Cell(30,5,'Choosen Bank:',0,0);
    $pdf->Cell(112);
    $pdf->Cell(30,5,$bank,0,1);
    $pdf->Cell(5);
    $pdf->Line(10, 100, 200,100);

    
    $pdf->Cell(30,5,'',0,1);
    $pdf->Cell(30,5,'',0,1);
    $pdf->Cell(30,5,'',0,1);
    $pdf->Cell(30,5,'',0,1);
    $pdf->Cell(30,5,'',0,1);
    $pdf->Cell(30,5,'',0,1);
    $pdf->Cell(5);
    $pdf->Line(10, 145, 68,145);
    $pdf->Line(140, 145, 195,145);
    $pdf->Cell(30,5,'-Authorized Signature-',0,0);
    $pdf->Cell(105);
    $pdf->Cell(30,5,'-Bank Signature-',0,1);
    $pdf->Cell(5);


    
    $pdf->Output();
    header("location: ../../MVC/Views/financial.php");
?>