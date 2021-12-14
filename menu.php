<?php
session_start();
include_once "Classes/Usuario.php";
$hora=date("H");
if($_SESSION){
    $user2=json_decode($_SESSION["usuario"]);
    $user=new Usuario(json_decode($_SESSION["usuario"]));
    if($user->getNivel()==1){
        $principal="principal";
    }
    else if ($user->getNivel()==2){
        $principal="cadastro-objeto";
    }
    $primeiroNome=explode(" ",$user->getNome())[0];
    $saudacao="Olá, $primeiroNome";
    if($user->getNivel()<$nivelMinimo){
        echo "<script>alert('Você não tem acesso a essa página')</script>";
        header("Location: $principal");
    }
}
else{
    if($nivelMinimo>=1){
        header("Location: principal");
    }
}
?>
<header class="container-fluid navPage">
    <!-- Navbar content -->
    <nav class="navbar navbar-dark" id="navbar">
        <div class="icon d-flex pl-2 pt-2 pb-2">
            <img class="mr-3" src="img/icone_branco.png" alt="Ícone Encontre Aqui" width="30" height="30" />
            <a class="d-flex align-items-center" href="principal">Encontre Aqui</a>
        </div>
        <div class="links d-flex align-items-center">
            <?php
            if($_SESSION){
                if($user->getNivel()==2)
                    $extraOrgao= "Orgao";
                else
                    $extraOrgao="";
            }
            ?>
            <?=$_SESSION?'<a class="mr-3" href="feedObjetos'.$extraOrgao.'">Objetos Perdidos</a>':'<a class="mr-3" href="login">Login</a>'?>
            <?php
            if($_SESSION){
                if($user->getNivel()>1){
                    ?>
                    <div class="dropdown drop-item mr-2">
                        <a class="nav-link dropdown-toggle drop-item-link pl-0" href="#" role="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"  id="dropdownMenuLink2">
                            Cadastrar
                        </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink2">
                                <?php
                                if($_SESSION){
                                    if($user->getNivel()==2){
                                ?>
                                        <a class="dropdown-item pl-4 icon_contraste" href="cadastro-objeto"><img src="img/book.svg" alt="icone Contraste" class="mr-2" />Objeto</a>
                                        <a class="dropdown-item pl-4 icon_contraste" href="cadastro"><img src="img/user-plus.svg" alt="icone Contraste" class="mr-2" />Usuario</a>
                                <?php
                                    }
                                    else if($user->getNivel()==3){
                                        ?>
                                        <a class="dropdown-item pl-4 icon_contraste" href="cadastro-orgao"><img src="img/shopping-bag.svg" alt="icone Contraste" class="mr-2" />Orgão</a>
                                        <a class="dropdown-item pl-4 icon_contraste" href="cadastro"><img src="img/user-plus.svg" alt="icone Contraste" class="mr-2" />Usuario</a>

                                        <?php
                                    }
                                }
                                ?>
                            </div>
                    </div>
                    <?php
                }

            }
            else{
            ?>
                <div class="dropdown drop-item mr-2">
                    <a class="nav-link dropdown-toggle drop-item-link pl-0" href="#" role="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"  id="dropdownMenuLink2">
                        Cadastrar
                    </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink2">
                            <a class="dropdown-item pl-4 icon_contraste" href="cadastro"><img src="img/user-plus.svg" alt="icone Contraste" class="mr-2" />Usuario</a>
                            <a class="dropdown-item pl-4 icon_contraste" href="cadastro-orgao"><img src="img/shopping-bag.svg" alt="icone Contraste" class="mr-2" />Orgão</a>
                        </div>
                </div>
            <?php
            }
            ?>
            <a class="mr-3" href="quem-somos">Quem Somos</a>
            <a class="mr-3" href="fale-conosco">Fale Conosco</a>
            
            <?php
            if($_SESSION){
                if($user->getNivel()>=3){
            ?>
                <a class="mr-3" href="painel">Painel</a>
            
            <?php
                }
            }
            ?>
            <!-- <div class="dropdown drop-item mr-3">
                <a class="nav-link dropdown-toggle drop-item-link pl-0" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Acessibilidade
                </a>
                
                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item pl-4 icon_contraste" href="#"><img src="img/contrast.svg" alt="icone Contraste" class="mr-2" />Contraste</a>
                </div>
            </div> -->
            <?=$_SESSION?'<div class="d-flex align-items-center mr-3">'.$saudacao.'</div>':""?>
            <?=$_SESSION?'<a class="mr-3"href="logout" title="Sair do sistema"><img src="img/log-out.svg" alt=""></a>':""?>
        </div>
    </nav>
</header>
