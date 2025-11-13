<?php
require_once(__DIR__ . "/../include/header.php");
require_once(__DIR__ . "/../include/menu.php");
?>

<h3 class="text-center">
    <?php if($dados['id'] == 0) echo "Inserir"; else echo "Alterar"; ?> 
    Noticias
</h3>

<div class="container">
    
    <div class="row" style="margin-top: 10px;">
        
        <div class="col-6">
            <form id="frmPonto" method="POST" 
                action="<?= BASEURL ?>/controller/NoticiasController.php?action=save" >
                <div class="mb-3">
                    <label class="form-label" for="txtTitulo">Titulo:</label>
                    <input class="form-control" type="text" id="txtTitulo" name="titulo" 
                        maxlength="150" placeholder="Informe o titulo"
                        value="<?php echo (isset($dados["noticia"]) ? $dados["noticia"]->getTitulo() : ''); ?>" />
                </div>
                
                <div class="mb-3">
                    <label class="form-label" for="txtTexto">Texto:</label>
                    <input class="form-control" type="text" id="txtTexto" name="texto" 
                        maxlength="1000" placeholder="Informe o texto"
                        value="<?php echo (isset($dados["noticia"]) ? $dados["noticia"]->getTexto() : ''); ?>"/>
                </div>

               <div class="mb-3">
                    <label class="form-label" for="txtData">Data de publicação:</label>
                    <input class="form-control" type="date" id="txtData" name="data" 
                        maxlength="100" placeholder="Informe a data de publicação"
                        value="<?php echo (isset($dados["noticia"]) ? $dados["noticia"]->getData() : ''); ?>"/>
                </div>

 
                <input type="hidden" id="hddId" name="id" 
                    value="<?= $dados['id']; ?>" />

                <div class="mt-3">
                    <button type="submit" class="btn btn-success">Gravar</button>
                </div>
            </form>            
        </div>

        <div class="col-6">
            <?php require_once(__DIR__ . "/../include/msg.php"); ?>
        </div>
    </div>

    <div class="row" style="margin-top: 30px;">
        <div class="col-12">
        <a class="btn btn-secondary" 
                href="<?= BASEURL ?>/controller/NoticiasController.php?action=list">Voltar</a>
        </div>
    </div>
</div>

<?php  
require_once(__DIR__ . "/../include/footer.php");
?>