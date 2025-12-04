<?php 
 
require_once __DIR__ . "/componentes/header.php"; 
 
if (!isset($_GET['id']) || empty($_GET['id'])) { 
  echo "<p>Erro: nenhum ponto turístico selecionado.</p>"; 
  require_once __DIR__ . "/componentes/footer.php"; 
  exit; 
} 
?> 
 
<main class="main"> 
 
  <div class="page-title dark-background text-center" data-aos="fade"> 
    <div class="container position-relative"> 
      <h1><?= $ponto->getNome() ?></h1> 
      <p><?= $ponto->getCidade()->getNome() ?></p>    
    </div> 
  </div> 
 
  <section id="destination-details" class="destination-details section"> 
 
    <div class="container text-center" data-aos="fade-up"> 
 
      <!-- Foto centralizada -->
      <div class="row justify-content-center mb-4">
        <div class="col-lg-8">
          <img 
            src="<?= BASE_URL_PUBLICA ?>/<?= $ponto->getImagem() ?>" 
            class="img-fluid rounded" 
            alt="<?= $ponto->getNome() ?>"
            style="border-radius: 15px; max-height: 450px; object-fit: cover; width: 100%;"
          >
        </div>
      </div>

      <!-- Informações em linha -->
      <div class="row justify-content-center mb-4">
        <div class="col-lg-10">
          <div class="d-flex justify-content-center gap-4 flex-wrap">
            <p><strong>Nome:</strong> <?= $ponto->getNome() ?></p>
            <p><strong>Cidade:</strong> <?= $ponto->getCidade()->getNome() ?></p>
            <p><strong>Endereço:</strong> <?= $ponto->getEndereco() ?></p>
          </div>
        </div>
      </div>

      <!-- Descrição centralizada -->
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <p style="text-align: center; font-size: 1.1rem; line-height: 1.7;">
            <?= $ponto->getDescricao() ?>
          </p>
        </div>
      </div>

    </div> 
 
  </section> 
 
</main> 
 
<?php require_once __DIR__ . "/componentes/footer.php"; ?>
