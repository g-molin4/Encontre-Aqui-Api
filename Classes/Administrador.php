<?php
include_once "../conn.php";
class Administrador{
    private $_admId;
    private $_telefone;
    private $_cpf;
    private $_email;
    private $_nome;
    private $_orgaoId;
    private $_senha;

    #getters
    public function getAdmId(){
        return $this->_admId;
    }
    public function getCpf(){
        return $this->_cpf;
    }
    public function getEmail(){
        return $this->_email;
    }
    public function getNome(){
        return $this->_nome;
    }
    public function getSenha(){
        return $this->_senha;
    }
    public function getOrgaoId(){
        return $this->_orgaoId;
    }
    public function getTelefone(){
        return $this->_telefone;
    }

    #setters
    public function setCpf($novoCpf){
        $this->_cpf=$novoCpf;
    }
    public function setEmail($novoEmail){
        $this->_email=$novoEmail;
    }
    public function setNome($novoNome){
        $this->_nome=$novoNome;
    }
    public function setSenha($novoSenha){
        $this->_senha=$novoSenha;
    }
    public function setOrgaoId($novoOrgaoId){
        $this->_orgaoId=$novoOrgaoId;
    }
    public function setTelefone($novoTelefone){
        $this->_telefone=$novoTelefone;
    }

    public function criaAdmin($telefone,$cpf,$email,$nome,$orgaoId,$senha){
        $conn=connectionFactory();
        $stmt=$conn->prepare("INSERT INTO administrador (cpf,email,nome,telefone,orgaoId,senha) values (:cpf,:email,:nome,:telefone:orgaoId,:senha)");
        $stmt->execute([
            "cpf"=>$cpf,
            "email"=>$email,
            "nome"=>$nome,
            "telefone"=>$telefone,
            "orgaoId"=>$orgaoId,
            "senha"=>$senha,

        ]);
    }
    public function pegaAdmin($id){
        $conn=connectionFactory();
        $stmt=$conn->prepare("SELECT * FROM administrador WHERE id=:id");
        $stmt->execute([
            "id"=>$id
        ]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function alteraAdmin($telefone,$cpf,$email,$nome,$orgaoId,$senha,$id){
        $conn=connectionFactory();
        $stmt=$conn->prepare("UPDATE administrador cpf=:cpf,email=:email,nome=:nome,telefone=:telefone,orgaoId=:orgaoId,senha=:senha SET WHERE id=:id");
        $stmt->execute([
            "cpf"=>$cpf,
            "email"=>$email,
            "nome"=>$nome,
            "telefone"=>$telefone,
            "orgaoId"=>$orgaoId,
            "senha"=>$senha,
            "id"=>$id
        ]);
    }
}
?>