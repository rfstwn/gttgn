<?php
ci()->load->view("templates/header", ['title' => 'Produk']);
ci()->load->view('templates/nav');
?>
<div class="container page-wrapper">
    <h1 class="title main-title text-grey">Produk Inovasi</h1>

    <div class="row">
        <?php foreach ($products as $p) : ?>
            <div class="col-12 col-md-4 col-sm-6">
                <div class="card-product">
                    <div class="card-product--image">
                        <img src="<?= $p['image'] ?>" alt="<?= $p['title'] ?>" />
                    </div>
                    <div class="card-product--info">
                        <h3><?= $p['title'] ?></h3>
                        <p><?= $p['locations'] ?></p>
                    </div>

                    <p><?= truncate($p['desc'], 100) ?></p>
                    <a href="<?= base_url('produk/detail/' . $p['id']) ?>" class="button button-block">
                        Lihat Detail
                    </a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <?php if(isset($pagination) && !empty($pagination)): ?>
    <nav aria-label="Page navigation">
        <?= $pagination ?>
    </nav>

    <div class="pagination-info text-center text-grey mt-1">
        <small>Menampilkan <?= count($products) ?> dari <?= $total_products ?> produk</span>
    </div>
<?php endif; ?>
</div>

<?php ci()->load->view("templates/footer"); ?>