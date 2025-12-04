<?php
require_once(__DIR__ . "/../include/header.php");
require_once(__DIR__ . "/../include/menu.php");
?>

<style>
/* ===========================================================
   GLOBAL
   =========================================================== */
body {
    font-family: 'Poppins', sans-serif;
    background-color: #d8dce3ff;
}
h1, h2, h3, h4 {
    font-weight: 600;
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
    margin-bottom: 40px;
    text-align: center;
}

.hero-padrao h1 {
    font-size: 38px;
    font-weight: 700;
}

/* ===========================================================
   CARD
   =========================================================== */
.card {
    background: #fff;
    border-radius: 12px;
    border: none;
    box-shadow: 0 4px 15px rgba(0,0,0,0.08);
}

/* ===========================================================
   TABELA
   =========================================================== */
.table thead {
    background: #272642ff;
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
    border-radius: 10px !important;
}
</style>

<!-- HERO -->
<div class="hero-padrao">
    <div class="container text-center">
        <h1>Notícias Cadastradas</h1>
    </div>
</div>

<div class="container">

    <?php require_once(__DIR__ . "/../include/msg.php"); ?>

    <div class="card p-4 shadow-sm">

        <div class="d-flex justify-content-between mb-3">
            <h4 class="m-0">Lista de Notícias</h4>
        </div>

        <table id="tabnoticias" class="table table-hover table-bordered text-center align-middle">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Texto</th>
                    <th>Data</th>
                    <th>Alterar</th>
                    <th>Excluir</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($dados['noticias'] as $noti): ?>
                    <tr>
                        <td><?= $noti->getId(); ?></td>
                        <td class="fw-semibold"><?= $noti->getTitulo(); ?></td>
                        <td><?= $noti->getTexto(); ?></td>
                        <td><?= $noti->getData(); ?></td>

                        <td>
                            <a class="btn btn-primary btn-sm"
                                href="<?= BASEURL ?>/controller/NoticiasController.php?action=edit&id=<?= $noti->getId() ?>">
                                Alterar
                            </a>
                        </td>

                        <td>
                            <a class="btn btn-danger btn-sm"
                                onclick="return confirm('Confirma a exclusão da notícia?');"
                                href="<?= BASEURL ?>/controller/NoticiasController.php?action=delete&id=<?= $noti->getId() ?>">
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
