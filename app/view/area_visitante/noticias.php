<?php require_once __DIR__ . "/componentes/header.php"; ?>

<main class="main">

  <!-- Page Title -->
  <div class="page-title dark-background" data-aos="fade" style="background-image: url(<?= BASE_URL_VISITANTE ?>/assets/img/travel/noticias.jpg);">
    <div class="container position-relative">
      <h1>Notícias</h1>
    </div>
  </div><!-- End Page Title -->

  <!-- Blog Posts Section -->
  <section id="blog-posts" class="blog-posts section">

    <div class="container" data-aos="fade-up" data-aos-delay="100">
      <div class="row gy-4">

        <?php foreach ($noticias as $noticia): ?>
          <div class="col-lg-4">
            <article>

              <p class="post-category">
                <?= $noticia->getPonto_turistico()->getNome(); ?>
              </p>

              <h2 class="title">
                <a href="<?= BASEURL ?>/controller/SiteController.php?action=noticias_detalhes&id=<?= $noticia->getId(); ?>">
                  <?= $noticia->getTitulo(); ?>
                </a>
              </h2>

              <div class="d-flex align-items-center">
                <div class="post-meta">
                  <p class="post-date">
                    <time><?= date("d/m/Y", strtotime($noticia->getData())); ?></time>
                  </p>
                </div>
              </div>

            </article>
          </div>
        <?php endforeach; ?>

      </div>
    </div>

  </section><!-- /Blog Posts Section -->
</main>

<?php require_once __DIR__ . "/componentes/footer.php"; ?>
