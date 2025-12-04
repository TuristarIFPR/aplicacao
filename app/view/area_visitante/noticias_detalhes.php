<?php require_once __DIR__ . "/componentes/header.php"; ?>

<main class="main">

  <!-- Page Title -->
  <div class="page-title dark-background" data-aos="fade">
    <div class="container position-relative">
      <h1><?php echo $noticia->getTitulo(); ?></h1>
    </div>
  </div>
  <!-- End Page Title -->

  <!-- Blog Details Section -->
  <section id="blog-details" class="blog-details section">
    <div class="container" data-aos="fade-up">

      <article class="article">

        <div class="article-header">
          <h1 class="title" data-aos="fade-up" data-aos-delay="100">
            <?php echo $noticia->getTitulo(); ?>
          </h1>

          <div class="article-meta" data-aos="fade-up" data-aos-delay="200">
            <div class="author-info">
              <h4><?php echo $noticia->getPonto_turistico()->getNome(); ?></h4>
              <span>Ponto Turístico Relacionado</span>
            </div>

            <div class="post-info">
              <span>
                <i class="bi bi-calendar4-week"></i>
                <?php echo date("d/m/Y", strtotime($noticia->getData())); ?>
              </span>
            </div>
          </div>
        </div>

        <div class="article-wrapper">

          <!-- BLOCO CENTRALIZADO CORRETAMENTE -->
          <div
            class="article-content"
            style="
              grid-column: 1 / -1 !important;   /* ocupa TODA a largura do grid */
              display: flex !important;
              justify-content: center !important;
              width: 100% !important;
              text-align: center !important;
            "
          >
            <div
              style="
                max-width: 850px !important;
                width: 100% !important;
                text-align: left !important;     /* leitura natural */
                padding: 0 15px !important;
                line-height: 1.8 !important;
                font-size: 1.15rem !important;
                box-sizing: border-box !important;
              "
            >
              <?php echo nl2br(htmlspecialchars($noticia->getTexto())); ?>
            </div>
          </div>
          <!-- FIM DO BLOCO CENTRALIZADO -->

        </div>

      </article>

    </div>
  </section>
  <!-- End Blog Details Section -->

</main>

<?php require_once __DIR__ . "/componentes/footer.php"; ?>