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
   CARD E FORM
   =========================================================== */
.card {
    border-radius: 12px;
    border: none;
    background: #fff;
    box-shadow: 0 4px 15px rgba(0,0,0,0.08);
}
.form-control, .form-select {
    padding: 12px;
    border-radius: 10px;
    border: 1px solid #000;
}
.form-control:focus, .form-select:focus {
    border-color: #272642ff;
    box-shadow: 0 0 0 0.2rem rgba(39, 38, 66, 0.25);
}
.form-label {
    font-weight: 500;
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
    color: #fff;
}
.btn-success:hover {
    opacity: .9;
}

.btn-secondary {
    border-radius: 10px !important;
}
</style>

<!-- HERO -->
<div class="hero-padrao">
    <div class="container text-center">
        <h1><?= ($dados['id'] == 0 ? "Cadastrar Usuário" : "Editar Usuário") ?></h1>
    </div>
</div>

<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-7">

            <div class="card p-4 shadow-sm">

                <h4 class="text-center mb-4">
                    <?= ($dados['id'] == 0 ? "Novo Usuário" : "Alterar Dados do Usuário") ?>
                </h4>

                <?php require(__DIR__ . "/../include/msg.php"); ?>

                <form method="POST" action="<?= BASEURL ?>/controller/UsuarioController.php?action=save">

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Nome:</label>
                        <input class="form-control" type="text" name="nome"
                            placeholder="Informe o nome"
                            value="<?= isset($dados["usuario"]) ? $dados["usuario"]->getNomeCompleto() : '' ?>">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Email:</label>
                        <input class="form-control" type="email" name="email"
                            placeholder="Informe o email"
                            value="<?= isset($dados["usuario"]) ? $dados["usuario"]->getEmail() : '' ?>">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Data de Nascimento:</label>
                        <input class="form-control" type="date" name="dataNasc"
                            value="<?= isset($dados["usuario"]) ? $dados["usuario"]->getDataNasc() : '' ?>">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Telefone:</label>
                        <input class="form-control" type="text" name="telefone"
                            placeholder="(xx) xxxxx-xxxx"
                            value="<?= isset($dados["usuario"]) ? $dados["usuario"]->getTelefone() : '' ?>">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Senha:</label>
                        <input class="form-control" type="password" name="senha"
                            placeholder="Crie uma senha"
                            value="<?= isset($dados["usuario"]) ? $dados["usuario"]->getSenha() : '' ?>">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Confirmar Senha:</label>
                        <input class="form-control" type="password" name="conf_senha"
                            placeholder="Repita a senha"
                            value="<?= isset($dados['confSenha']) ? $dados['confSenha'] : '' ?>">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Papel:</label>
                        <select class="form-select" name="papel">
                            <option value="">Selecione...</option>
                            <?php foreach($dados["papeis"] as $papel): ?>
                                <option value="<?= $papel ?>"
                                    <?= (isset($dados["usuario"]) && $dados["usuario"]->getTipo() == $papel) ? "selected" : "" ?>>
                                    <?= $papel ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <input type="hidden" name="id" value="<?= $dados['id']; ?>">

                    <button type="submit" class="btn btn-success w-100 mt-3">
                        Salvar
                    </button>

                </form>
            </div>

            <div class="text-center mt-4">
                <a class="btn btn-secondary px-4"
                   href="<?= BASEURL ?>/controller/UsuarioController.php?action=list">Voltar</a>
            </div>

        </div>
    </div>

</div>

<?php require_once(__DIR__ . "/../include/footer.php"); ?>
