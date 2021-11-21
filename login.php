<?php
define("__DIR__","localhost/Encontre-Aqui-Api");
include "Classes/Usuario.php";
$nivelMinimo=0;
?>
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

		<title>Login</title>
	</head>
   
	<body>
        <?php include "menu.php" ?>
        <?php if($_SESSION) header("Location: $principal");?>
        <?php
        if($_POST){
            // session_start();
            if(!empty($_POST["email"]) && !empty($_POST["senha"])){
                $row=Usuario::validaLogin($_POST["email"],$_POST["senha"]);
                if( $row!== false){
                    $_SESSION["usuario"]=json_encode($row);
                    // echo "<script> alert('".$_SESSION["email"]."')</script>";
                    if($row["nivel"]==1)
                        header("Location: feed");
                    else if ($row["nivel"]==2)
                        header("Location: cadastro-objeto");
                    else if ($row["nivel"]==3)
                        header("Location: cadastro-objeto");
                }
                else{
                    echo "<script>alert('Email ou senha inválidos')</script>";
                }
            }
            else
                echo "<script>alert('Os campos de Email e Senha devem estar preenchidos')</script>";
        }
        ?>
        <main class="container">
            <div class="row d-flex justify-content-center pt-5 pb-3">
                <div class="card mt-4 mb-1" style="width: 24rem;">
                    <div class="card-body">
                        <h1 class="text-center mt-2 mb-5">Login</h1>
                        <form id="form-login" class="form-login" action="login" method="POST">
                            <div class="col-lg-12 col-md-12 mb-4 login_cad">
                                <label for="login" class="form-label campo_obrigatorio">Nome de Usuário</label>
                                <input
                                    type="email"
                                    class="form-control"
                                    id="email"
                                    name="email"
                                    placeholder="Digite o seu nome de usuário"
                                    required
                                />
                            </div>
        
                            <div class="col-lg-12 col-md-12 mb-4 senha_cad">
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

                            <div class="btn_cad form-group mt-5 mb-4 col-lg-12">
                                <button type="submit" class="text-uppercase botao btn_login">Entrar</button>
                            </div>
                        </form>
                    </div>
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
