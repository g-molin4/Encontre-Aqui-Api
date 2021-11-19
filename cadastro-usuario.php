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

		<title>Cadastre-se</title>
	</head>
    <style>
        .divValidacaoSenha{
            color: red;
            font-weight: bold;
            text-align: center;
            width: 100%;
        }
    </style>
    <?php
    include "Classes/Usuario.php";
    if($_POST){
        extract($_POST);
        // die(json_encode($_POST)."<br> $cpf $telefone");
        $val=file_get_contents("http://localhost/Encontre-Aqui-Api/validacao&a=cpf&v={$_POST['cpf']}");
        $val=json_decode($val);
        $validaSenha=($_POST["senha"]==$_POST["confirmaSenha"] && !empty($_POST["senha"]) && !empty($_POST["confirmaSenha"]) )?true:false;
        if(isset($val->retorno)){
            $cpf=str_replace("-","",str_replace(".","",$cpf));
            $telefone=str_replace("-","",str_replace(" ","",str_replace("(","",str_replace(")","",$telefone))));
            $cep=str_replace("-","",$cep);
            // die("$cpf<br>$senha<br>$email<br>$cep<br>$bairro<br>$bairro<br>$telefone<br>$endereco<br>$nome");
            Usuario::cadastraUser($email,$senha,$cpf,$cep,$bairro,$telefone,$endereco,$nome);
            echo "<script>alert('Usuário Cadastrado')</script>";
        }
        else if(isset($val->erro)){
            echo "<script>alert('{$val->erro}')</script>";
        }
        else if($validaSenha===false){
            echo "<script>alert('As senhas devem ser iguais')</script>";

        }
        
    }
    ?>
	<body>
		<header class="container-fluid navPage">
			<!-- Navbar content -->
			<nav class="navbar navbar-dark" id="navbar">
				<div class="icon d-flex pl-2 pt-2 pb-2">
					<img class="mr-3" src="img/icone_branco.png" alt="Ícone Encontre Aqui" width="30" height="30" />
					<a class="d-flex align-items-center" href="index.html">Encontre Aqui</a>
				</div>

				<div class="links d-flex align-items-center">
                    <a class="mr-3" href="login.html">Login</a>
					<a class="mr-3" href="painel-cadastro.html">Painel Cadastro</a>
                    <a class="mr-3" href="quem-somos.html">Quem Somos</a>
					<a class="mr-3" href="fale-conosco.html">Fale Conosco</a>
					<div class="dropdown drop-item mr-3">
						<a class="nav-link dropdown-toggle drop-item-link pl-0" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Acessibilidade
						</a>
					  
						<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
						  <a class="dropdown-item pl-4 icon_contraste" href="#"><img src="img/contrast.svg" alt="icone Contraste" class="mr-2" />Contraste</a>
						</div>
					  </div>
				</div>
			</nav>
		</header>

		<main class="container wrapper pt-5"  id="cadUsuario">
            <h1>Você perdeu seu objeto? Cadastre-se</h1>
            <form id="form-usuario" class="form-usuario mt-5" method="post" action="cadastro">
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

                    <div class="col-lg-4 col-md-12 mb-5 senha_cad">
                        <label for="senha" class="form-label campo_obrigatorio">Senha</label>
                        <input
                            type="password"
                            class="form-control"
                            id="senha"
                            name="senha"
                            placeholder="Digite sua senha"
                            onkeyup="validaCriacaoSenha()"
                        />
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-4 col-md-12 mb-5 senha_cad">
                        <label for="senha" class="form-label campo_obrigatorio">Confirmação de Senha</label>
                        <input
                            type="password"
                            class="form-control"
                            id="confirmaSenha"
                            name="confirmaSenha"
                            placeholder="Digite a confirmação de senha"
                            onkeyup="validaCriacaoSenha()"
                        />
                    </div>

                    <div class="col-lg-4 col-md-12 mb-5 cpf_cad">
                        <label for="cpf" class="form-label campo_obrigatorio">CPF</label>
                        <input
                            type="text"
                            class="cpf form-control"
                            id="cpf"
                            name="cpf"
                            placeholder="000.000.000-00"
                        />
                    </div>

                    <div class="col-lg-4 col-md-12 mb-5 telefoneCelular_cad">
                        <label for="telefone" class="form-label campo_obrigatorio">Celular</label>
                        <input
                            type="text"
                            class="telefone form-control"
                            id="telefone"
                            name="telefone"
                            maxlength="15"
                            placeholder="(00) 000000-0000"
                        />
                    </div>

                </div>

                <div class="row">
                    <div class="col-lg-4 col-md-12 mb-5 campo_obrigatório">
                        <label for="cep" class="form-label campo_obrigatorio">CEP</label>
                        <input
                            type="text"
                            class="cep form-control"
                            id="cep"
                            name="cep"
                            maxlength="9"
                            placeholder="00000-000"
                        />
                    </div>
                    <div class="col-lg-4 col-md-12 mb-5 campo_obrigatório">
                        <label for="bairro" class="form-label campo_obrigatorio">Bairro</label>
                        <input
                            type="text"
                            class="bairro form-control"
                            id="bairro"
                            name="bairro"
                            placeholder="Digite seu bairro"
                        />
                    </div>
                    <div class="col-lg-4 col-md-12 mb-5 campo_obrigatório">
                        <label for="endereco" class="form-label campo_obrigatorio">Endereço</label>
                        <input
                            type="text"
                            class="endereco form-control"
                            id="endereco"
                            name="endereco"
                            placeholder="Digite seu endereco"
                        />
                    </div>
                </div>
                <div class="divValidacaoSenha mb-2"></div>
                <div class="btn_cad form-group mb-5 col-lg-12">
                    <button type="button" class="text-uppercase mr-3 botao" id="botaoEnvForm">Enviar</button>
                    <!-- <button type="reset" class="text-uppercase ml-3 botao">Cancelar</button> -->
                    <a href="painel-cadastro.html"><button type="button" class="text-uppercase ml-3 botao" onclick="history.back()">Voltar</button></a>
                </div>
            </form>
		</main>

		<footer id="footerPage" class="pt-3 pb-1">
			<p class="text-center mb-2">Projeto desenvolvido como Trabalho de Conclusão de Curso na Universidade Candido Mendes (UCAM) em 2021</p>
			<div class="text-center mt-3 mb-1 version">v. 202111112235</div>
		</footer>

		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<!-- <script src="https://code.jquery.com/jquery-3.1.1.min.js"
		integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
		crossorigin="anonymous"></script> -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
		integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
		crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
		integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
		crossorigin="anonymous"></script>

        <script type="text/javascript" src="js/jquery.mask.min.js"></script>
        <script type="text/javascript" src="js/mask.js"></script>
        <script type="text/javascript" src="js/usuario2.js"></script>
        <!-- <script type="text/javascript" src="js/usuario.js"></script> -->
	</body>
</html>