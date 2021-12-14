<?php
$pagina = $_GET["pagina"] ?? "";

if (!$pagina || $pagina == "principal")
    include_once "principal.php";
else if ($pagina == "login")
    include_once "login.php";
else if ($pagina == "email")
    include_once "envioEmail.php";
else if ($pagina == "cadastro")
    include_once "cadastro-usuario.php";
else if ($pagina == "validacao")
    include_once "validacoes.php";
else if ($pagina == "cadastro-objeto")
    include_once "cadastro-objeto.php";
else if ($pagina == "logout")
    include_once "logout.php";
else if ($pagina == "list_objetos")
    include_once "objetos_cad.php";
else if ($pagina == "feedObjetos")
    include_once "feed-objetos.php";
else if ($pagina == "feedObjetosOrgao")
    include_once "feed-objetos-orgao.php";
else if ($pagina == "fale-conosco")
    include_once "fale-conosco.php";
else if ($pagina == "quem-somos")
    include_once "quem-somos.php";
else if ($pagina == "cadastro-orgao")
    include_once("cadastro-orgao.php");
else if ($pagina == "painel")
    include_once("painel.php");
else if ($pagina=="altera-objeto")
    include_once "altera-objeto.php";
else if ($pagina=="teste")
    include_once "teste.php";
else if ($pagina=="objeto")
    include_once "detalhe-objeto.php";
else
    die("essa página não existe");
