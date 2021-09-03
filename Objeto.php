<?php
include_once "conn.php";
class Objeto{
    private $_objetoId;
    private $_tipoObjeto;
    private $_dataEncontrado;
    private $_localEntId;
    private $_userEncontrouId;

    //getters
    public function getObjetoId(){
        return $this->_objetoId;
    }
    public function getTipoObjeto(){
        return $this->_tipoObjeto;
    }
    public function getDataEncontrado(){
        return $this->_dataEncontrado;
    }
    public function getLocalEntId(){
        return $this->_localEntId;
    }
    public function getUserEncontrouId(){
        return $this->_userEncontrouId;
    }

    //setters
    public function setTipoObjeto($novoTipoObjeto){
        $this->_tipoObjeto=$novoTipoObjeto;
    }


    public function __construct($ArrayObjeto){
        $this->_objetoId= $ArrayObjeto["id"];
        $this->_tipoObjeto=$ArrayObjeto["tipoObjeto"];
        $this->_dataEncontrado=$ArrayObjeto["dataEncontrado"];
        $this->_localEntId=$ArrayObjeto["localEntId"];
        $this->_userEncontrouid=$ArrayObjeto["userEncontrouId"];
    }
    public function cadastraObjeto($inputTipoObjeto,$inputUserEncontrouId,$inputLocalEntId){
        $conn= connectionFactory();
        $stmt=$conn->prepare("INSERT INTO objetoencontrado(tipoObjeto,userEncontrouId,localEntId) values (:tipoObjeto,:userEncontrouId,:localEntId)");
        $stmt->execute([
            "tipoObjeto"=>$inputTipoObjeto,
            "userEncontrouId"=>$inputUserEncontrouId,
            "localEntId"=>$inputLocalEntId
        ]);
    }
    public static function pegaObjeto($inputObjetoId){
        $conn=connectionFactory();
        $stmt=$conn->prepare("SELECT * FROM objetoEncontrado where id=:objetoId");
        $stmt->execute([ 
            "objetoId"=>$inputObjetoId
        ]);
        return new Objeto($stmt->fetch(PDO::FETCH_ASSOC));
    }
    public function alteraObjeto($inputId,$inputTipoObjeto,$inputLocalEntId,$inputUserEncontrouId){
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