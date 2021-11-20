<?php
include_once "conn.php";
class TiposObjeto {
    private $_idObjeto;
    private $_tipo;

    public function getTipoObjetoId(){
        return $this->_idObjeto;
    }
    public function getTipo(){
        return $this->_tipo;
    }
    public function setTipo($novoTipo){
        $this->_tipo=$novoTipo;
    }
    
    public function cadastraTipoObjeto($inputTipoObjeto){
        $conn= connectionFactory();
        $stmt=$conn->prepare("INSERT INTO tipoobjeto(tipoObjeto) values (:tipoObjeto)");
        $stmt->execute([
            "tipoObjeto"=>$inputTipoObjeto
        ]);
    }
    public static function pegaTipoObjeto($tipoObjetoId){
        $conn=connectionFactory();
        $stmt=$conn->prepare("SELECT * FROM tipoobjeto where id=:tipoObjetoId");
        $stmt->execute([ 
            "tipoObjetoId"=>$tipoObjetoId
        ]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public static function pegaTiposObjeto(){
        $conn=connectionFactory();
        $stmt=$conn->prepare("SELECT * FROM tipoobjeto ORDER BY tipo");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function alteraTipoObjeto($inputId,$inputTipoObjeto){
        $conn=connectionFactory();
        $stmt=$conn->prepare("UPDATE tipoobjeto set tipoObjeto=:tipoObjeto where id=:id");
        $stmt->execute([
            "id"=>$inputId,
            "tipoObjeto"=>$inputTipoObjeto,
        ]);
    }
}

?>