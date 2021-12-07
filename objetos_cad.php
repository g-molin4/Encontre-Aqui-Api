<?php
include_once "Classes/Objeto.php";
include_once "Classes/TiposObjeto.php";
include_once "Classes/Orgao.php";
session_start();
if($_SESSION){
    $usuario=json_decode($_SESSION["usuario"]);
    $tipo=$_GET["a"]??"";
    $id=$_GET["b"]??"";
    if($usuario->nivel==2 && empty($tipo)){
        die('{"erro":"Você não tem acesso a esse conteúdo"}');
    }
    else if ($usuario->nivel==1 && !empty($tipo)){
        die('{"erro":"Você não tem acesso a esse conteúdo"}');
    }
    $objetos= json_decode(Objeto::objetosFeed($tipo,$id));
    for($i=0;$i<count($objetos);$i++){
        $objetos[$i]->orgao=json_decode(json_encode(Orgao::pegaOrgao($objetos[$i]->orgaoId)));
        $objetos[$i]->tipoObjeto=json_decode(json_encode(TiposObjeto::pegaTipoObjeto($objetos[$i]->tipoObjetoId)));
        $objetos[$i]->imagem=json_decode(json_encode(Objeto::pegaImagens($objetos[$i]->id)));
        // echo $objetos[$i]->orgao;
    }
    // $objetos[0]->orgaoId;
    echo json_encode($objetos);
}
else{
    echo '{"erro":"Você não tem acesso a esse conteúdo"}';
}

?>