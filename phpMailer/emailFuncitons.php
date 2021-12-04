
<?php

//Include required PHPMailer files
	require 'includes/PHPMailer.php';
	require 'includes/SMTP.php';
	require 'includes/Exception.php';
//Define name spaces
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;
        
function send_email($recipiants,$subject, $body){
    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = "tls";
    $mail->Port = "587";
    $mail->Username = "seaturtleeggtracker9000@gmail.com";
    $mail->Password = "stet9stet9stet9";
    $mail->Subject = $subject;
    $mail->setFrom('seaturtleeggtracker9000@gmail.com');
    $mail->isHTML(true);
    $mail->Body = $body;
    foreach ($recipiants as $recipiant) {
        $mail->addAddress($recipiant);
    }
    if ( $mail->send() ) {
            echo "Email Sent..!";
    }else{
            echo "Message could not be sent. Mailer Error: "{$mail->ErrorInfo};
    }
    $mail->smtpClose();
}


