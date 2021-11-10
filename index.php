<?php
$pagina=$_GET["pagina"]??"";

if(!$pagina || $pagina=="principal")
    include_once "principal.php";
else if($pagina=="login")
    include_once "login.php";
else if ($pagina=="email")
    include_once "mail/envioEmail.php";
else if ($pagina=="cadastro")
    include_once "cadastro.php";
else    
    die("essa página não existe");
?>