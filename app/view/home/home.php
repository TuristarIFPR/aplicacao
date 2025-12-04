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

/* Títulos */
h1, h2, h3, h4 {
    font-weight: 600;
    color: #000000ff;
}

p, span, label {
    font-size: 16px;
    color: #000000ff;
}

/* Containers */
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
    color: #000000ff;
    text-align: center;
    margin-bottom: 40px;
}

.hero-padrao h1 {
    font-size: 38px;
    font-weight: 700;
    margin-bottom: 10px;
}

/* ===========================================================
   CARDS
   =========================================================== */

.card {
    border-radius: 12px;
    border: none;
    background: #ffffff;
    box-shadow: 0 4px 15px rgba(0,0,0,0.08);
}

/* Cards dos atalhos */
.quick-card {
    background: #ffffff;
    border-radius: 12px;
    padding: 25px;
    transition: 0.25s;
    border: 1px solid #000000ff;
}

.quick-card:hover {
    background: #f0f0f0;
    transform: translateY(-3px);
}

/* Título dos cards */
.quick-card h5 {
    font-weight: 600;
    margin-bottom: 8px;
    color: #272642ff;
}

.quick-card p {
    font-size: 15px;
    color: #000000ff;
}

/* Remover sublinhado */
a.no-decoration {
    text-decoration: none !important;
}

/* ===========================================================
   BOTÕES
   =========================================================== */

.btn {
    border-radius: 10px !important;
    padding: 10px 20px;
    font-size: 16px;
    transition: 0.2s;
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
</style>


<!-- HERO -->
<div class="container">

    <div class="card p-5 shadow-sm">

        <h3 class="text-center mb-4">Bem-vindo Adiministrador</h3>

        <div class="row text-center justify-content-center">

            <!-- USUÁRIOS -->
            <div class="col-md-3 mb-4">
                <a href="<?= BASEURL ?>/controller/UsuarioController.php?action=list" class="no-decoration">
                    <div class="quick-card h-100">
                        <h5>Usuários</h5>
                        <p>Gerenciar usuários</p>
                    </div>
                </a>
            </div>

            <!-- CIDADES -->
            <div class="col-md-3 mb-4">
                <a href="<?= BASEURL ?>/controller/CidadeController.php?action=list" class="no-decoration">
                    <div class="quick-card h-100">
                        <h5>Cidades</h5>
                        <p>Gerenciar cidades</p>
                    </div>
                </a>
            </div>

            <!-- PONTOS TURÍSTICOS -->
            <div class="col-md-3 mb-4">
                <a href="<?= BASEURL ?>/controller/PontoTuristicoController.php?action=list" class="no-decoration">
                    <div class="quick-card h-100">
                        <h5>Pontos Turísticos</h5>
                        <p>Gerenciar pontos turísticos</p>
                    </div>
                </a>
            </div>

            <!-- NOTÍCIAS -->
            <div class="col-md-3 mb-4">
                <a href="<?= BASEURL ?>/controller/NoticiasController.php?action=list" class="no-decoration">
                    <div class="quick-card h-100">
                        <h5>Notícias</h5>
                        <p>Gerenciar notícias</p>
                    </div>
                </a>
            </div>

        </div>

    </div>

</div>

<?php require_once(__DIR__ . "/../include/footer.php"); ?>
