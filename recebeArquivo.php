<?php


$User= new stdClass();

$User->id=297988;
$User->nome="Gabriel Molina";
$User->tipoArquivo="RG";

if($_FILES){
    //fazer verificação no banco de dados para nome de arquivo
    $achou=is_dir("C:\\xampp\\htdocs\\EncontreAqui\\EncontreAquiAnexos\\{$User->id}");

    if($achou===false){
        mkdir("C:\\xampp\\htdocs\\EncontreAqui\\EncontreAquiAnexos\\{$User->id}");
    }
    else{
        move_uploaded_file($_FILES["arquivo"]["tmp_name"],"C:\\xampp\\htdocs\\EncontreAqui\\EncontreAquiAnexos\\{$User->id}\\{$_FILES["arquivo"]["name"]}");
    }
}

var_dump($achou);
?> 