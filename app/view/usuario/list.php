<?php
require_once(__DIR__ . "/../include/header.php");
require_once(__DIR__ . "/../include/menu.php");
?>

<style>
/* ===========================================================
   ESTILO GLOBAL (mesmo da referência)
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

/* HERO */
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

/* CARD e BOTÕES */
.card {
    border-radius: 12px;
    border: none;
    background: #fff;
    box-shadow: 0 4px 15px rgba(0,0,0,0.08);
}
.btn {
    border-radius: 10px !important;
    padding: 10px 20px;
    font-size: 16px;
}
.btn-primary {
    border-radius: 10px !important;
}
.btn-danger {
    border-radius: 10px !important;
}
</style>

<!-- HERO -->
<div class="hero-padrao">
    <div class="container text-center">
        <h1>Usuários cadastrados</h1>
    </div>
</div>

<div class="container">

    <?php require_once(__DIR__ . "/../include/msg.php"); ?>

    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-sm p-4">

                <div class="d-flex justify-content-between mb-3">
                    <h4 class="m-0">Lista de Usuários</h4>
                </div>

                <table id="tabUsuarios" class="table table-hover table-bordered text-center align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Email</th>
                            <th>Nome</th>
                            <th>Nascimento</th>
                            <th>Telefone</th>
                            <th>Tipo</th>
                            <th>Alterar</th>
                            <th>Excluir</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach($dados['lista'] as $usu): ?>
                            <tr>
                                <td><?= $usu->getId(); ?></td>
                                <td><?= $usu->getEmail(); ?></td>
                                <td class="fw-semibold"><?= $usu->getNomeCompleto(); ?></td>
                                <td><?= $usu->getDataNascFormatada(); ?></td>
                                <td><?= $usu->getTelefone(); ?></td>
                                <td><?= $usu->getTipo(); ?></td>

                                <td>
                                    <a class="btn btn-primary btn-sm"
                                       href="<?= BASEURL ?>/controller/UsuarioController.php?action=edit&id=<?= $usu->getId() ?>">
                                       Alterar
                                    </a>
                                </td>

                                <td>
                                    <a class="btn btn-danger btn-sm"
                                       onclick="return confirm('Deseja excluir este usuário?');"
                                       href="<?= BASEURL ?>/controller/UsuarioController.php?action=delete&id=<?= $usu->getId() ?>">
                                       Excluir
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>

                </table>

            </div>
        </div>
    </div>

</div>

<?php require_once(__DIR__ . "/../include/footer.php"); ?>
