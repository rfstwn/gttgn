<?php
ci()->load->view("templates/header", ['title' => 'Produk']);
ci()->load->view('templates/nav');
?>
<div class="container page-wrapper">
    <h1 class="title text-center text-green page-title">Produk Inovasi</h1>

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

    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">
                        <i class="fa-solid fa-angles-left"></i>
                    </span>
                    <span class="sr-only">Previous</span>
                </a>
            </li>
            <li class="page-item"><a class="page-link active" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">
                        <i class="fa-solid fa-angles-right"></i>
                    </span>
                    <span class="sr-only">Next</span>
                </a>
            </li>
        </ul>
    </nav>
</div>

<?php ci()->load->view("templates/footer"); ?>