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

		<title>Fale Conosco</title>
	</head>

	<body>
        <?php
        $nivelMinimo=0;
        include "envioEmail.php";
        include_once "menu.php";
        if($_POST){
            extract($_POST);
            $destino=$email;
            $envioEmail=enviaEmail($mensagem,$email,$nome,$telefone);
            if($email){
                echo "<script>alert('Sua mensagem foi enviada, fique atento em seu email.')</script>";
                echo "<script>window.location.href='$principal'</script>";
            }else{
                echo "<script>alert('$envioEmail')</script>";
            }
        }
        ?>
		<main class="container pt-5"  id="faleConosco">
            <h1>Fale Conosco</h1>
            <form method="POST" action="email" enctype="text/plain" id="form-fale-conosco" class="form-fale-conosco mt-5">
                <div class="row">
                    <div class="col-lg-4 col-md-12 mb-5 nome_usuario_cad">
                        <label for="nome" class="form-label campo_obrigatorio">Nome Completo</label>
                        <input
                            type="text"
                            class="form-control"
                            id="nome"
                            name="nome"
                            placeholder="Digite o seu nome completo"
                            autofocus
                        />
                    </div>

                    <div class="col-lg-4 col-md-12 mb-5 email_cad">
                        <label for="email" class="form-label campo_obrigatorio">E-mail</label>
                        <input
                            type="email"
                            class="form-control"
                            id="email"
                            name="email"
                            placeholder="Digite o seu email"
                        />
                    </div>

                    <div class="col-lg-4 col-md-12 mb-5 telefoneCelular_cad">
                        <label for="telefoneCelular" class="form-label campo_obrigatorio">Telefone Celular</label>
                        <input
                            type="text"
                            class="telefone form-control"
                            id="telefone"
                            name="telefone"
                            maxlength="15"
                            placeholder="(00) 00000-0000"
                        />
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12 col-md-12 mb-5 objeto_cad">
                        <label for="objeto_encontrado" class="form-label campo_obrigatorio">Fale Aqui</label>
                        <textarea name="mensagem" id="mensagem" class="form-control" cols="20" rows="5" placeholder="Descreva abaixo o conteúdo do que você quer falar conosco"></textarea>
                    </div>
                </div>

                <div class="btn_cad form-group mb-5 col-lg-12">
                    <button type="submit" class="text-uppercase mr-3 botao">Enviar</button>
                    <button type="reset" class="text-uppercase ml-3 botao">Cancelar</button>
                </div>
            </form>
		</main>

		<footer id="footerPage" class="pt-3 pb-1 mt-5">
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
        <script type="text/javascript" src="js/usuario2.js"></script>
        <script type="text/javascript" src="js/mask.js"></script>
	</body>
</html>
