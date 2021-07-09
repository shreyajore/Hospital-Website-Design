<?php
include 'databaseConnection.php';
//use PHPMailer\src\PHPMailer; 
//use PHPMailer\src\Exception; 
 require "PHPMailer/PHPMailer/src/PHPMailer.php";
    require "PHPMailer/PHPMailer/src/OAuth.php";
    require "PHPMailer/PHPMailer/src/SMTP.php";
    require "PHPMailer/PHPMailer/src/POP3.php";
    require "PHPMailer/PHPMailer/src/Exception.php";
    //require "PHPMailer/PHPMailer/src/PHPMailerAutoload.php";


//require 'PHPMailer/Exception.php'; 
//require 'PHPMailer/PHPMailer.php'; 
//require 'PHPMailer/SMTP.php'; 
if(isset($_POST['submit']))
{
   $to_email=$_POST['email'];
   $person=$_POST['name'];
   $time=$_POST['time'];
   $msg=$_POST['textarea'];
   $sql="INSERT INTO appointment(name,email,phone,msg)VALUES('$to_email','$person','$time','$msg')";
   mysqli_query($conn,$sql);
   //mysqli_query($conn,$sql);
   
// Import PHPMailer classes into the global namespace 
	
 $mail = new PHPMailer\PHPMailer\PHPMailer();
//$mail=new PHPMailer(); 
   //$mail=new PHPMailer\src\PHPMailer();
 
$mail->isSMTP();                      // Set mailer to use SMTP 
$mail->Host = 'smtp.gmail.com';       // Specify main and backup SMTP servers 
$mail->SMTPAuth = true;               // Enable SMTP authentication 
$mail->Username = 'youremail@gmail.com';   // SMTP username 
$mail->Password = '9876543210';   // SMTP password 
$mail->SMTPSecure = 'tls';            // Enable TLS encryption, `ssl` also accepted 
$mail->Port = 587;                    // TCP port to connect to 
 
// Sender info 
$mail->setFrom('youremail@gmail.com', 'HMS'); 
//$mail->addReplyTo('reply@gmail.com', 'HMS'); 
 
// Add a recipient 
$mail->addAddress($to_email); 
 
//$mail->addCC('cc@example.com'); 
//$mail->addBCC('bcc@example.com'); 
// $mail->SMTPDebug=4;
// Set email format to HTML 
$mail->isHTML(true); 
 
// Mail subject 
$mail->Subject = 'Email from Localhost by HMS'; 
 
// Mail body content 
$bodyContent = '<h1>Congratulations.....</h1>'; 
$bodyContent .= '<p>Your Appointment has been successfully booked.You can visit on your schedule.</p>'; 
$mail->Body    = $bodyContent; 
 
// Send email 
if(!$mail->send()) { 
    echo 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo;
}
    
else { 
      
    echo 'Message has been sent.'; 
} 
}
 
?>
