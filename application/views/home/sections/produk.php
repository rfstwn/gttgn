<div class="product-wrapper">
    <div class="custom-title">
        <h1 class="title main-title text-grey-light">Produk Inovasi</h1>
        <h4 class="title second-title text-green">Yang Akan Hadir</h4>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10">
                <div class="owl-carousel">
                    <?php $duration = 500;
                    foreach ($products as $product): ?>
                        <div class="product-item" data-aos="fade-up" data-aos-duration="<?= $duration ?>">
                            <div class="product-item--header">
                                <img src="<?= $product['image'] ?>" alt="<?= $product['title'] ?>">
                            </div>
                            <div class="product-item--body">
                                <h4><?= $product['title'] ?></h4>
                                <p><?= truncate($product['description'], 100) ?></p>
                            </div>
                            <div class="product-item--footer">
                                <a href="<?= base_url('produk/detail/' . $product['id']) ?>" class="text-decoration-none">
                                    <button><i class="fa fa-plus"></i></button>
                                </a>
                            </div>
                        </div>
                    <?php $duration += 500;
                    endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>