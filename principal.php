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
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
            crossorigin="anonymous"></script>

		<!-- Custom CSS -->
		<link rel="stylesheet" href="css/index.css" />

		<title>Encontre Aqui</title>
	</head>
	<body>
		<?php
		$nivelMinimo=0;
		include "menu.php";
		// echo $_SESSION["usuario"]??"";
		?>

		<main class="container-fluid"  id="landingPage">
			<div class="row mt-5 pb-5">
				<div class="col-6">
					<div class="col-12 pl-5 mt-2">
						<h1 class="titulo_principal">Perdeu seu objeto pessoal? <br> Encontre aqui !</h1>
						<h6 class="titulo_complementar mt-4">Nossa plataforma conecta o objeto perdido com seu respectivo dono. <br>Disponibilizamos uma lista de objetos que já foram encontrados. <br> Você tem até 3 meses para retirar no local indicado. Você deve estar com um documento com foto em mãos</h6>
					</div>
					<div class="col-12 pl-5">
						<button type="button" class="mt-4 botao" id="botao-principal">Encontre aqui</button>
					</div>
				</div>
				
				<div class="col-6">
					<img src="img/objeto_entregue.jpg" alt="Achados e Perdidos" class="img_entrega_objeto" />
				</div>
			</div>

			<hr class="ml-0">

			<div class="row pt-5 pb-5">
				<div class="col-6">
					<div class="col-12 pl-5 mt-2">
						<h1 class="titulo_principal">Você tem uma empresa <br> e quer ajudar as pessoas? <br> Podemos te ajudar !</h1>
						<h6 class="titulo_complementar mt-4">O Encontre aqui visa possibilitar de maneira fácil e colaborativa a localização<br> dos  pertences perdidos inicialmente na região central do Rio de Janeiro. <br> Cadastre sua empresa e ajude as pessoas a encontrar seus bens perdidos.
						</h6>
					</div>
				</div>
				
				<div class="col-6">
					<img src="img/objeto_entregue.jpg" alt="Achados e Perdidos" class="img_entrega_objeto" />
				</div>
			</div>
		</main>

		<footer id="footerPage" class="pt-3 pb-1 mt-5">
			<p class="text-center mb-2">Projeto desenvolvido como Trabalho de Conclusão de Curso na Universidade Candido Mendes (UCAM) em 2021</p>
			<div class="text-center mt-3 mb-1 version">v. 202110172342</div>
		</footer>
		<script>
			$("#botao-principal").click(function(){
				window.location.href='<?=$_SESSION?"feedObjetos":"login"?>'
			});
		</script>
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
