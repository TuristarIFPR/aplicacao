<?php
require_once __DIR__ . "/componentes/header.php";

// $pontos vem do controller SiteController
?>

<main class="main">

    <!-- Page Title -->
    <div class="page-title dark-background" data-aos="fade"
        style="background-image: url(<?= BASE_URL_VISITANTE ?>/assets/img/travel/pontosturisticos.jpg);">
        <div class="container position-relative">
            <h1>Pontos Turístico</h1>
            <p>Conheça um pouco sobre o Brasil.</p>
        </div>
    </div>
    <!-- End Page Title -->

    <!-- Destinations Section -->
    <section id="destinations" class="destinations section">

        <div class="container">

            <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="300">

                <?php if (count($pontos) > 0): ?>

                    <?php foreach ($pontos as $p): ?>

                        <div class="col-lg-4 col-md-6 destination-item isotope-item filter-coastal">

                            <a href="<?= BASEURL ?>/controller/SiteController.php?action=pontosTuristicos_detalhes&id=<?= $p->getId(); ?>"
                                class="destination-tile">

                                <div class="overlay-content">

                                    <span class="destination-tag luxury">
                                        <?= $p->getCidade()->getNome() ?>
                                    </span>

                                    <div class="destination-info">
                                        <h4><?= $p->getNome() ?></h4>

                                        <p><?= substr($p->getDescricao(), 0, 100) ?>...</p>

                                        <div class="destination-stats">
                                            <span class="tours-available">
                                                <i class="bi bi-map"></i> Ver detalhes
                                            </span>
                                            <span class="starting-price">
                                                <?= $p->getCidade()->getNome() ?>
                                            </span>
                                        </div>

                                    </div>

                                </div>
                            </a>

                        </div>

                    <?php endforeach; ?>

                <?php else: ?>

                    <p>Nenhum ponto turístico cadastrado.</p>

                <?php endif; ?>

            </div>

        </div>

    </section>

</main>

<?php require_once __DIR__ . "/componentes/footer.php"; ?>