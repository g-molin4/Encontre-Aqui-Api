<?php
include "Usuario.php";

$Usuario=new Usuario(["id"=>"2","login"=>"gabriel","password"=>"8864"]);
$Usuario->pegaObjetos();

// echo json_encode($Usuario->retornaUser());

echo json_encode($Usuario->getUser());

?>