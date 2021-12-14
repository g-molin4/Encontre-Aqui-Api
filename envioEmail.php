<?php
use PHPMailer\PHPMailer\PHPMailer;

require 'vendor/autoload.php';

function enviaEmail($mensagem,$destino,$nome,$contato){
    $mail= new PHPMailer();
    $mail->isSMTP();
    $mail->Host = 'smtp.hostinger.com';
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->Username = 'faleconosco@encontreaqui.tech';
    $mail->Password = 'Encontreaqui@1';
    $mail->CharSet = "utf-8";
    $mail->Port = 587;
    $mail->Encoding = 'base64';

    $mail->setFrom('faleconosco@encontreaqui.tech', "Mail | EncontreAqui");
    $mail->isHTML(true);
    $mail->Subject = 'Fale Conosco | Encontre Aqui';
    $mail->Body= 'Responder para: '.$destino.'<br>Nome: '.$nome. '<br>Contato:'.$contato."<br>Mensagem: $mensagem" ;
    $mail->AltBody = 'EncontreAqui!';
    $mail->addAddress('gabriel.mw3.gm@gmail.com');

    if(!$mail->send()) {
        echo 'Erro: ' . $mail->ErrorInfo;
        return 'Não foi possível enviar a mensagem.<br>';
    } else {
        return true; 
    }
}

?>