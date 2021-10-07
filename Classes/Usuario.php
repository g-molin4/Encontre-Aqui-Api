<?php

include_once "../funcoes.php";
include_once "../conn.php";

class Usuario{
    private $_userId;
    private $_login;
    private $_password;
    private $_objetos;

    //getters
    public function getUserId(){
        return $this->_userId;
    }
    public function getLogin(){
        return $this->login;
    }
    public function getPassword(){
        return $this->password;
    }
    
    function getUser(){ // Será usado para formar a variável de sessão do usuário
        return $this;
    }

    //setters
    public function setLogin($novoLogin){
        $this->_login=$novoLogin;
    }
    public function setPassword($novaSenha){
        $this->_password=$novaSenha;
    }


    public function __construct($arrayUser){
        $this->_userId=$arrayUser["id"];
        $this->_login=$arrayUser["login"];
        $this->_password=$arrayUser["password"];
    }
    public static function validaLogin($inputLogin,$inputPassword){
        //fazer consulta no banco para validar login
        $conn=connectionFactory();
        $stmt=$conn->prepare("SELECT * FROM user WHERE login=:login and password=:password");
        $stmt->execute(array(
            'login'=>$inputLogin,
            "password"=>$inputPassword
        ));
        if($stmt->rowCount()>0){
            return new Usuario($stmt->fetch(PDO::FETCH_ASSOC));
        }
        else{
            echo "usuário ou senha inválidos";
        }
    }
    public static function cadastraUser($inputLogin,$inputPassword){
        $conn=connectionFactory();
        $stmt= $conn->prepare("INSERT INTO user (login,password) values(:login,:password)");
        $stmt->execute([
            "login"=>$inputLogin,
            "password"=>$inputPassword
        ]);
    }
    public static function alteraUser($inputId,$inputLogin,$inputPassword){
        $conn=connectionFactory();
        $stmt= $conn->prepare("UPDATE user SET login=:login,password=:password WHERE id=:userId");
        $stmt->execute([
            "login"=>$inputLogin,
            "password"=>$inputPassword,
            "userId"=>$inputId
        ]);
    }
    
    function pegaObjetos(){
        $conn=connectionFactory();
        $stmt=$conn->prepare("SELECT * FROM objetoEncontrado where userEncontrouId=:userId");
        $stmt->execute([ 
            "userId"=>$this->_userId
        ]);
        $objetos=$stmt->fetchAll(PDO::FETCH_ASSOC);
        $this->_objetos=$objetos;
    }
    function alterarSenha($inputUserId,$inputSenhaNova){ //IMPORTANTE!!! Falta criar metodo de envio de email para alteração de senha
        
        $conn=connectionFactory();
        $stmt=$conn->prepare("UPDATE user SET password=:password WHERE id=:userId");
        $stmt->execute([
            "password"=>$inputSenhaNova,
            "userId"=>$inputUserId
        ]);
    }
    public static function verificaCpfRepetido($inputCpf){
        $conn=connectionFactory();
        $stmt=$conn->prepare("SELECT * FROM user where cpf=:cpf");
        $stmt->execute([
            "cpf"=>$inputCpf
        ]);
        $countRows=count($stmt->fetchAll());

        if($countRows>0)
            return true; //é repetido
        else
            return false; //não é repetido
    }
    public static function gerarTokenSenha($inputLogin){
        $conn=connectionFactory();
        $stmt=$conn->prepare("SELECT id FROM user WHERE login=:login");
        $stmt->execute([
            "login"=>$inputLogin
        ]);
        $row=$stmt->fetchAll(PDO::FETCH_ASSOC);

        if(count($row)>0){
            $token=generateRandomString();
            $stmt=$conn->prepare("UPDATE user SET token=:token,expira_token=DATEADD(now(), INTERVAL 3 HOUR) where id=:id");
            $stmt->execute([
                "token"=>$token,
                "id"=>$row["id"]
            ]);
            
        }
        else{
            return false;
        }


    }
}

?>