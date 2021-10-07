<?php

use PHPMailer\PHPMailer\PHPMailer;

require 'vendor/autoload.php';

$mail= new PHPMailer();
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'tls';
$mail->Username = 'encontreaquimail@gmail.com';
$mail->Password = 'encontreaqui@2021';
$mail->CharSet = "utf-8";
$mail->Port = 587;
$mail->Encoding = 'base64';

$mail->setFrom('encontreaquimail@gmail.com', "Mail | EncontreAqui");
$mail->isHTML(true);
$mail->Subject = 'Encontre Aqui';
$mail->Body= 'Este é o conteúdo da mensagem em <b>HTML!</b>';
$mail->AltBody = 'Para visualizar essa mensagem acesse http://site.com.br/mail';
$mail->addAddress('gabriel@fintex.com.br');

if(!$mail->send()) {
    echo 'Não foi possível enviar a mensagem.<br>';
    echo 'Erro: ' . $mail->ErrorInfo;
} else {
    echo 'Mensagem enviada.';
}
?>