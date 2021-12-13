<?php
include_once "conn.php";
class Objeto{
    private $_objetoId;
    private $_dataEncontrado;
    private $_userEncontrouId;
    private $_orgaoId;
    private $_descricao;
    private $_tipoObjetoId;
    private $_userPerdeuId;
    private $_status;
    private $_subStatus;
    private $_dataAlteracao;
    private $_admId;
    private $_imagens;

    //getters
    public function getObjetoId(){
        return $this->_objetoId;
    }
    public function getDataEncontrado(){
        return $this->_dataEncontrado;
    }
    public function getEncontrouId(){
        return $this->_userEncontrouId;
    }
    public function getOrgaoId(){
        return $this->_orgaoId;
    }
    public function getDescricao(){
        return $this->_descricao;
    }
    public function getTipoObjetoId(){
        return $this->_tipoObjetoId;
    }
    public function getUserPerdeuId(){
        return $this->_userPerdeuId;
    }
    public function getStatus(){
        return $this->_status;
    }
    public function getSubStatus(){
        return $this->_subStatus;
    }
    public function getAlteracao(){
        return $this->_dataAlteracao;
    }
    public function getAdmId(){
        return $this->_admId;
    }
    public function getImagens(){
        return $this->_imagens;
    }

    //setters
    public function setDataEncontrado($value){
        $this->_dataEncontrado=$value;
    }
    public function setEncontrouId($value){
        $this->_encontrouId=$value;
    }
    public function setUserEncontrouId($value){
        $this->_userEncontrouId=$value;
    }
    public function setOrgaoId($value){
        $this->_orgaoId=$value;
    }
    public function setDescricao($value){
        $this->_descricao=$value;
    }
    public function setTipoObjetoId($value){
        $this->_tipoObjetoId=$value;
    }
    public function setUserPerdeuId($value){
        $this->_userPerdeuId=$value;
    }
    public function setStatus($value){
        $this->_status=$value;
    }
    public function setSubStatus($value){
        $this->_subStatus=$value;
    }
    public function setAlteracao($value){
        $this->_dataAlteracao=$value;
    }
    public function setAdmId($value){
        $this->_admId=$value;
    }


    public function __construct($ArrayObjeto){
        $this->_objetoId= $ArrayObjeto["id"];
        $this->_tipoObjeto=$ArrayObjeto["tipoObjeto"];
        $this->_dataEncontrado=$ArrayObjeto["dataEncontrado"];
        $this->_localEntId=$ArrayObjeto["localEntId"];
        $this->_userEncontrouid=$ArrayObjeto["userEncontrouId"];
    }
    public static function cadastraObjeto($descricao,$status,$tipoObjetoId,$orgaoId,$imagem){
        $conn= connectionFactory();
        $stmt=$conn->prepare("INSERT INTO objeto(descricao,status,tipoObjetoId,orgaoId) values (:descricao,:status,:tipoObjetoId,:orgaoId)");
        $stmt->execute([
            "descricao"=>$descricao,
            "status"=>$status,
            "tipoObjetoId"=>$tipoObjetoId,
            "orgaoId"=>$orgaoId
        ]);
        $objetoId=$conn->lastInsertId();
        if(Objeto::insereImagem($imagem,$objetoId) <>"Arquivo Anexado"){
            $stmt2=$conn->prepare("DELETE FROM objeto WHERE id=:objetoId");
            $stmt2->execute(["objetoId"=>$objetoId]);
            return "Objeto não cadastrado";
        }
        else {
            return "Objeto cadastrado";
        }
    }
    public static function pegaObjeto($inputObjetoId){
        $conn=connectionFactory();
        $stmt=$conn->prepare("SELECT * FROM objeto where id=:objetoId");
        $stmt->execute([ 
            "objetoId"=>$inputObjetoId
        ]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public static function alteraObjeto($descricao,$status,$tipoObjetoId,$objetoId){
        $conn=connectionFactory();
        $stmt=$conn->prepare("UPDATE objeto set descricao=:descricao,status=:status,tipoObjetoId=:tipoObjetoId where id=:objetoId");
        $stmt->execute([
            "descricao"=>$descricao,
            "status"=>$status,
            "tipoObjetoId"=>$tipoObjetoId,
            "objetoId"=>$objetoId
        ]);
    }
    public static function pegaImagens($inputObjetoId){
        $conn=connectionFactory();
        $stmt=$conn->prepare("SELECT * from imagemobjeto where objetoId=:objetoId and visivel=1");
        $stmt->execute([
            "objetoId"=>$inputObjetoId
        ]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function removeImagem($inputIdImagem){
        $conn=connectionFactory();
        $stmt=$conn->prepare("UPDATE imagemobjeto set visivel=0 where imagemId=:imagemId");
        $stmt->execute([
            "imagemId"=>$inputIdImagem
        ]);
    }
    public static function insereImagem($imagem,$inputObjetoId){
        $ext=$imagem["type"];
        $extensao=explode("/",$ext)[1];
        $temporario=$imagem["tmp_name"];
        $diretorioOrigem="EncontreAquiAnexos/";
        if($ext =="image/jpeg" || $ext=="image/png" || $ext=="image/jpg"){
            $conn=connectionFactory();
            $stmt=$conn->prepare("SELECT count(*) as total from imagemobjeto where objetoId=:objetoId and visivel=1");
            $stmt->execute([
                "objetoId"=>$inputObjetoId
            ]);
            $row=$stmt->fetch(PDO::FETCH_ASSOC);

            $nomeArquivo=md5("{$row["total"]}_$inputObjetoId").".$extensao";

            if(!is_dir($diretorioOrigem.md5("$inputObjetoId")) && $row["total"]==0){
                mkdir($diretorioOrigem.md5("$inputObjetoId"));
            }
            $diretorio=md5("$inputObjetoId");
            $dirFinal=$diretorioOrigem.md5("$inputObjetoId")."/$nomeArquivo";
            if(move_uploaded_file($temporario,$dirFinal)){
                $insert= $conn->prepare("INSERT into imagemobjeto (diretorio,objetoId,nomeArquivo) VALUES (?,?,?)");
                // die("$diretorio $nomeArquivo $inputObjetoId");
                $insert->execute([
                    $dirFinal,
                    $inputObjetoId,
                    $nomeArquivo
                ]);
                return "Arquivo Anexado";
            }
            else{
                return "erro ao salvar o arquivo";
            }

        }
        else{
            return "Tipo de arquivo não aceito";
        }
    }
    public static function objetosFeed($tipo,$id="",$tipoObjeto,$status){
        if($tipo=="o")
            $tipo="orgaoId";
        else if ($tipo=="a")
            $tipo="userId";
        else 
            $tipo="";
        
        $conn=connectionFactory();
        if(!empty($id)){
            $stmt=$conn->prepare("SELECT * FROM objeto WHERE $tipo=:$tipo and status=:status and tipoObjetoId like :tipoObjeto");
            $stmt->execute([
                "$tipo"=>$id,
                "status"=>$status,
                "tipoObjeto"=>"%$tipoObjeto%"
            ]);
            return json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
        }
        else{
            $stmt=$conn->prepare("SELECT * FROM objeto WHERE status=:status and tipoObjetoId like :tipoObjeto");
            $stmt->execute([
                "status"=>$status,
                "tipoObjeto"=>"%$tipoObjeto%"
            ]);
            return json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
        }
    }
}
?>