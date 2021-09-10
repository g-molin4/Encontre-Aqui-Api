<?php
include_once "conn.php";
class Objeto{
    private $_objetoId;
    private $_tipoObjeto;
    private $_dataEncontrado;
    private $_localEntId;
    private $_userEncontrouId;
    private $_imagens;

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
    public function getImagens(){
        return $this->_imagens;
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
    public function pegaImagens($inputObjetoId){
        $conn=connectionFactory();
        $stmt=$conn->prepare("SELECT * from imagensObjeto where objetoId=:objetoId and visivel=1");
        $stmt->execute([
            "objetoId"=>$inputObjetoId
        ]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function removeImagem($inputIdImagem){
        $conn=connectionFactory();
        $stmt=$conn->prepare("UPDATE imagensObjeto set visivel=0 where imagemId=:imagemId");
        $stmt->execute([
            "imagemId"=>$inputIdImagem
        ]);
    }
    public static function insereImagem($imagem,$inputObjetoId,$inputUserEncontrouId){
        $ext=$imagem["type"];
        $extensao=explode("/",$ext)[1];
        $temporario=$imagem["tmp_name"];
        $diretorioOrigem="C:\\xampp\\htdocs\\EncontreAqui\\EncontreAquiAnexos\\";
        if($ext =="image/jpeg" || $ext=="image/png" || $ext=="image/jpg"){
            $conn=connectionFactory();
            $stmt=$conn->prepare("SELECT count(*) as total from imagensObjeto where objetoId=:objetoId and visivel=1");
            $stmt->execute([
                "objetoId"=>$inputObjetoId
            ]);
            $row=$stmt->fetch(PDO::FETCH_ASSOC);

            $nomeArquivo=md5("{$row["total"]}_$inputObjetoId").".$extensao";

            if(!is_dir($diretorioOrigem.md5("$inputUserEncontrouId-$inputObjetoId")) && $row["total"]==0){
                mkdir($diretorioOrigem.md5("$inputUserEncontrouId-$inputObjetoId"));
            }
            $diretorio=md5("$inputUserEncontrouId-$inputObjetoId");
            $dirFinal=$diretorioOrigem.md5("$inputUserEncontrouId-$inputObjetoId")."\\$nomeArquivo";
            if(move_uploaded_file($temporario,$dirFinal)){
                $insert= $conn->prepare("INSERT into imagensobjeto (diretorio,nome,objetoId) VALUES (?,?,?)");
                // die("$diretorio $nomeArquivo $inputObjetoId");
                $insert->execute([
                    $diretorio,
                    $nomeArquivo,
                    $inputObjetoId
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
}
?>