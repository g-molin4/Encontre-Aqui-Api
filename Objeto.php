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
        $this->_objetoId= $ArrayObjeto["objetoId"];
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
}
?>