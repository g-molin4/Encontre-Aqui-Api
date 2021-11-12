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

		<title>Cadastre-se</title>   
        <script src="js/usuario.js"></script>
	</head>
    <?php
    include "Classes/Usuario.php";

    if($_POST){
        
    }
    ?>
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

		<main class="container pt-5"  id="cadUsuario">
            <h1>Cadastro de Usuário</h1>
            <form id="form-usuario" class="form-usuario mt-5">
                <div class="row">
                    <div class="col-lg-4 col-md-12 mb-5 nome_usuario_cad">
                        <label for="nome_usuario" class="form-label campo_obrigatorio">Nome Completo</label>
                        <input
                            type="text"
                            class="form-control"
                            id="nome_usuario"
                            name="nomeUsuario"
                            placeholder="Digite o seu nome completo"
                            autofocus
                        />
                    </div>

                    <!-- <div class="col-lg-4 col-md-12 mb-5 login_cad">
                        <label for="login" class="form-label campo_obrigatori o">Nome de Usuário</label>
                        <input
                            type="text"
                            class="form-control"
                            id="login_usuario"
                            name="loginUsuario"
                            placeholder="Digite o seu nome de usuário"
                        />
                    </div> -->

                    <div class="col-lg-4 col-md-12 mb-5 senha_cad">
                        <label for="senha" class="form-label campo_obrigatorio">Senha</label>
                        <input
                            type="password"
                            class="form-control"
                            id="senha"
                            name="senha"
                            placeholder="Digite sua senha"
                            onkeyup="validacaoCriacaoSenha()"
                        />
                    </div>
                    
                <div class="col-lg-4 col-md-12 mb-4 foto_objeto_cad">
                    <label for="foto_objeto" class="form-label campo_obrigatorio">Confirmação de Senha</label>
                    <input
                        type="password"
                        class="form-control"
                        id="confirmaSenha"
                        name="confirmaSenha"
                        placeholder="Digite a url da Foto do Objeto encontrado"
                    />
                </div>

                </div>
                <div class="row">
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

                    <div class="col-lg-4 col-md-12 mb-5 telefone_celular_cad">
                        <label for="telefone_celular" class="form-label campo_obrigatorio">Telefone Celular</label>
                        <input
                            type="text"
                            class="telefone_celular form-control"
                            id="telefone_celular"
                            name="telefoneCelular"
                            maxlength="14"
                            placeholder="(00) 000000000"
                        />
                    </div>

                    <div class="col-lg-4 col-md-12 mb-5 telefone_fixo_cad">
                        <label for="telefone_fixo" class="form-label">Telefone Fixo</label>
                        <input
                            type="text"
                            class="telefone_fixo form-control"
                            id="telefone_fixo"
                            name="telefoneFixo"
                            maxlength="13"
                            placeholder="(00) 000000000"
                        />
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-4 col-md-12 mb-5 objeto_cad">
                        <label for="objeto_encontrado" class="form-label campo_obrigatorio">Qual objeto você encontrou?</label>
                        <input
                            type="text"
                            class="form-control"
                            id="objeto_encontrado"
                            name="objetoEncontrado"
                            placeholder="Digite qual objeto foi encontrado"
                        />
                    </div>

                    <div class="col-lg-4 col-md-12 mb-4 local_referencia_cad">
                        <label for="local_referencia" class="form-label campo_obrigatorio">Local de Referência</label>
                        <input
                            type="text"
                            class="form-control"
                            id="local_referencia"
                            name="localReferencia"
                            placeholder="Digite o local que encontrou o objeto"
                        />
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

        <script type="text/javascript" src="js/jquery.mask.min.js"></script>
        <script type="text/javascript" src="js/mask.js"></script>
	</body>
</html>
