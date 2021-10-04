<?php
include_once "../conn.php";
class PontosEntrega {
    public function cadastraPontosEntrega($inputPontosEntrega,$inputUserEncontrouId,$inputLocalEntId){
        $conn= connectionFactory();
        $stmt=$conn->prepare("INSERT INTO objetoencontrado(PontosEntrega,userEncontrouId,localEntId) values (:PontosEntrega,:userEncontrouId,:localEntId)");
        $stmt->execute([
            "pontosEntrega"=>$inputPontosEntrega,
            "userEncontrouId"=>$inputUserEncontrouId,
            "localEntId"=>$inputLocalEntId
        ]);
    }
    public static function pegaPontosEntrega($inputObjetoId){
        $conn=connectionFactory();
        $stmt=$conn->prepare("SELECT * FROM objetoEncontrado where id=:objetoId");
        $stmt->execute([ 
            "objetoId"=>$inputObjetoId
        ]);
        return new Objeto($stmt->fetch(PDO::FETCH_ASSOC));
    }
    public function alteraPontosEntrega($inputId,$inputPontosEntrega,$inputLocalEntId,$inputUserEncontrouId){
        $conn=connectionFactory();
        $stmt=$conn->prepare("UPDATE objetoEncontrado set PontosEntrega=:PontosEntrega,localEntId=:localEntId,userEncontrouId=:userEncontrouId where id=:id");
        $stmt->execute([
            "id"=>$inputId,
            "pontosEntrega"=>$inputPontosEntrega,
            "localEntId"=>$inputLocalEntId,
            "userEntId"=>$inputUserEncontrouId
        ]);
    }
}

?>