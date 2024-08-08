<?php

    use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;
                      
  require 'PHPMailer_master/src/Exception.php';
  require 'PHPMailer_master/src/PHPMailer.php';
  require 'PHPMailer_master/src/SMTP.php';
  $mail = new PHPMailer(true);
        
  try {
      //Server settings
      $mail->isSMTP();
      $mail->Host       = 'smtp.gmail.com';  // Specify the SMTP server
      $mail->SMTPAuth   = true;               // Enable SMTP authentication
      $mail->Username   = 'aungnyinyimin32439@gmail.com';   // SMTP username
      $mail->Password   = 'gdbcegflheqtzjjd';    // SMTP password
      $mail->SMTPSecure = 'tls';              // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
      $mail->Port       = 587;                // TCP port to connect to, use 587 for TLS, 465 for SSL
      
      //Recipients
      $mail->setFrom('aungnyinyimin32439@gmail.com', 'beautiful life');
      $mail->addAddress('+959663112115');
  
      //Content
      $mail->isHTML(true);
      $mail->Subject = 'Keep that generated key safety';
      $mail->Body = 'hi elogin';
  
      $mail->send();
      echo 'Email has been sent successfully!';
  } catch (Exception $e) {
      echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  }
?>
