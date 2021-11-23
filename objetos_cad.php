<?php
include "Classes/Objeto.php";
session_start();
$usuario=json_decode($_SESSION["usuario"]);
$tipo=$_GET["a"]??"";
$id=$_GET["b"]??"";

$objetos= Objeto::objetosFeed($tipo,$id);
echo $objetos;
 
?>