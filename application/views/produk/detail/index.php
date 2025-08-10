<?php
ci()->load->view("templates/header", ['title' => 'Produk Detail']);
ci()->load->view('templates/nav');
?>

<div class="container page-wrapper product-detail">
    <div class="row justify-space-between">
        <div class="col-12 col-md-9">
            <div class="profile-wrapper">
                <div class="profile-wrapper--image">
                    <?php if($tenant->photo_profile): ?>
                        <img src="<?= base_url('assets/image/tenant/' . $tenant->photo_profile) ?>" alt="profile-pic" />
                    <?php else: ?>
                        <img src="<?= base_url('assets/image/profile-pic.jpg') ?>" alt="profile-pic" />
                    <?php endif; ?>
                </div>
                <div class="profile-wrapper--info">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <table spacing="0">
                                <tr>
                                    <td><i class="fa-solid fa-user"></i> Inovator</td>
                                    <td>: <?= $tenant->nama_tenant ? htmlspecialchars($tenant->nama_tenant) : '-' ?></td>
                                </tr>
                                <tr>
                                    <td><i class="fa-solid fa-location-dot"></i> Lokasi</td>
                                    <td>: <?= $tenant->address ? htmlspecialchars($tenant->address) : '-' ?></td>
                                </tr>
                                <tr>
                                    <td><i class="fa-solid fa-phone"></i> No. Telp / Whatsapp</td>
                                    <td>: <?= $tenant->no_telp ? htmlspecialchars($tenant->no_telp) : '-' ?></td>
                                </tr>
                                <tr>
                                    <td><i class="fa-solid fa-envelope"></i> Email</td>
                                    <td>: <?= $tenant->email ? htmlspecialchars($tenant->email) : '-' ?></td>
                                </tr>
                                <tr>
                                    <td><i class="fa-solid fa-box"></i> Produk Utama</td>
                                    <td>: <?= $tenant->produk_utama ? htmlspecialchars($tenant->produk_utama) : '-' ?></td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-12 col-md-6">
                        <table spacing="0">
                               
                                <?php if($tenant->youtube): ?>
                                    <tr>
                                        <td colspan="2">
                                            <a href="<?= $tenant->youtube ?>" target="_blank" class="text-decoration-none text-danger">
                                                <i class="fa-brands fa-youtube"></i> Lihat Channel YouTube
                                            </a>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                                </table>   
                                <?php if($tenant->description): ?>
                                    <p class="d-block text-muted">
                                        <small><?= htmlspecialchars($tenant->description) ?></small>
                                    </p>
                                <?php endif; ?>                     
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--
        <div class="col-12 col-md-3">
            <div class="visitor-wrapper">
                <div class="visitor-wrapper--content">
                    <span>Pengunjung</span>
                    <h3>496</h3>
                </div>
            </div>
        </div>
        -->
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
                        <a class="button" data-fancybox href="<?= htmlspecialchars($product['video']) ?>">
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
                    <div class="col-12 col-sm-4">
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
            slidesPerView: 5,
            spaceBetween: 10
        });
    });
</script>