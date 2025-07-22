<?php
ci()->load->view('templates/header', ['title' => 'Informasi']);
ci()->load->view('templates/nav');
//-- End Informasi Content --
?>
<div class="hero-wrapper-general">
    <img src="<?= base_url('assets/image/hero-hotel.jpg') ?>" alt="Hotel Hero">
</div>
<div class="container">
    <div class="section-wrapper">
        <h1 class="title main-title text-grey mb-4">Informasi<br />Hotel</h1>
    </div>
</div>
<?php
ci()->load->view('templates/footer');
