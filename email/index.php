<?php

require("./vendor/autoload.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;


//use PHPMailer\PHPMailer;
//

$mail = new PHPMailer();

$mail->isSMTP();

//$mail->SMTPDebug = SMTP::DEBUG_SERVER;

$mail->Host = 'smtp.gmail.com';

$mail->Port = 587;
//587

$mail->SMTPSecure = "tls";
//tls

$mail->SMTPAuth = true;

$mail->Username = 'pereiraaugustopedro2021@gmail.com';

$mail->Password = 'pedrinho10';

//$mail->setFrom('pereiraaugustopedro2021@gmail.com');

//$mail->addReplyTo('replyto@example.com', 'First Last');

$mail->addAddress('elisfaiz0@gmail.com', 'AMOR');

$mail->Subject = 'TE AMO MOMOI, BONS ESTUDOS!';

//$mail->msgHTML(file_get_contents('contents.html'), __DIR__);

$mail->AltBody = 'oi momoi, passando pra avisar que você é o amor da minha vida e vai ir muito bem na prova amanhã!\n\n beijos do seu amor\n com amor: Pedro';

$mail->Body = 'oi momoi, passando pra avisar que você é o amor da minha vida e vai ir muito bem na prova amanhã!\n\n beijos do seu amor\n com amor: Pedro';


//$mail->addAttachment('images/phpmailer_mini.png');

if (!$mail->send()) {
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message sent!';
}

function save_mail($mail)
{
    $path = '{imap.gmail.com:993/imap/ssl}[Gmail]/Sent Mail';

    $imapStream = imap_open($path, $mail->Username, $mail->Password);

    $result = imap_append($imapStream, $path, $mail->getSentMIMEMessage());
    imap_close($imapStream);

    return $result;
}


?>