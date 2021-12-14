<?php
use PHPMailer\PHPMailer\PHPMailer;

require 'vendor/autoload.php';

$mail= new PHPMailer();
$mail->isSMTP();
$mail->Host = 'smtp.hostinger.com';
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'tls';
$mail->Username = 'faleconosco@encontreaqui.tech';
$mail->Password = 'Encontreaqui@1';
$mail->CharSet = "utf-8";
$mail->Port = 465;
$mail->Encoding = 'base64';

$mail->setFrom('faleconosco@encontreaqui.tech', "Mail | EncontreAqui");
$mail->isHTML(true);
$mail->Subject = 'Encontre Aqui';
$mail->Body= 'Este é o conteúdo da mensagem em <b>HTML!</b>';
$mail->AltBody = 'Para visualizar essa mensagem acesse http://site.com.br/mail';
$mail->addAddress('gabriel.mw3.gm@gmail.com');

if(!$mail->send()) {
    echo 'Não foi possível enviar a mensagem.<br>';
    echo 'Erro: ' . $mail->ErrorInfo;
} else {
    echo 'Mensagem enviada.';
}


?>