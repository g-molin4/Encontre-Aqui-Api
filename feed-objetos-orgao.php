<!DOCTYPE html>
<html lang="pt-br">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/index.css" />

    <title>Objetos Perdidos</title>

    <style>
        .listaObjetos {
            min-height: 300px;
            display: flex !important;
            align-items: flex-start !important;
            list-style: none;
            border: 5px solid black;
            border-radius: 14px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
    </style>
</head>

<?php
$nivelMinimo = 2;
include "menu.php";
?>

<body>
    <main class="container wrapper pt-3" id="listaObjetosPerdidos">

        <h1 class="titulo_cad_login mt-5 mb-3 pb-5">Feed dos Objetos Perdidos do Orgão</h1>

        <div id="listaObjetos" class="row">
        </div>
    </main>

    <footer id="footerPage" class="mt-4 pt-3 pb-1">
        <p class="text-center mb-2">Projeto desenvolvido como Trabalho de Conclusão de Curso na Universidade Candido Mendes (UCAM) em 2021</p>
        <div class="text-center mt-3 mb-1 version">v. 202111112235</div>
    </footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- <script src="https://code.jquery.com/jquery-3.1.1.min.js"
		integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
		crossorigin="anonymous"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="js/jquery.mask.min.js"></script>
    <script type="text/javascript" src="js/mask.js"></script>
    <script type="text/javascript" src="js/usuario2.js"></script>
    <!-- <script type="text/javascript" src="js/usuario.js"></script> -->

    <script>
        $(document).ready(function($) {
            let urlJson = window.location.origin + "/encontreaqui/list_objetos&a=o&b=<?=$user->getOrgaoId()?>";
            // let urlJson = window.location.origin + "/list_objetos";
            console.log(urlJson);

            $.getJSON(urlJson, function(response) {

                if (response != null || response != undefined) {
                    var getResult = response;
                    console.log(getResult);
                    resultList = getResult["result"];
                    console.log(resultList);
                    // var indice0 = resultList[0];
                    // console.log(indice0);

                    // var cdMunicipio = indice0.cdMunicipio;
                    // var cdUf = indice0.cdUf;
                    // var deMunicipio = indice0.deMunicipio;

                    var arrayListaObjetos = getResult.map(function(result) {
                        return "<ul id='" + result.id + "'" + "class='listaObjetos mb-4 pl-5 pt-4 pr-5 pb-4'>" +
                            "<li class='mt-1 mb-5'> IMAGEM: " + "EM DESENVOLVIMENTO" + "</li>" +
                            "<li class='mt-1 mb-1 objeto'> Tipo do Objeto: " + result.tipoObjetoId + "</li>" +
                            "<li class='mt-1 mb-1'> Descrição: " + result.descricao + "</li>" +
                            "<li class='mt-1 mb-1'> Orgão onde o objeto está localizado: " + result.orgaoId + "</li>" +
                            "<li class='mt-1 mb-1'> Status: " + result.status + "</li>" +
                            "</ul>";
                    });

                    let listaObjetos = document.getElementById("listaObjetos");

                    arrayListaObjetos.map(arrayListaObjetos => {
                        var divListaObjetos = document.createElement("div");
                        divListaObjetos.classList.add("col-6");
                        listaObjetos.appendChild(divListaObjetos);
                        divListaObjetos.innerHTML = arrayListaObjetos;
                    })
                }
            });
        });
        console.log('ok2');
    </script>
</body>

</html>