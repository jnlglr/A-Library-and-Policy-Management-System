<?php
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;

  require 'PHPMailer-master/src/Exception.php';
  require 'PHPMailer-master/src/PHPMailer.php';
  require 'PHPMailer-master/src/SMTP.php';

// Gets user's email and generated code
function send_mail($recipient, $subject, $message)
{

  $mail = new PHPMailer();
  $mail->IsSMTP();

  $mail->SMTPDebug  = 0;  
  $mail->SMTPAuth   = TRUE;
  $mail->SMTPSecure = "tls";
  $mail->Port       = 587;
  $mail->Host       = "smtp.gmail.com";
  // System's designated account
  $mail->Username   = "nyclibrary2023@gmail.com";
  $mail->Password   = "knkeosiuajwoojud";
  $mail->IsHTML(true);
  // User's email address
  $mail->AddAddress($recipient, "recipient name");
  $mail->SetFrom("nyclibrary2023@gmail.com", "NYC - YOUTH POLICY
  DEVELOPMENT SYSTEM");
  //$mail->AddReplyTo("reply-to-email", "reply-to-name");
  //$mail->AddCC("cc-recipient-email", "cc-recipient-name");
  $mail->Subject = $subject;
  $content = $message;

  $mail->MsgHTML($content); 
    if(!$mail->Send()) {   
      $_SESSION['status'] = "Oops.. Email Unverified!";
			$_SESSION['status_code'] = 'error';
      return false;   
    }
    else {
      $_SESSION['status'] = "Profile Successfully Updated!";
			$_SESSION['status_code'] = 'success';
      return true;
  }

  }

?>