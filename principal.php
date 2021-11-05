<!DOCTYPE html>
<html lang="pt-br">
	<?php
	// server should keep session data for AT LEAST 1 hour
	ini_set('session.gc_maxlifetime', 60);

	// each client should remember their session id for EXACTLY 1 hour
	session_set_cookie_params(60);

	session_start(); // ready to go!
	echo $_SESSION["email"];
	
	?>
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

		<title>Encontre Aqui</title>
	</head>
	<body>
		<header class="container-fluid navPage">
			<!-- Navbar content -->
			<nav class="navbar navbar-dark" id="navbar">
				<div class="icon d-flex pl-2 pt-2 pb-2">
					<img class="mr-3" src="img/icone.png" alt="Ícone Encontre Aqui" width="30" height="30" />
					<a class="d-flex align-items-center" href="index.html">Encontre Aqui</a>
				</div>

                <div class="dropdown drop-item mr-3">
                    <a class="nav-link dropdown-toggle drop-item-link pl-0" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Acessibilidade
                    </a>
                  
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                      <a class="dropdown-item pl-4 icon_contraste" href="#"><img src="img/contrast.svg" alt="icone Contraste" class="mr-2" />Contraste</a>
                    </div>
                  </div>

				<div class="links">
                    <a class="mr-3" href="login.html">Login</a>
					<a class="mr-3" href="#">Cadastre-se</a>
                    <a class="mr-3" href="#">Saiba Mais</a>
					<a class="mr-3" href="#">Fale Conosco</a>
				</div>
			</nav>
		</header>

		<main class="container-fluid"  id="landingPage">
			<div class="row mt-5 pb-5">
				<div class="col-6">
					<div class="col-12 pl-5 mt-2">
						<h1 class="titulo_principal">Perdeu seu objeto pessoal? <br> Encontre aqui !</h1>
						<h6 class="titulo_complementar mt-4">Nossa plataforma conecta o objeto perdido com seu respectivo dono. <br>Disponibilizamos uma lista de objetos que já foram encontrados. <br> Você tem até 3 meses para retirar no local indicado.</h6>
					</div>
					<div class="col-12 pl-5">
						<button type="button" class="mt-4 botao">Encontre aqui</button>
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
						<h1 class="titulo_principal">Achou um objeto pessoal <br> e quer devolver? <br> Podemos te ajudar !</h1>
						<h6 class="titulo_complementar mt-4">Nossa plataforma conecta o objeto perdido com seu respectivo dono. <br> Disponibilizamos uma lista de objetos que já foram encontrados pelos usuários <br> e disponibilizamos qual olocal de entrega para a retirada. O Usuário que perdeu <br> o objeto tem até 3 meses para retirar no local indicado.</h6>
					</div>
					<div class="col-12 pl-5">
						<button type="button" class="mt-4 botao"><a href="cadastro-usuario.html">Saiba mais</a></button>
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
