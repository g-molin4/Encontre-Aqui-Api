<?php
$pagina=$_GET["pagina"];

if($pagina=="formulario" || !$pagina)
    include_once "formLogin.php";
else if ($pagina=="objetos")
    include_once "teste.php";
else    
    die("essa página não existe");
?>