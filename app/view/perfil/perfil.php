<?php
#Nome do arquivo: perfil/perfil.php
#Objetivo: interface para perfil dos usuários do sistema

require_once(__DIR__ . "/../include/header.php");
require_once(__DIR__ . "/../include/menu.php");
?>

<h3 class="text-center">
    Perfil
</h3>

<div class="container">

 <div class="row mt-2">
        <div class="col-12 mb-2">
            <span class="fw-bold">Email:</span>
            <span><?= $dados['usuario']->getEmail() ?></span>
        </div>

    <div class="row mt-2">
        <div class="col-12 mb-2">
            <span class="fw-bold">Nome:</span>
            <span><?= $dados['usuario']->getNomeCompleto() ?></span>
        </div>

        <div class="col-12 mb-2">
            <span class="fw-bold">Data de Nascimento:</span>
            <span><?= $dados['usuario']->getDataNasc() ?></span>
        </div>

         <div class="row mt-2">
        <div class="col-12 mb-2">
            <span class="fw-bold">Telefone:</span>
            <span><?= $dados['usuario']->getTelefone() ?></span>
        </div>

    </div>

    
            <?php require_once(__DIR__ . "/../include/msg.php"); ?>
        </div>
    </div>

    <div class="row" style="margin-top: 30px;">
        <div class="col-12">
        <a class="btn btn-secondary" 
                href="<?= BASEURL ?>/controller/UsuarioController.php?action=list">Voltar</a>
        </div>
    </div>
</div>

<?php  
require_once(__DIR__ . "/../include/footer.php");
?>