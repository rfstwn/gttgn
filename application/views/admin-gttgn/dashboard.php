<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="mb-0">Selamat datang di GTTGN Admin CMS</h5>
            <p><small>Gunakan sidebar menu untuk mengelola konten website, dan berikut adalah beberapa informasi sederhana.</small></p>
            
            <div class="shortcut-dashboard">
                <?php foreach($shortcut_dashboard as $shortcut): ?>
                <div class="card bg-light">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $shortcut['title']; ?></h5>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="card-text"><?php echo $shortcut['count']; ?> <small><?php echo $shortcut['description']; ?></small></span>
                            <?php if(isset($shortcut['link'])): ?>
                            <a href="<?php echo $shortcut['link']; ?>" class="btn btn-primary btn-sm">
                                <i class="fa-solid fa-arrow-right"></i>
                            </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
