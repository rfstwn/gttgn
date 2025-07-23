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
        'url' => $menu_segments == 'home' || $menu_segments == '' ? '#rundown' : base_url('/home#rundown'),
        'icon' => 'fa fa-calendar-alt',
        'isActive' => ''
    ],
    [
        'title' => 'Hotel',
        'url' => $menu_segments == 'hotel' ? '#' : base_url('/hotel'),
        'icon' => 'fa fa-hotel',
        'isActive' => ($menu_segments == 'hotel') ? 'active' : ''
    ],
    [
        'title' => 'Informasi',
        'url' => $menu_segments == 'informasi' ? '#' : base_url('/informasi'),
        'icon' => 'fa fa-bullhorn',
        'isActive' => ($menu_segments == 'informasi') ? 'active' : ''
    ],
    [
        'title' => 'Produk',
        'url' => $menu_segments == 'produk' ? '#' : base_url('/produk'),
        'icon' => 'fa fa-star',
        'isActive' => ($menu_segments == 'produk') ? 'active' : ''
    ],
    [
        'title' => 'Kontak',
        'url' => $menu_segments == 'kontak' ? '#' : base_url('/kontak'),
        'icon' => 'fa fa-address-book',
        'isActive' => ($menu_segments == 'kontak') ? 'active' : ''
    ]
]
?>

<nav class="d-md-flex d-none main-navbar <?= isset($isSticky) ? 'is-sticky' : 'not-sticky' ?>">
    <a class="nav-logo" href="<?= base_url() ?>">
        <img src="<?= base_url(isset($isSticky) ? 'assets/image/gttgn-logo.png' : 'assets/image/gttgn-logo-black.png') ?>" alt="gttgn-logo" />
    </a>
    <ul class="nav">
        <?php foreach ($menu as $key => $value) : ?>
            <li class="nav-item">
                <a class="nav-link <?= $value['isActive'] ?>" href="<?= $value['url'] ?>">
                    <i class="<?= $value['icon'] ?> nav-icon"></i>
                    <span><?= $value['title'] ?></span>
                </a>
            </li>
        <?php endforeach; ?>

        <?php if (!isset($isSticky)) : ?>
            <li class="nav-item">
                <button class="button botton-login-on-nav" id="loginButton" data-bs-toggle="modal" data-bs-target="#loginModal">
                    <i class="fa fa-circle-user"></i>Login Peserta
                </button>
            </li>
        <?php endif; ?>
    </ul>
</nav>

<nav class="d-sm-block d-md-none navbar navbar-expand-lg navbar-light menu-mobile">
    <div class="container-fluid">
        <div class="navbar-trigger">
            <a class="navbar-brand" href="<?= base_url() ?>">
                <img src="<?= base_url('assets/image/gttgn-logo-black.png') ?>" alt="gttgn-logo" />
            </a>

            <!-- Hamburger toggle button -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
        </div>

        <!-- Collapsible content -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <?php foreach ($menu as $key => $value) : ?>
                    <li class="nav-item">
                        <a class="nav-link <?= $value['isActive'] ?>" aria-current="page" href="<?= $value['url'] ?>">
                            <i class="<?= $value['icon'] ?> nav-icon"></i>
                            <span><?= $value['title'] ?></span>
                        </a>
                    </li>
                <?php endforeach; ?>
                <li class="nav-item">
                    <a href="#" class="nav-link" data-bs-toggle="modal" data-bs-target="#loginModal">
                        <i class="fa fa-circle-user nav-icon"></i>
                        <span>Login</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
