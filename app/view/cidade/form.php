<?php
require_once(__DIR__ . "/../include/header.php");
require_once(__DIR__ . "/../include/menu.php");
?>

<h3 class="text-center">
    <?php if($dados['id'] == 0) echo "Inserir"; else echo "Alterar"; ?> 
    Cidade
</h3>

<div class="container">
    
    <div class="row" style="margin-top: 10px;">
        
        <div class="col-6">
            <form id="frmCidade" method="POST" 
                action="<?= BASEURL ?>/controller/CidadeController.php?action=save" >
                <div class="mb-3">
                    <label class="form-label" for="txtNome">Nome:</label>
                    <input class="form-control" type="text" id="txtNome" name="nome" 
                        maxlength="45" placeholder="Informe o nome"
                        value="<?php echo (isset($dados["cidade"]) ? $dados["cidade"]->getNome() : ''); ?>" />
                </div>
                
                <div class="mb-3">
                    <label class="form-label" for="txtEstadoSigla">Sigla:</label>
                    <input class="form-control" type="text" id="txtEstadoSigla" name="estadoSigla" 
                        maxlength="2" placeholder="Informe a Sigla do estado"
                        value="<?php echo (isset($dados["cidade"]) ? $dados["cidade"]->getEstadoSigla() : ''); ?>"/>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="txtEstadoNome">Estado:</label>
                    <input class="form-control" type="text" id="txtEstadoNome" name="estadoNome" 
                        maxlength="45" placeholder="Informe o estado"
                        value="<?php echo (isset($dados["cidade"]) ? $dados["cidade"]->getEstadoNome() : ''); ?>"/>
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
                href="<?= BASEURL ?>/controller/CidadeController.php?action=list">Voltar</a>
        </div>
    </div>
</div>

<?php  
require_once(__DIR__ . "/../include/footer.php");
?>