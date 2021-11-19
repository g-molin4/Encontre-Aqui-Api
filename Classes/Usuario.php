<?php

include_once "funcoes.php";
include_once "conn.php";

class Usuario{
    private $_userId;
    private $_cpf;
    private $_senha;
    private $_email;
    private $_token;
    private $_cep;
    private $_bairro;
    private $_enderecoNumero;
    private $_endereco;
    private $_telefone;
    private $_master;
    

    //getters
    public function getUserId(){
        return $this->_userId;
    }
    public function getCpf(){
        return $this->_cpf;
    }
    public function getNome(){
        return $this->_nome;
    }
    public function getSenha(){
        return $this->_senha;
    }
    public function getEmail(){
        return $this->_email;
    }
    public function getToken(){
        return $this->_token;
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
    public function getTelefone(){
        return $this->_telefone;
    }

    //setters
    public function setCpf($novoCpf){
        $this->_senha=$novoCpf;
    }
    public function setNome($novoNome){
        $this->_nome=$novoNome;
    }
    public function setSenha($novaSenha){
        $this->_senha=$novaSenha;
    }
    public function setEmail($novoEmail){
        $this->_email=$novoEmail;
    }
    public function setCep($novoCep){
        $this->_senha=$novoCep;
    }
    public function setBairro($novoBairro){
        $this->_bairro=$novoBairro;
    }
    public function setEnderecoNum($novoEnderecoNum){
        $this->_enderecoNumero=$novoEnderecoNum;
    }
    public function setTelefone($novoTel){
        $this->_telefone=$novoTel;
    }


    // public function __construct($arrayUser){
    //     $this->_userId=$arrayUser["id"];
    //     $this->_login=$arrayUser["login"];
    //     $this->_senha=$arrayUser["password"];
    // }


    public static function validaLogin($email,$senha){
        //fazer consulta no banco para validar login
        $conn=connectionFactory();
        $stmt=$conn->prepare("SELECT * FROM usuario WHERE email=:email and senha=:password");
        $stmt->execute(array(
            'email'=>$email,
            "password"=>$senha
        ));
        if($stmt->rowCount()>0){
            // return new Usuario($stmt->fetch(PDO::FETCH_ASSOC));
            // $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $stmt->fetchAll(PDO::FETCH_ASSOC)[0];
        }
        else{
            echo false;
        }
    }
    public static function cadastraUser($email,$senha,$cpf,$cep,$bairro,$telefone,$endereco,$nome){
        $conn=connectionFactory();
        $stmt= $conn->prepare("INSERT INTO usuario (email,senha,cpf,cep,bairro,telefone,endereco,nome) values(:email,:senha,:cpf,:cep,:bairro,:telefone,:endereco,:nome)");
        $stmt->execute([
            "email"=>$email,
            "senha"=>$senha,
            "cpf"=>$cpf,
            "cep"=>$cep,
            "bairro"=>$bairro,
            "telefone"=>$telefone,
            "endereco"=>$endereco,
            "nome"=>$nome,
        ]);
    }
    public static function alteraUser($email,$senha,$cpf,$cep,$bairro,$enderecoNumero,$telefone,$endereco,$master){
        $conn=connectionFactory();
        $stmt= $conn->prepare("UPDATE usuario SET email=:email,senha=:senha,cpf=:cpf,cep=:cep,bairro=:bairro,enderecoNumero=:enderecoNumero,telefone=:telefone,endereco=:endereco,master=:master WHERE id=:userId");
        $stmt->execute([
            "email"=>$email,
            "senha"=>$senha,
            "cpf"=>$cpf,
            "cep"=>$cep,
            "bairro"=>$bairro,
            "enderecoNumero"=>$enderecoNumero,
            "telefone"=>$telefone,
            "endereco"=>$endereco,
            "master"=>$master,
        ]);
    }
    
    function alterarSenha($userId,$senhaNova){ //IMPORTANTE!!! Falta criar metodo de envio de email para alteração de senha
        
        $conn=connectionFactory();
        $stmt=$conn->prepare("UPDATE usuario SET senha=:senha WHERE id=:userId");
        $stmt->execute([
            "senha"=>$senhaNova,
            "userId"=>$userId
        ]);
    }
    public static function verificaCpfRepetido($inputCpf){
        $conn=connectionFactory();
        $stmt=$conn->prepare("SELECT * FROM usuario where cpf=:cpf");
        $stmt->execute([
            "cpf"=>$inputCpf
        ]);
        $countRows=count($stmt->fetchAll());

        if($countRows>0)
            return true; //é repetido
        else
            return false; //não é repetido
    }
    public static function gerarTokenSenha($email){
        $conn=connectionFactory();
        $stmt=$conn->prepare("SELECT id FROM usuario WHERE email=:email");
        $stmt->execute([
            "email"=>$email
        ]);
        $row=$stmt->fetchAll(PDO::FETCH_ASSOC);

        if(count($row)>0){
            $token=generateRandomString();
            $stmt=$conn->prepare("UPDATE usuario SET token=:token,expiraToken=DATEADD(now(), INTERVAL 3 HOUR) where id=:id");
            $stmt->execute([
                "token"=>$token,
                "id"=>$row["id"]
            ]);
            return $token;
        }
        else{
            return false;
        }
    }
    public static function validaTokenSenha($token,$userId){
        $conn= connectionFactory();
        $stmt= $conn->prepare("SELECT token FROM usuario WHERE token=:token and id=:userId and expiraToken<=now()");
        $stmt->execute([
            "token"=>$token,
            "userId"=>$userId
        ]);
        $row= $stmt->fetchAll(PDO::FETCH_ASSOC);
        if(count($row)==0)
            return false;
        else
            return true;
    }
}

?>