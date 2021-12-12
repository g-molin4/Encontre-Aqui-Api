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

		<title>Objeto</title>
	</head>

	<body>
		<?php
        $nivelMinimo=1;
        include_once "Classes/Objeto.php";
        include_once "Classes/TiposObjeto.php";
        include_once "Classes/Orgao.php";
        include_once "menu.php";
        if($_SESSION){
            if (isset($_GET["id"])){
                $objeto=json_decode(json_encode(Objeto::pegaObjeto($_GET["id"])));
                if($objeto !==false){
                    $objeto->orgao=json_decode(json_encode(Orgao::pegaOrgao($objeto->orgaoId)));
                    $objeto->tipoObjeto=json_decode(json_encode(TiposObjeto::pegaTipoObjeto($objeto->tipoObjetoId)));
                }
                else{
                    echo "<script>alert('Nenhum objeto encontrado')</script>";
                    echo "<script>window.location.href='principal'</script>";
                    die();
                }
                // var_dump($objeto);
            } 
        }
        else{
            echo "<script>alert('Você não tem acesso a essa página')</script>";
            echo "<script>window.location.href='principal'</script>";
            die();
        }
        ?>

		<main class="container wrapper pt-5"  id="cadUsuario">
            <div class="w100">
                <h1>Dados de Entrega</h1>
                <?php
                if($_SESSION){
                    if($user->getNivel()==3){
                        ?>
                        <div style="align-items:flex-end;">
                            <a href="altera-objeto&id=<?=$objeto->id?>"><img src="img/tool.svg" title="Alterar dados de objeto"></a>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
            
            <div class="row">
                <div class="col-lg-4 col-md-12 mb-5 imagemObjeto_cad">
                    <div class="form-group">
                        <label for="CEP" class="">Nome:</label>
                        <!--<input type="file" class="form-control-file mt-1" id="imagemObjeto" name="imagemObjeto" <?=$user->getNivel()==1?"disabled":""?> required> -->
                        <div class="border text-center p-1">
                            <?=$objeto->orgao->nome?>
                        </div>
                        
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 mb-5 tipo_objeto_cad">
                    <label for="tipoObjeto" class="form-label ">Email:</label>
                    <div class="border text-center p-1"><?=$objeto->orgao->email?></div>
                </div>
    
                <div class="col-lg-4 col-md-12 mb-5 descricao_cad">
                    <label for="descricao" class="form-label ">Telefone:</label>
                    <div class="border text-center p-1"><?=$objeto->orgao->telefone?></div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-12 mb-5 imagemObjeto_cad">
                    <div class="form-group">
                        <label for="CEP" class="">CEP:</label>
                        <!--<input type="file" class="form-control-file mt-1" id="imagemObjeto" name="imagemObjeto" <?=$user->getNivel()==1?"disabled":""?> required> -->
                        <div class="border text-center p-1">
                            <?=$objeto->orgao->cep?>
                        </div>
                        
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 mb-5 tipo_objeto_cad">
                    <label for="tipoObjeto" class="form-label ">Bairro:</label>
                    <div class="border text-center p-1"><?=$objeto->orgao->bairro?></div>
                </div>
    
                <div class="col-lg-4 col-md-12 mb-5 descricao_cad">
                    <label for="descricao" class="form-label ">Endereço:</label>
                    <div class="border text-center p-1"><?=$objeto->orgao->endereco?></div>
                </div>
            </div>
            <h1>Dados do Objeto</h1>
            <div class="row mt-5">
                <div class="col-lg-4 col-md-12 mb-5 imagemObjeto_cad">
                    <div class="form-group">
                        <label for="imagemObjeto" class="">Imagem do objeto:</label>
                        <!--<input type="file" class="form-control-file mt-1" id="imagemObjeto" name="imagemObjeto" <?=$user->getNivel()==1?"disabled":""?> required> -->
                        <?php
                        $imagem=Objeto::pegaImagens($objeto->id);
                        ?>
                        <div class="border text-center p-1">
                            <a href="<?=$imagem["diretorio"]?>" target="_BLANK" class="mt-1">Veja a Imagem</a>
                        </div>
                        
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 mb-5 tipo_objeto_cad">
                    <label for="tipoObjeto" class="form-label ">Tipo do Objeto:</label>
                    <div class="border text-center p-1"><?=$objeto->tipoObjeto->tipo?></div>
                </div>
    
                <div class="col-lg-4 col-md-12 mb-5 descricao_cad">
                    <label for="descricao" class="form-label ">Status do Objeto:</label>
                    <div class="border text-center p-1"><?=$objeto->status?></div>
                </div>

            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 mb-5 descricao_cad" id="descricao_cad">
                    <label for="descricao" class="form-label ">Descrição:</label>
                    <textarea class="descricao form-control" id="descricao" name="descricao" placeholder="Descreva o objeto encontrado" rows="4" disabled><?=$objeto->descricao?></textarea>
                </div>
            </div>

            <div class="btn_cad form-group mb-5 pb-5 col-lg-12">
                <!-- <button type="submit" class="text-uppercase mr-3 botao">Enviar</button> -->
                <button type="button" class="text-uppercase ml-3 botao" id="but-voltar">Voltar</button>
            </div>
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
