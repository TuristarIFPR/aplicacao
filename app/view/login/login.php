<?php require_once(__DIR__ . "/../include/header.php"); ?>

<style>
/* ===========================================================
   ESTILO GLOBAL
   =========================================================== */

body {
    font-family: 'Poppins', sans-serif;
    background-color: #d8dce3ff;
    margin: 0;
}

/* Títulos principais */
h1, h2, h3, h4 {
    font-weight: 600;
    color: #000000ff;
}

p, span, label {
    font-size: 16px;
    color: #000000ff;
}

/* Espaçamento padrão para páginas */
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
    box-shadow: 0 4px 15px rgba(0,0,0,0.08);
}

/* ===========================================================
   FORMULÁRIOS
   =========================================================== */

.form-control {
    padding: 12px;
    border-radius: 10px;
    border: 1px solid #000000ff;
}

.form-control:focus {
    border-color: #272642ff;
    box-shadow: 0 0 0 0.2rem rgba(22, 7, 71, 0.25);
}

.form-label {
    font-weight: 500;
    color: #333;
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
}
</style>
<div class="container d-flex justify-content-center">
    <div class="col-6 mt-5">

        <div class="card p-4 shadow-sm">

            <h3 class="text-center mb-4">Acesse sua conta</h3>

            <form action="./LoginController.php?action=logon" method="POST">

                <div class="mb-3">
                    <label class="form-label fw-semibold">Email:</label>
                    <input type="text" class="form-control" name="email" placeholder="Seu email">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Senha:</label>
                    <input type="password" class="form-control" name="senha" placeholder="Sua senha">
                </div>

                <button type="submit" class="btn btn-success w-100 mt-2">Entrar</button>

            </form>

        </div>

    </div>
</div>

<?php require_once(__DIR__ . "/../include/footer.php"); ?>
