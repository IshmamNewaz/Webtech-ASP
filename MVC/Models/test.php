<?php
include('smtp/PHPMailerAutoload.php');
$mailaddress=$_POST['email'];
$subject=$_POST['subject'];
$text=$_POST['area'];
$right=true;

if(empty($mailaddress)||empty($subject)||empty($text)){
	header("location:../Views/mail.php");
	$right=false;

}
echo smtp_mailer($mailaddress,$subject,$text);
function smtp_mailer($to,$subject, $msg){
	$mail = new PHPMailer(); 
	$mail->IsSMTP(); 
	$mail->SMTPAuth = true; 
	$mail->SMTPSecure = 'tls'; 
	$mail->Host = "smtp.gmail.com";
	$mail->Port = 587; 
	$mail->IsHTML(true);
	$mail->CharSet = 'UTF-8';
	//$mail->SMTPDebug = 2; 
	$mail->Username = "torokazaki@gmail.com";
	$mail->Password = "guaolftasbzoxxsk";
	$mail->SetFrom("email");
	$mail->Subject = $subject;
	$mail->Body =$msg;
	$mail->AddAddress($to);
	$mail->SMTPOptions=array('ssl'=>array(
		'verify_peer'=>false,
		'verify_peer_name'=>false,
		'allow_self_signed'=>false
	));
	if(!$mail->Send()){
		echo $mail->ErrorInfo;
	}else{
		return 'Sent';
	}
}
?>