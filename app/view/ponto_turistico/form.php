<?php
require_once(__DIR__ . "/../include/header.php");
require_once(__DIR__ . "/../include/menu.php");
?>

<h3 class="text-center">
    <?php if ($dados['id'] == 0) echo "Inserir";
    else echo "Alterar"; ?>
    Ponto Turistico
</h3>

<div class="container">

    <div class="row" style="margin-top: 10px;">

        <div class="col-6">
            <form id="frmPonto" method="POST"
                action="<?= BASEURL ?>/controller/PontoTuristicoController.php?action=save"
                enctype="multipart/form-data">
                <div class="mb-3">
                    <label class="form-label" for="txtNome">Nome:</label>
                    <input class="form-control" type="text" id="txtNome" name="nome"
                        maxlength="45" placeholder="Informe o nome"
                        value="<?php echo (isset($dados["ponto"]) ? $dados["ponto"]->getNome() : ''); ?>" />
                </div>

                <div class="mb-3">
                    <label for="formFileMultiple" class="form-label">Multiple files input example</label>
                    <input class="form-control" type="file" id="formFileMultiple" name="imagens" multiple>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="txtCidade">Cidade:</label>

                    <select class="form-select" aria-label="Default select" name="cidadeId">
                        <?php foreach ($dados["cidades"] as $cidade): ?>

                            <option <?php echo (isset($dados["ponto"]) && $dados["ponto"]->getCidade()->getId() == $cidade->getId() ? "selected" : ''); ?> value="<?= $cidade->getId() ?>"><?= $cidade->getNome() ?></option>

                        <?php endforeach; ?>
                    </select>

                </div>

                <div class="mb-3">
                    <label class="form-label" for="txtEndereco">Endereco:</label>
                    <input class="form-control" type="text" id="txtEndereco" name="endereco"
                        maxlength="512" placeholder="Informe o endereco do ponto turistico"
                        value="<?php echo (isset($dados["ponto"]) ? $dados["ponto"]->getEndereco() : ''); ?>" />
                </div>

                <div class="mb-3">
                    <label class="form-label" for="txtDescricao">Descrição:</label>
                    <input class="form-control" type="text" id="txtDescricao" name="descricao"
                        maxlength="512" placeholder="Informe a descricao"
                        value="<?php echo (isset($dados["ponto"]) ? $dados["ponto"]->getDescricao() : ''); ?>" />
                </div>

                <!-- Imagem -->


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
                href="<?= BASEURL ?>/controller/PontoTuristicoController.php?action=list">Voltar</a>
        </div>
    </div>
</div>

<?php
require_once(__DIR__ . "/../include/footer.php");
?>