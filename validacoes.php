<?php
include_once "conn.php";
include_once "Classes/Objeto.php";
include_once "Classes/Usuario.php";
include_once "Classes/Orgao.php";


function validaCPF($cpf) {
 
    // Extrai somente os números
    $cpf = preg_replace( '/[^0-9]/is', '', $cpf );
     
    // Verifica se foi informado todos os digitos corretamente
    if (strlen($cpf) != 11) {
        return false;
    }

    // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
    if (preg_match('/(\d)\1{10}/', $cpf)) {
        return false;
    }

    // Faz o calculo para validar o CPF
    for ($t = 9; $t < 11; $t++) {
        for ($d = 0, $c = 0; $c < $t; $c++) {
            $d += $cpf[$c] * (($t + 1) - $c);
        }
        $d = ((10 * $d) % 11) % 10;
        if ($cpf[$c] != $d) {
            return false;
        }
    }
    return true;

}
function validar_cnpj($cnpj){
	$cnpj = preg_replace('/[^0-9]/', '', (string) $cnpj);
	
	// Valida tamanho
	if (strlen($cnpj) != 14)
		return false;

	// Verifica se todos os digitos são iguais
	if (preg_match('/(\d)\1{13}/', $cnpj))
		return false;	

	// Valida primeiro dígito verificador
	for ($i = 0, $j = 5, $soma = 0; $i < 12; $i++)
	{
		$soma += $cnpj[$i] * $j;
		$j = ($j == 2) ? 9 : $j - 1;
	}

	$resto = $soma % 11;

	if ($cnpj[12] != ($resto < 2 ? 0 : 11 - $resto))
		return false;

	// Valida segundo dígito verificador
	for ($i = 0, $j = 6, $soma = 0; $i < 13; $i++)
	{
		$soma += $cnpj[$i] * $j;
		$j = ($j == 2) ? 9 : $j - 1;
	}

	$resto = $soma % 11;

	return $cnpj[13] == ($resto < 2 ? 0 : 11 - $resto);
}

function validaCpfRepetido($inputCpf){
    $inputCpf=str_replace("-","",str_replace(".","",$inputCpf));
    if(validaCPF($inputCpf)===true){
        if(Usuario::verificaCpfRepetido($inputCpf)===true)
            return "Este CPF já possui um cadastro";
        else
            return true;
    }
    else{
        return "Favor informar um CPF válido";
    }
}

function validaCnpjRepetido($cnpj){
    $cnpj=str_replace("/","",str_replace("-","",str_replace(".","",$cnpj)));
    if(validar_cnpj($cnpj)===true){
        if(Orgao::verificaCnpjRepetido($cnpj)===true)
        return "Este CNPJ já possui um cadastro";
        else
        return true;
    }
    else{
        return "Favor informar um CNPJ válido";
    }
}
function validaEmailRepetido($email){
    $email=trim($email);
    if(filter_var($email,FILTER_VALIDATE_EMAIL)!==false){
        if(Usuario::verificaEmailRepetido($email)===true)
            return "Este Email já possui um cadastro";
        else
            return true;
    }
    else{
        return "Favor informar um Email válido";
    }
}

function validaSenha($inputSenha){
    if(strlen($inputSenha)<8)
        return false;
    
    $caracteres= "abcdefghijklmnopqrstuvwxyz";
    $caracteresM= strtoupper("abcdefghijklmnopqrstuvwxyz");
    $caracteresE="!@#$%&*(){}?/\\<>[]+=_-|";
    $numeros="0123456789";

    $boolCaracter=false;
    $boolCaracterM=false;
    $boolCaracterE=false;
    $boolNumeros=false;

    for($i=0;$i<strlen($inputSenha);$i++){
        for($j=0;$j<strlen($caracteres);$j++)
            $caracteres[$j]==$inputSenha[$i]?$boolCaracter=true:"";
        for($j=0;$j<strlen($caracteresM);$j++)
            $caracteresM[$j]==$inputSenha[$i]?$boolCaracterM=true:"";
        for($j=0;$j<strlen($caracteresE);$j++)
            $caracteresE[$j]==$inputSenha[$i]?$boolCaracterE=true:"";
        for($j=0;$j<strlen($numeros);$j++)
            $numeros[$j]==$inputSenha[$i]?$boolNumeros=true:"";
    }

    if($boolCaracter && $boolCaracterE && $boolCaracterM && $boolNumeros)
        return true;
    else
        return false;
}

if(isset($_GET["a"])){
    if($_GET["a"]=="cpf"){
        $validacao=validaCpfRepetido($_GET["v"]);
        $validacao2=validaEmailRepetido($_GET["v2"]);
        if($validacao===true && $validacao2===true){
            echo '{"retorno":"valido"}';
        }
        else if ($validacao!==true && $validacao2===true){
            echo '{"erro":"'.$validacao.'"}';
        }
        else if($validacao===true && $validacao2!==true){
            echo '{"erro":"'.$validacao2.'"}';
        }
        else{
            echo '{"erro":"'.$validacao.' & '.$validacao2.'"}';
        }
        
    }
    else if($_GET["a"]=="cnpj"){
        $validacao=validaCnpjRepetido($_GET["v"]);
        $validacao2=validaEmailRepetido($_GET["v2"]);
        if($validacao===true && $validacao2===true){
            echo '{"retorno":"valido"}';
        }
        else if ($validacao!==true && $validacao2===true){
            echo '{"erro":"'.$validacao.'"}';
        }
        else if($validacao===true && $validacao2!==true){
            echo '{"erro":"'.$validacao2.'"}';
        }
        else{
            echo '{"erro":"'.$validacao.' & '.$validacao2.'"}';
        }
    }
}


?>