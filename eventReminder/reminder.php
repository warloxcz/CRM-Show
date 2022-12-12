<?php
include_once("conn.php");

$sql = "SELECT * FROM events where time_start BETWEEN NOW() and DATE_ADD(NOW(), INTERVAL 2 DAY) order by time_start";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);

$mail->SMTPDebug = SMTP::DEBUG_SERVER;                     
    $mail->isSMTP();                                           
    $mail->Host       = 'smtp.example.com';                     
    $mail->SMTPAuth   = true;                                  
    $mail->Username   = 'user@example.com';                    
    $mail->Password   = 'secret';                               
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;           
    $mail->Port       = 465;                                    

    //Recipients
    $mail->setFrom('from@example.com', 'Mailer');
    $mail->addAddress('joe@example.net', 'Joe User');     
    $mail->addAddress('ellen@example.com');               
    $mail->addReplyTo('info@example.com', 'Information');
    $mail->addCC('cc@example.com');
    $mail->addBCC('bcc@example.com');

    //Attachments
    $mail->addAttachment('/var/tmp/file.tar.gz');        
    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    

    //Content
    $mail->isHTML(true);                                 
    $mail->Subject = 'Nadcházejíci akce';

    $body_string = "";
  while($row = $result->fetch_assoc()) {
    $body_string .= $row["name"]. "(".$row["firm_name"]. "):". $row["description"]. "[". $row["time_start"]. " - ". $row["time_end"]. "] <br>";
  }

  $mail->Body   = $body_string;
  $mail->AltBody = $body_string;

  $mail->send();

  echo "Email sent!";
} else {
  echo "0 results";
}

?>
