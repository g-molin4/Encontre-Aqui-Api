<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teste2</title>
    <?php
    include "Usuario.php";
    ?>
</head>
<body>
    <?php
     if($_POST){
        Usuario::alteraUser($_POST["id"],$_POST["login"],$_POST["password"]);
        //  echo json_encode($usuario);
     }
    ?>
    <form action="/EncontreAqui/formulario" method="post">
        <input type="text" name="id" id="" placeholder="id">
        <input type="text" name="login" id="" placeholder="login">
        <input type="password" name="password" id="" placeholder="senha">
        <input type="submit" value="Enviar">
    </form>
</body>
</html>