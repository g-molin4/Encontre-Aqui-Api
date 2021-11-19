<?php
$pagina=$_GET["pagina"]??"";

if(!$pagina || $pagina=="principal")
    include_once "principal.php";
else if($pagina=="login")
    include_once "login.php";
else if ($pagina=="email")
    include_once "mail/envioEmail.php";
else if ($pagina=="cadastro")
    include_once "cadastro-usuario.php";
else if ($pagina=="validacao")
    include_once "validacoes.php";
else if ($pagina=="cadastro-objeto")
    include_once "cadastro-objeto.php";
else if ($pagina=="logout")
    include_once "logout.php";
else    
    die("essa página não existe");
?>