<?php
ci()->load->view('templates/header', ['title' => 'Informasi']);
ci()->load->view('templates/nav');
//-- End Informasi Content --
?>

<div class="hero-wrapper-general">
    <img src="<?= base_url('assets/image/' . ($informasi_content['hero_image'] ?? 'hero-information.jpg')) ?>" alt="Informasi Hero">
</div>
<div class="container">
    <div class="section-wrapper border-bottom">
        <h1 class="title main-title text-grey mb-4">Informasi <br />&amp; Lokasi</h1>
        <div class="row justify-content-between">
            <div class="col-lg-6 mb-sm-2" data-aos="fade-right" data-aos-duration="1000">
                <p><?= htmlspecialchars($informasi_content['description'] ?? '') ?></p>
            </div>
            <div class="col-lg-4" data-aos="fade-left" data-aos-duration="1000">
                <div class="d-flex align-items-start justify-content-start gap-2 text-grey">
                    <i class="fa-solid fa-location-dot fs-3 mt-1"></i>
                    <p><?= htmlspecialchars($informasi_content['address'] ?? '') ?></p>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Transportation Section -->
    <?php $this->load->view('informasi/sections/transportation', ['transportation_list' => $transportation_list]) ?>
</div>

<?php
ci()->load->view('templates/footer');
