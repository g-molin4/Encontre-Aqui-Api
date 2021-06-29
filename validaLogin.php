<?php
$req=file_get_contents("php://input");
$user=json_decode($req);
$response= new \stdClass;
try{
    if(empty($user->email) || empty($user->password))
        throw new Exception('Requisição nula.');
    if($user->email=="gabriel.mw3.gm@gmail.com" && $user->password=="123456"){
        $response->validaLogin=true;
    }
    else{
        
        $response->validaLogin=false;
    }
}
catch(Exception $e){
    echo $e->getMessage();
}


echo json_encode($response);
?>