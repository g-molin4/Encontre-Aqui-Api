<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel de Informações</title>
    <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/index.css" />
    <!-- Styles -->
    <style>
        #chartdiv {
            width: 100%;
            height: 500px;
        }
    </style>
</head>

<body>
    <?php
    $nivelMinimo=3;
    include "menu.php";
    ?>
    <main class="container wrapper pt-5"  id="cadUsuario">
        <div class="fundo-div">
            <center>
                <div class='tableauPlaceholder' id='viz1637637916837' style='position: relative'><noscript><a href='#'><img alt='Painel de Informações ' src='https:&#47;&#47;public.tableau.com&#47;static&#47;images&#47;en&#47;encontreaquipainel&#47;Histria1&#47;1_rss.png' style='border: none' /></a></noscript><object class='tableauViz' style='display:none;'>
                        <param name='host_url' value='https%3A%2F%2Fpublic.tableau.com%2F' />
                        <param name='embed_code_version' value='3' />
                        <param name='site_root' value='' />
                        <param name='name' value='encontreaquipainel&#47;Histria1' />
                        <param name='tabs' value='no' />
                        <param name='toolbar' value='yes' />
                        <param name='static_image' value='https:&#47;&#47;public.tableau.com&#47;static&#47;images&#47;en&#47;encontreaquipainel&#47;Histria1&#47;1.png' />
                        <param name='animate_transition' value='yes' />
                        <param name='display_static_image' value='yes' />
                        <param name='display_spinner' value='yes' />
                        <param name='display_overlay' value='yes' />
                        <param name='display_count' value='yes' />
                        <param name='language' value='pt-BR' />
                        <param name='filter' value='publish=yes' />
                    </object></div>
                <script type='text/javascript'>
                    var divElement = document.getElementById('viz1637637916837');
                    var vizElement = divElement.getElementsByTagName('object')[0];
                    vizElement.style.width = '700px';
                    vizElement.style.height = '827px';
                    var scriptElement = document.createElement('script');
                    scriptElement.src = 'https://public.tableau.com/javascripts/api/viz_v1.js';
                    vizElement.parentNode.insertBefore(scriptElement, vizElement);
                </script>

            </center>
        </div>
    </main>

    <footer id="footerPage" class="pt-3 pb-1">
        <p class="text-center mb-2">Projeto desenvolvido como Trabalho de Conclusão de Curso na Universidade Candido Mendes (UCAM) em 2021</p>
        <div class="text-center mt-3 mb-1 version">v. 202111112235</div>
    </footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"></script>
</body>

</html>