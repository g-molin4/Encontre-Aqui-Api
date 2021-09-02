<?php

function connectionFactory(){
    try{
        $conn = new PDO('mysql:host=localhost;dbname=test', "gabriel", "Vendas@12");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    }
    catch(PDOException $e){
        echo 'ERROR: ' . $e->getMessage();
    }
}

?>