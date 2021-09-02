<?php

class User{
    private $userId;
    private $login;
    private $pasword;

    public function __construct($arrayUser)
    {
        $this->userId=$arrayUser["id"];
        $this->login=$$arrayUser["login"];
        $this->password=$$arrayUser["password"];  
    }
    public function validaLogin($inputLogin,$inputSenha){
        //fazer consulta no banco para validar login
        
    }
}
?>