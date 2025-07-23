<?php
ci()->load->view('templates/header', ['title' => 'Informasi']);
ci()->load->view('templates/nav');
//-- End Informasi Content --
?>

<div class="hero-wrapper-general">
    <img src="<?= base_url('assets/image/hero-information.jpg') ?>" alt="Informasi Hero">
</div>
<div class="container">
    <div class="section-wrapper border-bottom">
        <h1 class="title main-title text-grey mb-4">Informasi <br />&amp; Lokasi</h1>
        <div class="row justify-content-between">
            <div class="col-lg-6 mb-sm-2" data-aos="fade-right" data-aos-duration="1000">
                <p>GTTGN 2025 yang berlokasi di Kota Cilegon dapat diakses dengan mudah karena lokasinya yang dekat dengan fasilitas umum dan jalan utama.</p>
                <p>Siapkan kunjungan Anda ke GTTGN Kota Cilegon dengan mengikuti rute pilihan kami. Lihat peta interaktif dan temukan panduan arah perjalanan melalui tab berikut.</p>
            </div>
            <div class="col-lg-4" data-aos="fade-left" data-aos-duration="1000">
                <div class="d-flex align-items-start justify-content-start gap-2 text-grey">
                    <i class="fa-solid fa-location-dot fs-3 mt-1"></i>
                    <p>Jalan Jenderal Sudirman, Kelurahan Ramanuju, Kecamatan Purwakarta, Kota Cilegon, Banten 42431</p>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Transportation Section -->
    <?php $this->load->view('informasi/sections/transportation') ?>
</div>

<?php
ci()->load->view('templates/footer');
