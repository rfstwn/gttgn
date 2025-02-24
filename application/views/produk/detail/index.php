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
                            <td>: Lorem Ipsum</td>
                        </tr>
                        <tr>
                            <td><i class="fa-solid fa-id-card"></i> ID Peserta</td>
                            <td>: 0912981283</td>
                        </tr>
                        <tr>
                            <td><i class="fa-solid fa-location-dot"></i> Alamat</td>
                            <td>: Jl. Tajur Alam, Cilegon, Banten</td>
                        </tr>
                        <tr>
                            <td><i class="fa-solid fa-phone"></i> No. Telp / Whatsapp</td>
                            <td>: +628123456789</td>
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
                <h1 class="title text-green page-title">Pemanas Air Elektrik</h1>
                <span class="product-location">Kota Cilegon - Banten</span>

                <div class="info-wrapper--button">
                    <button class="button">
                        <i class="fa fa-download"></i> Download Katalog
                    </button>

                    <a class="popup-youtube button" href="https://www.youtube.com/embed/pb7zOhkA9jg?si=nT6GWvW6zNkTt8ME">
                        <i class="fa fa-video"></i> Lihat Video
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="deskripsi-wrapper">
            <h2 class="title text-green page-sub-title">Deskripsi Produk</h2>
            <div class="deskripsi-wrapper--content">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec finibus eget libero ut vehicula. Nulla eget magna eros. Nam sit amet convallis odio, non bibendum mi. Vestibulum bibendum dapibus ultricies. Cras pulvinar elit lacus, et lacinia libero elementum nec. Mauris posuere fringilla sodales. Donec ut lacus a est luctus gravida.</p>
                <p>Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Sed pharetra massa id sapien auctor hendrerit. Phasellus nibh justo, varius id risus sed, accumsan facilisis felis. Fusce non libero faucibus, tincidunt est vel, malesuada elit. Suspendisse erat libero, sodales sed libero vitae, scelerisque fringilla orci. Donec ultrices libero elit, a dictum turpis ornare a. Nullam fringilla nibh placerat condimentum vestibulum. Sed eget arcu in quam vestibulum imperdiet. Nam vulputate, erat vel ultricies viverra, ipsum felis porttitor massa, rhoncus iaculis urna libero finibus velit. Donec porttitor interdum nisl, non sodales nisl tempor sed. Etiam convallis nunc magna, sit amet pretium felis fringilla vel. Integer non risus diam.</p>
                <p>Curabitur vel tempor mi. Sed tempor felis eget tortor viverra, id fringilla dolor finibus. Suspendisse odio orci, accumsan nec euismod a, condimentum aliquam tortor. Sed elementum, nunc sit amet dignissim tristique, felis risus pretium metus, sit amet iaculis risus ipsum ut purus. Nulla faucibus, diam ut eleifend elementum, sem magna euismod augue, ultrices vestibulum magna turpis ut elit. Vivamus vitae lectus eu tortor pretium posuere nec ut metus. In id viverra erat, vel feugiat dolor. Donec bibendum elementum elementum. Nam ac feugiat libero, venenatis viverra diam. Aliquam ac accumsan nunc. Etiam vel convallis neque, sit amet malesuada urna. Fusce bibendum, turpis ac convallis elementum, nulla mauris tempor dui, eget aliquet dui dui sed elit. Vestibulum lacinia dui quam, sed aliquet risus egestas quis. Nulla vel est mauris. Aenean rhoncus enim sed congue lacinia. Sed ut purus non erat aliquet pretium non lacinia lacus.</p>
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