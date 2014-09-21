<?php
session_start();
if(isset($_SESSION['gesendet']) && !empty($_SESSION['gesendet'])){
		$gesendet = $_SESSION['gesendet'];
	}else{
		$gesendet =0;
	}	

require 'PHPMailer-master/PHPMailerAutoload.php';

$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com;smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'zaniyar.jahany@gmail.com';                 // SMTP username
$mail->Password = '**********';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->From = 'zaniyar@choix.me';
$mail->FromName = 'Zaniyar Jahany';
$mail->addAddress('xobe@zhaw.ch', 'ZHAW');     // Add a recipient
//$mail->addAddress('ellen@example.com');               // Name is optional
$mail->addReplyTo('zaniyar@choix.me', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

$mail->WordWrap = 50;                                 // Set word wrap to 50 characters
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Hallo Herr Lehrer';
$mail->Body    = '<h1>Lieber Herr Lehrer</h1>Das ist eine HTML Mail, und dieses Wort ist <b>fett!</b> <br> Für dieses Mail wurde PHPMailer verwendet! <br> Leider konnte ich mit dem einfachen mail() kein smtp verwenden.. da dies angeblich auf Linux gar nicht ohne weiteres funktioniert?...<br><br> Gruss';
$mail->AltBody = 'Wie es scheint, haben Sie gar keine HTML Unterstützung.. nc nc ';

if($gesendet == 0){  // nur einmal senden!
	if(!$mail->send()) {
		echo 'Message could not be sent.';
		echo 'Mailer Error: ' . $mail->ErrorInfo;
	} else {
		echo 'Nachricht wurde gesendet!';
	}
}else{
	echo "Es wurde bereits eine Mail gesendet!";
}


$_SESSION['gesendet'] = 1;
