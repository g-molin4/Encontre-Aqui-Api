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
		<?php
        $nivelMinimo=2;
        include_once "Classes/Objeto.php";
        include_once "Classes/TiposObjeto.php";
        include_once "menu.php";
        if($_SESSION){
            if (isset($_GET["id"])){
                $objeto=Objeto::pegaObjeto($_GET["id"]);
                if(count($objeto)>0){
                    if($user->getNivel()==2){
                        if($user->getOrgaoId()==$objeto["orgaoId"]){
                        }
                        else{
                            echo "<script>alert('Você não tem acesso a esse objeto')</script>";
                            echo "<script>window.location.href='$principal'</script>"; 
                            die();
                        }
                    }
                    else if($user->getNivel()==3){}
                    else{
                        echo "<script>alert('Você não tem acesso a essa página')</script>";
                        echo "<script>window.location.href='$principal'</script>";
                        die();
                    }
                }
                else{
                    echo "<script>alert('Nenhum objeto encontrado')</script>";
                    echo "<script>window.location.href='principal'</script>";
                    die();
                }
                // var_dump($objeto);
            }
            if($_POST){
                extract($_POST);
                Objeto::alteraObjeto($descricao,$status,$tipoObjeto,trim($_GET["id"]));
                echo "<script>alert('Alterações concluídas')</script>";
                $objeto=Objeto::pegaObjeto($_GET["id"]);
            }
            
        }
        else{
            echo "<script>alert('Você não tem acesso a essa página')</script>";
            echo "<script>window.location.href='principal'</script>";
            die();
        }

        ?>

		<main class="container wrapper pt-5"  id="cadUsuario">
            <h1>Cadastre o objeto encontrado</h1>
            <form id="form-objeto" class="form-objeto mt-5" action="altera-objeto&id=<?=$_GET["id"]?>" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-lg-4 col-md-12 mb-5 tipo_objeto_cad">
                        <label for="tipoObjeto" class="form-label campo_obrigatorio">Tipo do Objeto</label>
                        <select class="form-select form-control" id="tipoObjeto" name="tipoObjeto" required <?=$user->getNivel()==1?"disabled":""?>>
                            <option value="" selected disabled>Selecione uma das opções</option>
                            <?php
                                $objetos=TiposObjeto::pegaTiposObjeto();
                                foreach($objetos as $tipoobjeto){
                                    ?>
                                    <option value="<?=$tipoobjeto["id"]?>" <?=$objeto["tipoObjetoId"]==$tipoobjeto["id"]?"selected":""?>><?=$tipoobjeto["tipo"]?></option>
                                    <?php
                                }
                            ?>
                        </select>
                    </div>
                    
                    <div class="col-lg-4 col-md-12 mb-5 descricao_cad">
                        <label for="descricao" class="form-label campo_obrigatorio">Status do Objeto</label>
                        <select class="form-select form-control" id="status" name="status" required>
                            <option value="" disabled>Selecione uma das opções</option>
                            <option value="Aguardando retirada" <?=$objeto["status"]=="Aguardando retirada"?"selected":""?>>Aguardando retirada</option>
                            <option value="Entregue" <?=$objeto["status"]=="Entregue"?"selected":""?>>Entregue ao Usuario</option>
                        </select>
                    </div>

                    <div class="col-lg-4 col-md-12 mb-5 imagemObjeto_cad">
                        <div class="form-group">
                            <label for="imagemObjeto" class="campo_obrigatorio">Insira a imagem do objeto</label>
                            <!--<input type="file" class="form-control-file mt-1" id="imagemObjeto" name="imagemObjeto" <?=$user->getNivel()==1?"disabled":""?> required> -->
                            <?php
                            $imagem=Objeto::pegaImagens($objeto["id"]);
                            ?>
                            <div>
                                <a href="<?=$imagem[0]["diretorio"]?>" class="mt-1">Veja a Imagem</a>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 mb-5 descricao_cad" id="descricao_cad">
                        <label for="descricao" class="form-label campo_obrigatorio">Descrição</label>
                        <textarea class="descricao form-control" id="descricao" name="descricao" placeholder="Descreva o objeto encontrado" rows="4" required <?=$user->getNivel()==1?"disabled":""?>><?=$objeto["descricao"]?></textarea>
                    </div>
                </div>
                <input type="hidden" id="orgaoId" name="orgaoId" value="<?=$user->getOrgaoId()?>"/>
                <input type="hidden" name="admId" value="<?=$user->getUserId()?>">

                <div class="btn_cad form-group mb-5 pb-5 col-lg-12">
                    <button type="submit" class="text-uppercase mr-3 botao">Enviar</button>
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
        
        <script>
            $("#but-voltar").click(function(){
                history.back()
            });
        </script>
	</body>
</html>
