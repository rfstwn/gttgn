<?php
$menu = [
    [
        'title' => 'Registrasi',
        'url' => '#registrasi',
        'icon' => 'fa fa-file-alt',
        'isActive' => ''
    ],
    [
        'title' => 'Rundown',
        'url' => '#rundown',
        'icon' => 'fa fa-calendar-alt',
        'isActive' => ''
    ],
    [
        'title' => 'Hotel',
        'url' => '#hotel',
        'icon' => 'fa fa-hotel',
        'isActive' => ''
    ],
    [
        'title' => 'Informasi',
        'url' => '#informasi',
        'icon' => 'fa fa-bullhorn',
        'isActive' => ''
    ],
    [
        'title' => 'Produk',
        'url' => base_url('/produk'),
        'icon' => 'fa fa-star',
        'isActive' => ($menu_segments == 'produk') ? 'active' : ''
    ],
    [
        'title' => 'Kontak',
        'url' => '#kontak',
        'icon' => 'fa fa-address-book',
        'isActive' => ''
    ]
]
?>

<nav class="main-navbar <?= isset($isSticky) ? 'is-sticky' : 'not-sticky' ?>">
    <a class="nav-logo" href="<?= base_url() ?>">
        <img src="<?= base_url('assets/image/gttgn-logo.png') ?>" alt="gttgn-logo" />
    </a>
    <ul class="nav">
        <?php foreach ($menu as $key => $value) : ?>
            <li class="nav-item">
                <a class="nav-link <?= $value['isActive'] ?>" href="<?= $value['url'] ?>">
                    <i class="<?= $value['icon'] ?>"></i>
                    <span><?= $value['title'] ?></span>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</nav>