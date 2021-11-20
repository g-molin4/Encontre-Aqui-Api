<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<!-- Required meta tags -->
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
		integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />

        <!-- Custom CSS -->
		<link rel="stylesheet" href="css/index.css" />

		<title>Quem Somos</title>
	</head>

	<body>
		<?php
			$nivelMinimo=0;
			include_once "menu.php";
        ?>
		<main class="container pt-5"  id="quemSomos">
            <h1 class="pt-3">Quem Somos</h1>
            
            <div class="descricao mt-5 mb-4">
                <p>O Encontre Aqui visa possibilitar de maneira fácil e colaborativa a localização dos pertencentes perdidos na região central do Rio de Janeiro.</p>
                <p>Com a utilização do "Encontre Aqui" será possível evitar que pessoas não consigam reaver seus pertences, evitar processos de retirada de segunda via de documentos, custos ligados a compra de novos bens e mitigar qualquer custo não mensurável que possam permear essas situações.</p>
                <p>Permitindo a busca de seus pertences a partir da região em que o objeto foi perdido.</p>
                <p>Clique no botão abaixo para ver os objetos perdidos na sua região.</p>
            </div>

            <button type="button" class="mt-4 botao">Visualizar Objetos</button>
		</main>

		<footer id="footerPage" class="fixed-bottom pt-3 pb-1 mt-5">
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

        <script type="text/javascript" src="js/jquery.mask.min.js"></script>
	</body>
</html>
