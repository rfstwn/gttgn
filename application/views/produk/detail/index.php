<?php
ci()->load->view("templates/header", ['title' => 'Produk Detail']);
ci()->load->view('templates/nav');
?>

<div class="container page-wrapper product-detail">
    <div class="row justify-space-between">
        <div class="col-12 col-md-6">
            <div class="profile-wrapper">
                <div class="profile-wrapper--image">
                    <img src="<?= base_url('assets/image/profile-pic.jpg') ?>" alt="profile-pic" />
                </div>
                <div class="profile-wrapper--info">
                    <table spacing="0">
                        <tr>
                            <td><i class="fa-solid fa-user"></i> Inovator</td>
                            <td>: <?= htmlspecialchars($product['user_name']) ?></td>
                        </tr>
                        <tr>
                            <td><i class="fa-solid fa-building"></i> Tenant</td>
                            <td>: <?= htmlspecialchars($product['tenant']) ?></td>
                        </tr>
                        <tr>
                            <td><i class="fa-solid fa-location-dot"></i> Lokasi</td>
                            <td>: <?= htmlspecialchars($product['locations']) ?></td>
                        </tr>
                        <tr>
                            <td><i class="fa-solid fa-phone"></i> No. Telp / Whatsapp</td>
                            <td>: <?= htmlspecialchars($product['user_phone']) ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6">
            <div class="visitor-wrapper">
                <div class="visitor-wrapper--content">
                    <span>Pengunjung</span>
                    <h3>496</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-12 col-md-5">
            <div class="image-detail-wrapper">
                <div class="image-detail-wrapper--main">
                    <a id="mainImageLink" href="<?= $detail_photo[0] ?>" data-fancybox="gallery">
                        <img id="mainImage" src="<?= $detail_photo[0] ?>" class="img-fluid" alt="Product Image">
                    </a>
                </div>
                <div class="swiper image-detail-wrapper--thumb">
                    <div class="swiper-wrapper" id="thumbnailContainer">
                        <!-- Thumbnails will be added dynamically -->
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-7">
            <div class="info-wrapper">
                <h1 class="title text-green page-title"><?= htmlspecialchars($product['title']) ?></h1>
                <span class="product-location"><?= htmlspecialchars($product['locations']) ?></span>

                <div class="info-wrapper--button">
                    <?php if($product['katalog']): ?>
                        <a href="<?= $product['katalog'] ?>" target="_blank" class="button">
                            <i class="fa fa-download"></i> Download Katalog
                        </a>
                    <?php endif; ?>

                    <?php if($product['video']): ?>
                        <a class="popup-youtube button" href="<?= htmlspecialchars($product['video']) ?>">
                            <i class="fa fa-video"></i> Lihat Video
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="deskripsi-wrapper">
            <h2 class="title text-green page-sub-title">Deskripsi Produk</h2>
            <div class="deskripsi-wrapper--content">
                <?php if($product['description']): ?>
                    <p><?= nl2br(htmlspecialchars($product['description'])) ?></p>
                <?php else: ?>
                    <p class="text-muted">Deskripsi produk belum tersedia.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="produl-lain-wrapper">
            <h2 class="title text-green page-sub-title">Produk Inovasi Lainnya</h2>
            <div class="row">
                <?php foreach ($other_products as $p) : ?>
                    <div class="col-12 col-sm-6">
                        <div class="card-product">
                            <div class="card-product--image">
                                <img src="<?= $p['image'] ?>" alt="<?= $p['title'] ?>" />
                            </div>
                            <div class="card-product--info">
                                <h3><?= $p['title'] ?></h3>
                                <p><?= $p['locations'] ?></p>
                            </div>

                            <p><?= truncate($p['desc'], 200) ?></p>

                            <a href="<?= base_url('produk/detail/' . $p['id']) ?>" class="button button-block">
                                Lihat Detail
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<?php ci()->load->view("templates/footer"); ?>
<script>
    $(document).ready(function() {
        let images = <?= json_encode($detail_photo) ?>; // Get images from PHP

        // Generate thumbnails dynamically
        let thumbnailContainer = $("#thumbnailContainer");
        images.forEach((imgSrc, index) => {
            let imgElement = `<div class="swiper-slide"> <img src="${imgSrc}" class="img-thumbnail small-img" data-src="${imgSrc}"> </div>`;
            thumbnailContainer.append(imgElement);
        });

        // Click event to change the main image
        $(".swiper-slide img").click(function() {
            let newSrc = $(this).attr("data-src");
            $("#mainImage").attr("src", newSrc);
            $("#mainImageLink").attr("href", newSrc);
        });

        // Initialize Swiper
        var swiper = new Swiper(".image-detail-wrapper--thumb", {
            loop: false,
            slidesPerView: 4,
            spaceBetween: 10
        });

        // Initialize Fancybox
        $("[data-fancybox]").fancybox();

        // Initialize Zoom
        $('#mainImage').zoom();
    });
</script>