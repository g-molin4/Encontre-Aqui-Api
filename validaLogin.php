<?php
$req=file_get_contents("php://input");
$user=json_decode($req);
$response= new \stdClass;
try{
    if(!isset($user->email) || !isset($user->password))
        throw new Exception('');
    if($user->email=="gabriel.mw3.gm@gmail.com" && $user->password=="123456"){
        $response->validaLogin=true;
        $response->email=$user->email;
        $response->password=$user->password;
        $response->erro=[];
    }
    else{
        $response->validaLogin=false;
        $response->erro="Login ou senha inválidos";
    }
}
catch(Exception $e){
    $response->validaLogin=false;
    $response->erro="Ocorreu um erro inesperado";
}


echo json_encode($response);
?>