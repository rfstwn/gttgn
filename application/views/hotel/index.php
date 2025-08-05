<?php
ci()->load->view('templates/header', ['title' => 'Hotel']);
ci()->load->view('templates/nav');
//-- End Informasi Content --

// Hotel data is now provided by the controller from database
?>
<div class="hero-wrapper-general">
    <img src="<?= base_url('assets/image/hero-hotel.jpg') ?>" alt="Hotel Hero">
</div>
<div class="container">
    <div class="section-wrapper">
        <h1 class="title main-title text-grey mb-4">Hotel<br />Terdekat</h1>
        
        <div class="hotel-list">
            <div class="row">
                <?php foreach ($hotels as $hotel): ?>
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="hotel-card">
                            <div class="hotel-card__image">
                                <img src="<?= base_url($hotel['image']) ?>" alt="<?= $hotel['name'] ?>" onerror="this.src='<?= base_url('assets/image/placeholder.jpg') ?>'">

                                <div class="hotel-card__image__star">
                                    <?php for ($i = 1; $i <= 5; $i++) : ?>
                                        <i class="fas fa-star <?= $i <= $hotel['star'] ? 'hotel-card__image__star-active' : 'hotel-card__image__star-inactive' ?> "></i>
                                    <?php endfor; ?>
                                </div>
                            </div>
                            <div class="hotel-card__content">
                                <h3 class="hotel-card__name"><?= $hotel['name'] ?></h3>
                                <div class="hotel-card__info">
                                    <div class="hotel-card__info-item">
                                        <i class="fas fa-map-marker-alt"></i>
                                        <span><?= $hotel['address'] ?></span>
                                    </div>
                                    <div class="hotel-card__info-item">
                                        <i class="fas fa-phone"></i>
                                        <span><?= $hotel['phone'] ?></span>
                                    </div>
                                </div>
                                <a href="https://www.google.com/maps/dir/?api=1&destination=<?= $hotel['latitude'] ?>,<?= $hotel['longitude'] ?>" 
                                   class="hotel-card__direction-btn" 
                                   target="_blank" 
                                   rel="noopener noreferrer">
                                    <i class="fas fa-directions"></i> Petunjuk Arah
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
<?php
ci()->load->view('templates/footer');
