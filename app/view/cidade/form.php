<?php
require_once(__DIR__ . "/../include/header.php");
require_once(__DIR__ . "/../include/menu.php");
?>

<style>
/* ===========================================================
   ESTILO GLOBAL
   =========================================================== */
body {
    font-family: 'Poppins', sans-serif;
    background-color: #d8dce3ff;
    margin: 0;
}

h1, h2, h3, h4 {
    font-weight: 600;
    color: #000;
}

p, span, label {
    font-size: 16px;
    color: #000;
}

.container {
    padding-top: 40px;
    padding-bottom: 40px;
}

/* ===========================================================
   HERO
   =========================================================== */
.hero-padrao {
    background: linear-gradient(
        rgba(0,0,0,0.45),
        rgba(0,0,0,0.45)
    ),
    url('../img/travel/home.jpg') center/cover no-repeat;
    padding: 110px 0;
    color: #000;
    text-align: center;
    margin-bottom: 40px;
}

.hero-padrao h1 {
    font-size: 38px;
    font-weight: 700;
}

/* ===========================================================
   CARD E FORMULARIO
   =========================================================== */
.card {
    border-radius: 12px;
    border: none;
    box-shadow: 0 4px 15px rgba(0,0,0,0.08);
    background: #fff;
}

.form-control {
    padding: 12px;
    border-radius: 10px;
    border: 1px solid #000;
}

.form-control:focus {
    border-color: #272642ff;
    box-shadow: 0 0 0 0.2rem rgba(39, 38, 66, 0.25);
}

.form-label {
    font-weight: 500;
    color: #000;
}

/* BOTÕES */
.btn {
    border-radius: 10px !important;
    padding: 10px 20px;
    font-size: 16px;
}

.btn-success {
    background-color: #272642ff;
    border-color: #272642ff;
    color: white;
}

.btn-success:hover {
    background-color: #272642ff;
    opacity: .9;
}

.btn-secondary {
    border-radius: 10px !important;
}
</style>

<!-- HERO -->
<div class="hero-padrao">
    <div class="container text-center">
        <h1><?= ($dados['id'] == 0 ? "Cadastrar Cidade" : "Editar Cidade") ?></h1>
    </div>
</div>

<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-7">

            <div class="card shadow-sm p-4">

                <h4 class="text-center mb-4">
                    <?= ($dados['id'] == 0 ? "Nova Cidade" : "Alterar Dados da Cidade") ?>
                </h4>

                <?php require_once(__DIR__ . "/../include/msg.php"); ?>

                <form method="POST"
                      action="<?= BASEURL ?>/controller/CidadeController.php?action=save">

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Nome:</label>
                        <input class="form-control" type="text" name="nome"
                               maxlength="45" placeholder="Informe o nome"
                               value="<?= isset($dados["cidade"]) ? $dados["cidade"]->getNome() : '' ?>">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Sigla:</label>
                        <input class="form-control" type="text" name="estadoSigla"
                               maxlength="2" placeholder="Informe a sigla"
                               value="<?= isset($dados["cidade"]) ? $dados["cidade"]->getEstadoSigla() : '' ?>">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Estado:</label>
                        <input class="form-control" type="text" name="estadoNome"
                               maxlength="45" placeholder="Informe o estado"
                               value="<?= isset($dados["cidade"]) ? $dados["cidade"]->getEstadoNome() : '' ?>">
                    </div>

                    <input type="hidden" name="id" value="<?= $dados['id']; ?>">

                    <button type="submit" class="btn btn-success w-100 mt-3">Gravar</button>

                    <a href="<?= BASEURL ?>/controller/CidadeController.php?action=list"
                       class="btn btn-secondary w-100 mt-3">Voltar</a>

                </form>

            </div>

        </div>
    </div>

</div>

<?php require_once(__DIR__ . "/../include/footer.php"); ?>
