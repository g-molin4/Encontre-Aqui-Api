<?php
include "Classes/Objeto.php";
include "Classes/TiposObjeto.php";
include "Classes/Orgao.php";
session_start();
// $usuario=json_decode($_SESSION["usuario"]);
$tipo=$_GET["a"]??"";
$id=$_GET["b"]??"";

$objetos= json_decode(Objeto::objetosFeed($tipo,$id));

for($i=0;$i<count($objetos);$i++){
    $objetos[$i]->orgao=json_decode(json_encode(Orgao::pegaOrgao($objetos[$i]->orgaoId)));
    $objetos[$i]->tipoObjeto=json_decode(json_encode(TiposObjeto::pegaTipoObjeto($objetos[$i]->tipoObjetoId)));
    // echo $objetos[$i]->orgao;
}

// $objetos[0]->orgaoId;
echo json_encode($objetos);


// die(var_dump($objetos));
?>