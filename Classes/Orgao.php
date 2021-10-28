<?php
include_once "../conn.php";
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
    private $_rua;
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
    public function getRua(){
        return $this->_rua;
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
    public function setRua($novoRua){
        $this->_rua=$novoRua;
    }
    public function setUserId($UserId){
        $this->_userId=$UserId;
    }

    public function cadastraOrgao($nome,$cnpj,$email,$telefone,$cep,$bairro,$enredecoNumero,$rua,$userId){
        $conn= connectionFactory();
        $stmt=$conn->prepare("INSERT INTO orgao(nome,cnpj,email,telefone,cep,bairro,enderecoNumero,rua,userId) values (:nome,:cnpj,:email,:telefone,:cep,:bairro,:enderecoNumero,:rua,:userId)");
        $stmt->execute([
            "nome"=>$nome,
            "cnpj"=>$cnpj,
            "email"=>$email,
            "telefone"=>$telefone,
            "cep"=>$cep,
            "enderecoNumero"=>$enredecoNumero,
            "rua"=>$rua,
            "userId"=>$userId,
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
    public function alteraOrgao($nome,$cnpj,$email,$telefone,$cep,$bairro,$enredecoNumero,$rua,$userId,$id){
        $conn=connectionFactory();
        $stmt=$conn->prepare("UPDATE orgao set nome=:nome,cnpj=:cnpj,email=:email,telefone=:telefone,cep=:cep,bairro=:bairro,enderecoNumero=:enderecoNumero,rua=:rua,userId=userId where id=:id");
        $stmt->execute([
            "nome"=>$nome,
            "cnpj"=>$cnpj,
            "email"=>$email,
            "telefone"=>$telefone,
            "cep"=>$cep,
            "bairro"=>$bairro,
            "enderecoNumero"=>$enredecoNumero,
            "rua"=>$rua,
            "userId"=>$userId,
            "id"=>$id
        ]);
    }
}
?>