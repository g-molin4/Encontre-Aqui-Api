<?php


include_once "conn.php";
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
}

?>