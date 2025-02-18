<div class="container">
    <div class="audience-wrapper">
        <h2 class="title second-title text-green  text-center">Jumlah Peserta</h2>
        <div class="row justify-content-center">
            <?php foreach ($audiences as $audience): ?>
                <div class="col-4 col-md 2">
                    <div class="audience-item">
                        <h1 class="counter" data-count="<?= $audience['count'] ?>"><?= $audience['count'] ?></h1>
                        <p><?= $audience['title'] ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>