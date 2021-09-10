<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teste</title>
</head>

<body>
<?php

include "Objeto.php";
if($_FILES){
    Objeto::insereImagem($_FILES["arquivo"],3,1);
}
?>
<form action="teste.php" method="post" enctype="multipart/form-data">
    <input type="text" name="a">
    <input type="file" name="arquivo" id="arquivo">
    <input type="submit" value="ENVIAR">
</form>
</body>
</html>