<?php 

require_once(__DIR__ . "/../include/header.php");
require_once(__DIR__ . "/../include/menu.php");
?>

<h3 class="text-center">Noticias</h3>

<div class="container">
    <div class="row">
        <div class="col-9">
            <?php require_once(__DIR__ . "/../include/msg.php"); ?>
        </div>
    </div>

    <div class="row" style="margin-top: 10px;">
        <div class="col-12">
            <table id="tabnoticias" class='table table-striped table-bordered'>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Titulo</th>
                        <th>Texto</th>
                        <th>Data</th>
                        <th>#</th>
                        <th>#</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($dados['noticias'] as $noti): ?>
                        <tr>
                            <td><?php echo $noti->getId(); ?></td>
                            <td><?= $noti->getTitulo(); ?></td>
                            <td><?= $noti->getTexto(); ?></td>
                            <td><?= $noti->getData(); ?></td>
                            
                            <td><a class="btn btn-primary" 
                                href="<?= BASEURL ?>/controller/NoticiasController.php?action=edit&id=<?= $noti->getId() ?>">
                                Alterar</a> 
                            </td>
                            <td><a class="btn btn-danger" 
                                onclick="return confirm('Confirma a exclusão da  noticia?');"
                                href="<?= BASEURL ?>/controller/NoticiasController.php?action=delete&id=<?= $noti->getId() ?>">
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
