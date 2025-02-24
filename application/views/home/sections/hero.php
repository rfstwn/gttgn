<div class="hero-wrapper">
    <div class="top-bar">
        <div class="main-logo">
            <img src="<?= base_url('assets/image/gttgn-logo.png') ?>" alt="gttgn-logo" />
        </div>
        <div class="actions">
            <button class="button">
                <i class="fa fa-circle-user"></i>Login Peserta
            </button>
        </div>
    </div>

    <div class="swiper-container">
        <div class="swiper-wrapper">
            <div class="swiper-slide"><img src="<?= base_url('assets/image/slider/slider-1.png') ?>" alt="Slide 1"></div>
            <div class="swiper-slide"><img src="<?= base_url('assets/image/slider/slider-2.png') ?>" alt="Slide 2"></div>
        </div>
    </div>

    <?php ci()->load->view('/templates/nav', ['isSticky' => true]) ?>
</div>