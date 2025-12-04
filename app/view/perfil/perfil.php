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
   HERO PADRÃO
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
   CARD
   =========================================================== */
.card {
    border-radius: 12px;
    border: none;
    background: #fff;
    box-shadow: 0 4px 15px rgba(0,0,0,0.08);
}

/* ===========================================================
   BOTÕES
   =========================================================== */
.btn {
    border-radius: 10px !important;
    padding: 10px 20px;
    font-size: 16px;
}
.btn-secondary {
    background-color: #272642ff;
    border-color: #272642ff;
    color: #fff;
}
.btn-secondary:hover {
    opacity: .9;
}
</style>

<!-- HERO -->
<div class="hero-padrao">
    <div class="container text-center">
        <h1>Meu Perfil</h1>
    </div>
</div>

<div class="container">

    <div class="card p-4 shadow-sm">

        <h3 class="text-center mb-4">Dados do Usuário</h3>

        <?php require_once(__DIR__ . "/../include/msg.php"); ?>

        <div class="row">

            <div class="col-md-6 mb-3">
                <span class="fw-bold d-block">Email:</span>
                <span><?= $dados['usuario']->getEmail() ?></span>
            </div>

            <div class="col-md-6 mb-3">
                <span class="fw-bold d-block">Nome Completo:</span>
                <span><?= $dados['usuario']->getNomeCompleto() ?></span>
            </div>

            <div class="col-md-6 mb-3">
                <span class="fw-bold d-block">Data de Nascimento:</span>
                <span><?= $dados['usuario']->getDataNasc() ?></span>
            </div>

            <div class="col-md-6 mb-3">
                <span class="fw-bold d-block">Telefone:</span>
                <span><?= $dados['usuario']->getTelefone() ?></span>
            </div>

        </div>

        <div class="mt-4 text-center">
            <a class="btn btn-secondary px-4"
               href="<?= BASEURL ?>/controller/UsuarioController.php?action=list">
                Voltar
            </a>
        </div>

    </div>

</div>

<?php  
require_once(__DIR__ . "/../include/footer.php");
?>
