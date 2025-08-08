<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?> - GTTGN CMS</title>
    <link rel="icon" type="image/png" href="<?php echo base_url('assets/icons/favicon-adm.ico'); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <link rel="stylesheet" href="<?php echo base_url('assets/style/css/main-admin.css'); ?>">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="sidebar">
        <div class="sidebar__header">
            <h4 class="title page-sub-title">GTTGN Admin</h4>
        </div>
        <ul class="sidebar__menu">
            <li <?php if ($this->uri->segment(2) == 'dashboard') echo 'class="active"'; ?>><a href="<?php echo base_url('admin-gttgn/dashboard'); ?>"><i class="fas fa-tachometer-alt mr-2"></i>Dashboard</a></li>
            <li <?php if ($this->uri->segment(2) == 'administrator') echo 'class="active"'; ?>><a href="<?php echo base_url('admin-gttgn/administrator'); ?>"><i class="fas fa-users-cog mr-2"></i>User Administrator</a></li>
            <li <?php if ($this->uri->segment(2) == 'pic') echo 'class="active"'; ?>><a href="<?php echo base_url('admin-gttgn/pic'); ?>"><i class="fas fa-users mr-2"></i>User PIC</a></li>
            <li <?php if ($this->uri->segment(2) == 'hotel') echo 'class="active"'; ?>><a href="<?php echo base_url('admin-gttgn/hotel'); ?>"><i class="fas fa-hotel mr-2"></i>Hotel</a></li>
            <li <?php if ($this->uri->segment(2) == 'informasi') echo 'class="active"'; ?>><a href="<?php echo base_url('admin-gttgn/informasi'); ?>"><i class="fas fa-train mr-2"></i>Informasi</a></li>
            <li <?php if ($this->uri->segment(2) == 'rundown') echo 'class="active"'; ?>><a href="<?php echo base_url('admin-gttgn/rundown'); ?>"><i class="fas fa-calendar-alt mr-2"></i>Rundown</a></li>
            <li <?php if ($this->uri->segment(2) == 'faq') echo 'class="active"'; ?>><a href="<?php echo base_url('admin-gttgn/faq'); ?>"><i class="fas fa-question-circle mr-2"></i>FAQ</a></li>
            <li <?php if ($this->uri->segment(2) == 'kontak' && $this->uri->segment(3) == '') echo 'class="active"'; ?>><a href="<?php echo base_url('admin-gttgn/kontak'); ?>"><i class="fas fa-info-circle mr-2"></i>Kontak</a></li>
            <li <?php if ($this->uri->segment(2) == 'kontak' && strpos($this->uri->segment(3), 'submission') !== false) echo 'class="active"'; ?>><a href="<?php echo base_url('admin-gttgn/kontak/submission'); ?>"><i class="fas fa-envelope mr-2"></i>Pesan Kontak</a></li>
        </ul>
        <a class="sidebar__logout" href="<?php echo base_url('admin-gttgn/auth/logout'); ?>"><i class="fas fa-sign-out-alt mr-2"></i> Logout</a>
    </div>
    
    <div class="content">
        <nav class="navbar navbar-expand-lg navbar-light mb-4">
            <div class="ml-auto user-info">
                <span>Hi, <?php echo $admin_name; ?></span>
            </div>
        </nav>

        <div class="container-fluid">
            <div class="d-flex justify-content-between align-items-end mb-4">
                <h4 class="title page-sub-title mb-0"><?php echo $title; ?></h4>
                <?php if (isset($button_title)): ?>
                    <a href="<?php echo $button_title['url']; ?>" class="btn btn-primary btn-sm">
                        <?php echo $button_title['title']; ?>
                    </a>
                <?php endif; ?>
            </div>
            <?php if ($this->session->flashdata('success')): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?= $this->session->flashdata('success') ?>
                </div>
            <?php endif; ?>
    
            <?php if ($this->session->flashdata('error')): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?= $this->session->flashdata('error') ?>
                </div>
            <?php endif; ?>
        </div>
        