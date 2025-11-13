<?php 

require_once(__DIR__ . "/../include/header.php");
require_once(__DIR__ . "/../include/menu.php");
?>

<h3 class="text-center">Pontos Turisticos</h3>

<div class="container">
    <div class="row">
        <div class="col-9">
            <?php require_once(__DIR__ . "/../include/msg.php"); ?>
        </div>
    </div>

    <div class="row" style="margin-top: 10px;">
        <div class="col-12">
            <table id="tabpontos_turisticos" class='table table-striped table-bordered'>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                     <th>Imagem</th>

                        <th>Endereco</th>
                        <th>Descricao</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <!-- lista de pontos turisticos -->
                    <?php foreach($dados['pontos'] as $pont): ?>
                        <tr>
                            <td><?php echo $pont->getId(); ?></td>
                            <td><?= $pont->getNome(); ?></td>
                            <td><img src="<?= BASEURL. "/../../publica/". $pont->getImagem(); ?>" width="100" alt=""></td>
                            <td><?= $pont->getEndereco(); ?></td>
                            <td><?= $pont->getDescricao(); ?></td>
                            
                       <!-- imagem -->

                            <td><a class="btn btn-primary" 
                                href="<?= BASEURL ?>/controller/PontoTuristicoController.php?action=edit&id=<?= $pont->getId() ?>">
                                Alterar</a> 
                            </td>
                            <td><a class="btn btn-danger" 
                                onclick="return confirm('Confirma a exclusão do ponto turistico?');"
                                href="<?= BASEURL ?>/controller/PontoTuristicoController.php?action=delete&id=<?= $pont->getId() ?>">
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
