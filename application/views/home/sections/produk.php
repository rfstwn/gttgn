<div class="product-wrapper">
    <div class="custom-title">
        <h1 class="title main-title text-grey-light">Produk Inovasi</h1>
        <h4 class="title second-title text-green">Yang Akan Hadir</h4>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10">
                <div class="owl-carousel">
                    <?php foreach ($products as $product): ?>
                        <div class="product-item">
                            <div class="product-item--header">
                                <img src="<?= $product['image'] ?>" alt="<?= $product['title'] ?>">
                            </div>
                            <div class="product-item--body">
                                <h4><?= $product['title'] ?></h4>
                                <p><?= substr($product['description'],0, 120) ?></p>
                            </div>
                            <div class="product-item--footer">
                                <button><i class="fa fa-plus"></i></button>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>