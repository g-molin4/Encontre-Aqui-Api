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
            <?=$_SESSION?'<div class="d-flex align-items-center m-auto">'.$saudacao.'</div>':""?>
        </div>
        <div class="links d-flex align-items-center">
            <?=$_SESSION?"":'<a class="mr-3" href="login">Login</a>'?>
            <?php
                if($_SESSION){
                    if($user->getNivel()>=2){
                        echo '<a class="mr-3" href="cadastro-objeto">Cadastrar Objeto</a>';
                    }
                }
            ?>
            <a class="mr-3" href="painel-cadastro">Painel Cadastro</a>
            <a class="mr-3" href="quem-somos">Quem Somos</a>
            <a class="mr-3" href="fale-conosco">Fale Conosco</a>
            <div class="dropdown drop-item mr-3">
                <a class="nav-link dropdown-toggle drop-item-link pl-0" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Acessibilidade
                </a>
                
                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item pl-4 icon_contraste" href="#"><img src="img/contrast.svg" alt="icone Contraste" class="mr-2" />Contraste</a>
                </div>
            </div>
            
            <?=$_SESSION?'<a class="mr-3"href="logout" title="Sair do sistema"><img src="img/log-out.svg" alt=""></a>':""?>
        </div>
    </nav>
</header>
