<?php
$pagina=$_GET["pagina"];

if($pagina=="formulario" || !$pagina)
    include_once "formLogin.php";
else if ($pagina=="objetos")
    include_once "teste.php";
else if ($pagina=="email")
    include_once "mail/envioEmail.php";
else    
    die("essa página não existe");
?>