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
else if ($pagina=="list_objetos")
    include_once "objetos_cad.php";
else if($pagina=="fale-conosco")
    include_once "fale-conosco.php";
else if($pagina=="quem-somos")
    include_once "quem-somos.php";
else if($pagina=="cadastro-orgao")
    include_once("cadastro-orgao.php");
else    
    die("essa página não existe");
?>