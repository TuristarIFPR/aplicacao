<?php
require_once(__DIR__ . "/../include/header.php");
require_once(__DIR__ . "/../include/menu.php");
?>

<style>
/* mesmo css global das outras páginas */
body {
    font-family: 'Poppins', sans-serif;
    background-color: #d8dce3ff;
    margin: 0;
}
h1, h2, h3, h4 {
    font-weight: 600;
    color: #000;
}
p, label, span {
    font-size: 16px;
    color: #000;
}
.card {
    border-radius: 12px;
    border: none;
    background: #fff;
    box-shadow: 0 4px 15px rgba(0,0,0,0.08);
}
.btn {
    border-radius: 10px !important;
}

/* HERO */
.hero-padrao {
    background: linear-gradient(
        rgba(0,0,0,0.45),
        rgba(0,0,0,0.45)
    ),
    url('../img/travel/home.jpg') center/cover no-repeat;
    padding: 110px 0;
    text-align: center;
    margin-bottom: 40px;
}
.hero-padrao h1 {
    font-size: 38px;
    font-weight: 700;
}
</style>

<div class="hero-padrao">
    <div class="container text-center">
        <h1>Pontos Turísticos Cadastrados</h1>
    </div>
</div>

<div class="container">

    <?php require_once(__DIR__ . "/../include/msg.php"); ?>

    <div class="card shadow-sm p-4">

        <h4 class="mb-4 text-center">Lista de Pontos Turísticos</h4>

        <table id="tabPontos" class="table table-hover table-bordered text-center align-middle">
            <thead class="table-light">
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Imagem</th>
                <th>Endereço</th>
                <th>Descrição</th>
                <th>Alterar</th>
                <th>Excluir</th>
            </tr>
            </thead>

            <tbody>
            <?php foreach($dados['pontos'] as $pont): ?>
                <tr>
                    <td><?= $pont->getId(); ?></td>

                    <td class="fw-semibold"><?= $pont->getNome(); ?></td>

                    <td>
                        <img src="<?= BASEURL . "/../../publica/" . $pont->getImagem() ?>"
                             width="100" class="rounded shadow-sm" alt="Imagem">
                    </td>

                    <td><?= $pont->getEndereco(); ?></td>

                    <td><?= $pont->getDescricao(); ?></td>

                    <td>
                        <a class="btn btn-primary btn-sm"
                           href="<?= BASEURL ?>/controller/PontoTuristicoController.php?action=edit&id=<?= $pont->getId() ?>">
                            Alterar
                        </a>
                    </td>

                    <td>
                        <a class="btn btn-danger btn-sm"
                           onclick="return confirm('Deseja excluir este ponto turístico?');"
                           href="<?= BASEURL ?>/controller/PontoTuristicoController.php?action=delete&id=<?= $pont->getId() ?>">
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
