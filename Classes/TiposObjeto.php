<?php
include_once "../conn.php";
class TiposObjeto {
    public function cadastraTipoObjeto($inputTipoObjeto,$inputUserEncontrouId,$inputLocalEntId){
        $conn= connectionFactory();
        $stmt=$conn->prepare("INSERT INTO objetoencontrado(tipoObjeto,userEncontrouId,localEntId) values (:tipoObjeto,:userEncontrouId,:localEntId)");
        $stmt->execute([
            "tipoObjeto"=>$inputTipoObjeto,
            "userEncontrouId"=>$inputUserEncontrouId,
            "localEntId"=>$inputLocalEntId
        ]);
    }
    public static function pegaTipoObjeto($inputObjetoId){
        $conn=connectionFactory();
        $stmt=$conn->prepare("SELECT * FROM objetoEncontrado where id=:objetoId");
        $stmt->execute([ 
            "objetoId"=>$inputObjetoId
        ]);
        return new Objeto($stmt->fetch(PDO::FETCH_ASSOC));
    }
    public function alteraTipoObjeto($inputId,$inputTipoObjeto,$inputLocalEntId,$inputUserEncontrouId){
        $conn=connectionFactory();
        $stmt=$conn->prepare("UPDATE objetoEncontrado set tipoObjeto=:tipoObjeto,localEntId=:localEntId,userEncontrouId=:userEncontrouId where id=:id");
        $stmt->execute([
            "id"=>$inputId,
            "tipoObjeto"=>$inputTipoObjeto,
            "localEntId"=>$inputLocalEntId,
            "userEntId"=>$inputUserEncontrouId
        ]);
    }
}

?>