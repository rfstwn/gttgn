<div class="hero-wrapper">
    <div class="top-bar d-none d-md-flex">
        <div class="main-logo">
            <img src="<?= base_url('assets/image/gttgn-logo.png') ?>" alt="gttgn-logo" />
        </div>
        <div class="actions">
            <?php if ($this->session->userdata('logged_in')) : ?>
                <div class="d-flex gap-2 justify-content-center align-items-center">
                    <a class="text-decoration-none" href="<?= base_url('user/dashboard') ?>">
                        <button class="button"> <i class="fa fa-tachometer-alt"></i>Dashboard PIC</button>
                    </a>
                    <a class="text-decoration-none" href="<?= base_url('user/logout') ?>">
                        <button class="button"> <i class="fa fa-sign-out-alt"></i>Logout </button>
                    </a>
                </div>
            <?php else : ?>
                <button class="button" id="loginButton" data-bs-toggle="modal" data-bs-target="#loginModal">
                    <i class="fa fa-circle-user"></i>Login Peserta
                </button>
            <?php endif; ?>
        </div>
    </div>

    <div class="swiper-container">
        <div class="swiper-wrapper">
            <div class="swiper-slide"><img src="<?= base_url('assets/image/slider/slider-1.jpg') ?>" alt="Slide 1"></div>
            <div class="swiper-slide"><img src="<?= base_url('assets/image/slider/slider-2.png') ?>" alt="Slide 2"></div>
        </div>
    </div>
</div>