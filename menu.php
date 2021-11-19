<?php
session_start();

$hora=date("H");
$saudacao="Olá, {$_SESSION["nome"]}";
?>
<header class="container-fluid navPage">
    <!-- Navbar content -->
    <nav class="navbar navbar-dark" id="navbar">
        <div class="icon d-flex pl-2 pt-2 pb-2">
            <img class="mr-3" src="img/icone_branco.png" alt="Ícone Encontre Aqui" width="30" height="30" />
            <a class="d-flex align-items-center" href="principal">Encontre Aqui</a>
        </div>
        <div class="links d-flex align-items-center">
            <a class="mr-3" href="login">Login</a>
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
