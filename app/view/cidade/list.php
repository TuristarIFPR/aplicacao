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
   CARD
   =========================================================== */
.card {
    border-radius: 12px;
    background: #fff;
    border: none;
    box-shadow: 0 4px 15px rgba(0,0,0,0.08);
}

/* ===========================================================
   TABELA
   =========================================================== */
.table {
    background: white !important;
}

.table thead {
    background: #272642ff !important;
    color: white !important;
}

.table td, .table th {
    vertical-align: middle;
    color: #000;
}

.btn-primary {
    background-color: #272642ff;
    border-color: #272642ff;
}

.btn-primary:hover {
    opacity: .9;
}

.btn-danger {
    border-radius: 8px !important;
}
</style>

<!-- HERO -->
<div class="hero-padrao">
    <div class="container text-center">
        <h1>Cidades Cadastradas</h1>
    </div>
</div>

<div class="container">

    <?php require_once(__DIR__ . "/../include/msg.php"); ?>

    <div class="card shadow-sm p-4">

        <h4 class="mb-4">Lista de Cidades</h4>

        <table id="tabCidades" class="table table-hover table-bordered text-center align-middle">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Estado Sigla</th>
                    <th>Estado Nome</th>
                    <th>Alterar</th>
                    <th>Excluir</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach($dados['cidades'] as $cid): ?>
                    <tr>
                        <td><?= $cid->getId(); ?></td>
                        <td class="fw-semibold"><?= $cid->getNome(); ?></td>
                        <td><?= $cid->getEstadoSigla(); ?></td>
                        <td><?= $cid->getEstadoNome(); ?></td>

                        <td>
                            <a class="btn btn-primary btn-sm"
                               href="<?= BASEURL ?>/controller/CidadeController.php?action=edit&id=<?= $cid->getId() ?>">
                                Alterar
                            </a>
                        </td>

                        <td>
                            <a class="btn btn-danger btn-sm"
                               onclick="return confirm('Confirma a exclusão da cidade?');"
                               href="<?= BASEURL ?>/controller/CidadeController.php?action=delete&id=<?= $cid->getId() ?>">
                                Excluir
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>

        </table>

    </div>

</div>

<?php require_once(__DIR__ . "/../include/footer.php"); ?>
