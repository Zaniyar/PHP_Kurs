<?php


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
$mail->addAttachment($uploadfile);         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Bug Submission';
$mail->Body    = "Die Prio ist: ".$slider." <br> Der Bugtype ist ".$bugtype." <br> Der Kunde wuenscht ".$rueckruf." <br> Der Fehler ist".$reproduzierbar." <br> Das Datum des Auftretens: ".$date." <br> seine Mailadresse ist ".$mail." <br> seine Url ist ". $url;
$mail->AltBody = 'Wie es scheint, haben Sie gar keine HTML Unterstuetzung.. nc nc ';


	if(!$mail->send()) {
		echo 'Message could not be sent.';
		echo 'Mailer Error: ' . $mail->ErrorInfo;
	} else {
		echo 'Nachricht wurde gesendet!';
	}

