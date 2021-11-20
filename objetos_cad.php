<?php
include "Classes/Objeto.php";

$tipo=$_GET["a"]??"";
$id=$_GET["b"]??"";

$objetos= Objeto::objetosFeed($tipo,$id);
echo $objetos;
 
?>