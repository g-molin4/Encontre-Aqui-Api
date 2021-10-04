<?php
include_once "../conn.php";
class OrgaosInteressados {
    public function cadastraOrgaosInteressados($inputOrgaosInteressados,$inputUserEncontrouId,$inputLocalEntId){
        $conn= connectionFactory();
        $stmt=$conn->prepare("INSERT INTO objetoencontrado(OrgaosInteressados,userEncontrouId,localEntId) values (:OrgaosInteressados,:userEncontrouId,:localEntId)");
        $stmt->execute([
            "orgaosInteressados"=>$inputOrgaosInteressados,
            "userEncontrouId"=>$inputUserEncontrouId,
            "localEntId"=>$inputLocalEntId
        ]);
    }
    public static function pegaOrgaosInteressados($inputObjetoId){
        $conn=connectionFactory();
        $stmt=$conn->prepare("SELECT * FROM objetoEncontrado where id=:objetoId");
        $stmt->execute([ 
            "objetoId"=>$inputObjetoId
        ]);
        return new Objeto($stmt->fetch(PDO::FETCH_ASSOC));
    }
    public function alteraOrgaosInteressados($inputId,$inputOrgaosInteressados,$inputLocalEntId,$inputUserEncontrouId){
        $conn=connectionFactory();
        $stmt=$conn->prepare("UPDATE objetoEncontrado set OrgaosInteressados=:OrgaosInteressados,localEntId=:localEntId,userEncontrouId=:userEncontrouId where id=:id");
        $stmt->execute([
            "id"=>$inputId,
            "orgaosInteressados"=>$inputOrgaosInteressados,
            "localEntId"=>$inputLocalEntId,
            "userEntId"=>$inputUserEncontrouId
        ]);
    }
}

?>