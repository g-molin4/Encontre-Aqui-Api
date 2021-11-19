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
	</head>

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
            <h1>Cadastre o objeto encontrado</h1>
            <form id="form-objeto" class="form-objeto mt-5">
                <div class="row">
                    <div class="col-lg-4 col-md-12 mb-5 nome_objeto_cad">
                        <label for="nomeObjeto" class="form-label campo_obrigatorio">Titulo</label>
                        <input
                            type="text"
                            class="form-control"
                            id="nomeObjeto"
                            name="nomeObjeto"
                            placeholder="Digite o nome do objeto encontrado"
                            autofocus
                        />
                    </div>

                    <div class="col-lg-4 col-md-12 mb-5 tipo_objeto_cad">
                        <label for="tipoObjeto" class="form-label campo_obrigatorio">Tipo do Objeto</label>
                        <select class="form-select form-control" id="tipoObjeto" name="tipoObjeto">
                            <option value="" selected disabled>Selecione uma das opções</option>
                            <option value="acessório">Acessório</option>
                            <option value="documento">Documento</option>
                            <option value="foneOuvido">Fone de Ouvido</option>
                            <option value="livro">Livro</option>
                            <option value="mochila">Mochila</option>
                            <option value="roupa">Roupa</option>
                            <option value="outros">Outros</option>
                        </select>
                    </div>

                    <div class="col-lg-4 col-md-12 mb-5 imagemObjeto_cad">
                        <div class="form-group">
                            <label for="imagemObjeto" class="campo_obrigatorio">Insira a imagem do objeto</label>
                            <input type="file" class="form-control-file mt-1" id="imagemObjeto" name="imagemObjeto
                            imagemObjeto">
                          </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 mb-5 descricao_cad" id="descricao_cad">
                        <label for="descricao" class="form-label campo_obrigatorio">Descrição</label>
                        <textarea class="descricao form-control" id="descricao" name="descricao" placeholder="Descreva o objeto encontrado" rows="4"></textarea>
                    </div>
                </div>

                <!-- <div class="row">
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



                    <div class="col-lg-4 col-md-12 mb-5 foto_objeto_cad">
                        <label for="foto_objeto" class="form-label campo_obrigatorio">Url da foto do Objeto Encontrado</label>
                        <input
                            type="text"
                            class="form-control"
                            id="foto_objeto"
                            name="fotoObjeto"
                            placeholder="Digite a url da Foto do Objeto encontrado"
                        />
                    </div>
                </div> -->
            </div>


                <input type="hidden" id="orgaoId" name="orgaoId"/>

                <div class="btn_cad form-group mb-5 pb-5 col-lg-12">
                    <button type="submit" class="text-uppercase mr-3 botao">Enviar</button>
                    <button type="reset" class="text-uppercase ml-3 botao">Cancelar</button>
                    <a href="painel-cadastro.html"><button type="button" class="text-uppercase ml-3 botao">Voltar</button></a>
                </div>
            </form>
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

        <script type="text/javascript" src="js/jquery.mask.min.js"></script>
        <script type="text/javascript" src="js/mask.js"></script>
        <script type="text/javascript" src="js/objeto.js"></script>
        <!-- <script type="text/javascript" src="js/usuario.js"></script> -->
	</body>
</html>
