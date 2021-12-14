<?php
include_once "conn.php";
include_once "Classes/Usuario.php";
/*
    cadastro de orgao - feito
    cadastro de adm
    gestão dos objetos alocados no mesmo

*/
class Orgao {
    private $_orgaoId;
    private $_nome;
    private $_cnpj;
    private $_email;
    private $_telefone;
    private $_cep;
    private $_bairro;
    private $_enderecoNumero;
    private $_endereco;
    private $_userId;

    //getters
    public function getOrgaoId(){
        return $this->_orgaoId;
    }
    public function getNome(){
        return $this->_nome;
    }
    public function getCnpj(){
        return $this->_cnpj;
    }
    public function getEmail(){
        return $this->_email;
    }
    public function getTelefone(){
        return $this->_telefone;
    }
    public function getCep(){
        return $this->_cep;
    }
    public function getBairro(){
        return $this->_bairro;
    }
    public function getEnderecoNumero(){
        return $this->_enderecoNumero;
    }
    public function getendereco(){
        return $this->_endereco;
    }
    public function getUserId(){
        return $this->_userId;
    }

    //setters
    public function setNome($novoNome){
        $this->_nome=$novoNome;
    }
    public function setCnpj($novoCnpj){
        $this->_cnpj=$novoCnpj;
    }
    public function setEmail($novoEmail){
        $this->_email=$novoEmail;
    }
    public function setTelefone($novoTelefone){
        $this->_telefone=$novoTelefone;
    }
    public function setCep($novoCep){
        $this->_cep=$novoCep;
    }
    public function setBairro($novoBairro){
        $this->_bairro=$novoBairro;
    }
    public function setEnderecoNum($novoEnderecoNum){
        $this->_enderecoNumero=$novoEnderecoNum;
    }
    public function setendereco($novoendereco){
        $this->_endereco=$novoendereco;
    }
    public function setUserId($UserId){
        $this->_userId=$UserId;
    }

    public static function cadastraOrgao($nome,$cnpj,$email,$telefone,$cep,$bairro,$endereco,$senha,$enredecoNumero){
        $conn= connectionFactory();
        $stmt= $conn->prepare("INSERT INTO usuario (email,senha,cep,bairro,telefone,endereco,nome,nivel,enderecoNumero) values(:email,:senha,:cep,:bairro,:telefone,:endereco,:nome,:nivel,:enderecoNumero)");
        $stmt->execute([
            "email"=>$email,
            "senha"=>$senha,
            "cep"=>$cep,
            "bairro"=>$bairro,
            "telefone"=>$telefone,
            "endereco"=>$endereco,
            "nome"=>$nome,
            "nivel"=>2,
            "enderecoNumero"=>$enredecoNumero
        ]);
        $userId=$conn->lastInsertId();
        $stmt2=$conn->prepare("INSERT INTO orgao(nome,cnpj,email,telefone,cep,bairro,endereco,userId,enderecoNumero) values (:nome,:cnpj,:email,:telefone,:cep,:bairro,:endereco,:userId,:enderecoNumero)");
        $stmt2->execute([
            "nome"=>$nome,
            "cnpj"=>$cnpj,
            "email"=>$email,
            "telefone"=>$telefone,
            "cep"=>$cep,
            "bairro"=>$bairro,
            "endereco"=>$endereco,
            "userId"=>$userId,
            "enderecoNumero"=>$enredecoNumero
        ]);
        $orgaoId=$conn->lastInsertId();
        $stmt3=$conn->prepare("UPDATE usuario SET orgaoId=:orgaoId WHERE id=:userId");
        $stmt3->execute([
            "orgaoId"=>$orgaoId,
            "userId"=>$userId
        ]);
    }
    public static function pegaOrgao($orgaoId){
        $conn=connectionFactory();
        $stmt=$conn->prepare("SELECT * FROM orgao where id=:orgaoId");
        $stmt->execute([ 
            "orgaoId"=>$orgaoId
        ]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function alteraOrgao($nome,$cnpj,$email,$telefone,$cep,$bairro,$enredecoNumero,$endereco,$userId,$id){
        $conn=connectionFactory();
        $stmt=$conn->prepare("UPDATE orgao set nome=:nome,cnpj=:cnpj,email=:email,telefone=:telefone,cep=:cep,bairro=:bairro,enderecoNumero=:enderecoNumero,endereco=:endereco,userId=userId where id=:id");
        $stmt->execute([
            "nome"=>$nome,
            "cnpj"=>$cnpj,
            "email"=>$email,
            "telefone"=>$telefone,
            "cep"=>$cep,
            "bairro"=>$bairro,
            "enderecoNumero"=>$enredecoNumero,
            "endereco"=>$endereco,
            "userId"=>$userId,
            "id"=>$id
        ]);
    }
    public static function verificaCnpjRepetido($cnpj){
        $conn=connectionFactory();
        $stmt=$conn->prepare("SELECT * FROM orgao where cnpj=:cnpj");
        $stmt->execute([
            "cnpj"=>$cnpj
        ]);
        $countRows=count($stmt->fetchAll());

        if($countRows>0)
            return true; //é repetido
        else
            return false; //não é repetido
    }
    
}
?>