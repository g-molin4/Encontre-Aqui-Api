<?php

function connectionFactory(){
    try{
        $conn = new PDO('mysql:host=sql651.main-hosting.eu;dbname=u626106768_EncontreAquiDb', "u626106768_encontreaquidb", "Eadb@2021");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    }
    catch(PDOException $e){
        echo 'ERROR: ' . $e->getMessage();
    }
}

?>