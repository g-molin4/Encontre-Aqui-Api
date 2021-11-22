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

        <style>
            .divValidacaoSenha{
                color: red;
                font-weight: bold;
                text-align: center;
                width: 100%;
            }
        </style>
	</head>

	<body>
		<?php
        $nivelMinimo=3;
        include "menu.php";
        include_once "Classes/Orgao.php";
        if($_POST){
            extract($_POST);
            $cnpj=str_replace("/","",str_replace("-","",str_replace(".","",$cnpj)));
            $telefone=str_replace("-","",str_replace(" ","",str_replace("(","",str_replace(")","",$telefone))));
            $cep=str_replace("-","",$cep);
            Orgao::cadastraOrgao($nome,$cnpj,$email,$telefone,$cep,$bairro,$endereco,$senha);
            echo '<script>alert("Orgão inserido")</script>';
        }
        ?>
		<main class="container wrapper pt-5"  id="cadUsuario">
            <h1>Cadastre seu Órgão</h1>
            <form id="form-orgao" class="form-orgao mt-5" action="cadastro-orgao" method="post">
                <div class="row">
                    <div class="col-lg-4 col-md-12 mb-5 nome_empresa_cad">
                        <label for="nomeEmpresa" class="form-label campo_obrigatorio">Nome da Empresa</label>
                        <input
                            type="text"
                            class="form-control"
                            id="nome"
                            name="nome"
                            placeholder="Digite o nome da empresa"
                            autofocus
                            required
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
                            required
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
                            required
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
                        />
                    </div>
                    <div class="col-lg-4 col-md-12 mb-5 cnpj_cad">
                        <label for="cnpj" class="form-label campo_obrigatorio">CNPJ</label>
                        <input
                            type="text"
                            class="cnpj form-control"
                            id="cnpj"
                            name="cnpj"
                            placeholder="00.000.000/0000-00"
                            required
                        />
                    </div>

                    <div class="col-lg-4 col-md-12 mb-5 telefoneCelular_cad">
                        <label for="telefoneCelular" class="form-label campo_obrigatorio">Telefone Celular</label>
                        <input
                            type="text"
                            class="telefone form-control"
                            id="telefone"
                            name="telefone"
                            maxlength="14"
                            placeholder="(00) 000000000"
                            required
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
                            required
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
                            required
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
                            required
                        />
                    </div>
                </div>
                <div class="divValidacaoSenha mb-2"></div>
                <div class="btn_cad form-group mb-5 pb-5 col-lg-12">
                    <button type="submit" class="text-uppercase mr-3 botao" id="botaoEnv">Enviar</button>
                    <!-- <button type="reset" class="text-uppercase ml-3 botao">Cancelar</button> -->
                    <button type="button" class="text-uppercase ml-3 botao" id="but-voltar">Voltar</button>
                </div>
            </form>
		</main>

		<footer id="footerPage" class="pt-3 pb-1">
			<p class="text-center mb-2">Projeto desenvolvido como Trabalho de Conclusão de Curso na Universidade Candido Mendes (UCAM) em 2021</p>
			<div class="text-center mt-3 mb-1 version">v. 202111112235</div>
		</footer>

		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
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
        
        <script>
            $("#but-voltar").click(function(){
                history.back()
            });
            $("#senha").keyup(function(){
               validaCriacaoSenha(); 
            });
            $("#confirmaSenha").keyup(function(){
               validaCriacaoSenha(); 
            });
        </script>
        <!-- <script type="text/javascript" src="js/usuario.js"></script> -->
	</body>
</html>
