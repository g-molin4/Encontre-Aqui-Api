<?php

include_once "../funcoes.php";
include_once "../conn.php";

class Usuario{
    private $_userId;
    private $_login;
    private $_password;

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
    


    //setters
    public function setLogin($novoLogin){
        $this->_login=$novoLogin;
    }
    public function setPassword($novaSenha){
        $this->_senha=$novaSenha;
    }


    public function __construct($arrayUser){
        $this->_userId=$arrayUser["id"];
        $this->_login=$arrayUser["login"];
        $this->_senha=$arrayUser["password"];
    }
    public static function validaLogin($inputLogin,$inputPassword){
        //fazer consulta no banco para validar login
        $conn=connectionFactory();
        $stmt=$conn->prepare("SELECT * FROM usuario WHERE login=:login and senha=:password");
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
        $stmt= $conn->prepare("INSERT INTO usuario (login,password) values(:login,:password)");
        $stmt->execute([
            "login"=>$inputLogin,
            "password"=>$inputPassword
        ]);
    }
    public static function alteraUser($inputId,$inputLogin,$inputPassword){
        $conn=connectionFactory();
        $stmt= $conn->prepare("UPDATE usuario SET login=:login,senha=:password WHERE id=:userId");
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
        $stmt=$conn->prepare("UPDATE usuario SET senha=:password WHERE id=:userId");
        $stmt->execute([
            "password"=>$inputSenhaNova,
            "userId"=>$inputUserId
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
    public static function gerarTokenSenha($inputLogin){
        $conn=connectionFactory();
        $stmt=$conn->prepare("SELECT id FROM usuario WHERE login=:login");
        $stmt->execute([
            "login"=>$inputLogin
        ]);
        $row=$stmt->fetchAll(PDO::FETCH_ASSOC);

        if(count($row)>0){
            $token=generateRandomString();
            $stmt=$conn->prepare("UPDATE usuario SET token=:token,expira_token=DATEADD(now(), INTERVAL 3 HOUR) where id=:id");
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
    public static function validaTokenSenha($token,$inputUserId){
        $conn= connectionFactory();
        $stmt= $conn->prepare("SELECT token FROM usuario WHERE token=:token and id=:userId and expira_token<=now()");
        $stmt->execute([
            "token"=>$token,
            "userId"=>$inputUserId
        ]);
        $row= $stmt->fetchAll(PDO::FETCH_ASSOC);
        if(count($row)==0)
            return false;
        else
            return true;
    }
}

?>