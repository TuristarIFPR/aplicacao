<?php 

#Nome do arquivo: cidade/list.php
#Objetivo: interface para listagem das cidade do sistema

require_once(__DIR__ . "/../include/header.php");
require_once(__DIR__ . "/../include/menu.php");
?>

<h3 class="text-center">Cidades</h3>

<div class="container">
    <div class="row">
        <div class="col-3">
            <a class="btn btn-success" 
                href="<?= BASEURL ?>/controller/CidadeController.php?action=create">
                Inserir</a>
        </div>

        <div class="col-9">
            <?php require_once(__DIR__ . "/../include/msg.php"); ?>
        </div>
    </div>

    <div class="row" style="margin-top: 10px;">
        <div class="col-12">
            <table id="tabCidades" class='table table-striped table-bordered'>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Estado Sigla</th>
                        <th>Estado Nome</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($dados['cidades'] as $cid): ?>
                        <tr>
                            <td><?php echo $cid->getId(); ?></td>
                            <td><?= $cid->getNome(); ?></td>
                            <td><?= $cid->getEstadoSigla(); ?></td>
                            <td><?= $cid->getEstadoNome(); ?></td>
                            <td><a class="btn btn-primary" 
                                href="<?= BASEURL ?>/controller/CidadeController.php?action=edit&id=<?= $cid->getId() ?>">
                                Alterar</a> 
                            </td>
                            <td><a class="btn btn-danger" 
                                onclick="return confirm('Confirma a exclusão da cidade?');"
                                href="<?= BASEURL ?>/controller/CidadeController.php?action=delete&id=<?= $cid->getId() ?>">
                                Excluir</a> 
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php  
require_once(__DIR__ . "/../include/footer.php");
?>
