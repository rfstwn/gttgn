<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?> - GTTGN CMS</title>
    <link rel="icon" type="image/png" href="<?php echo base_url('assets/icons/favicon-adm.ico'); ?>">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <link rel="stylesheet" href="<?php echo base_url('assets/style/css/main-admin.css'); ?>">
</head>
<body>
    <div class="sidebar">
        <div class="sidebar__header">
            <h4 class="title page-sub-title">GTTGN Admin</h4>
        </div>
        <ul class="sidebar__menu">
            <li><a href="<?php echo base_url('admin-gttgn/dashboard'); ?>"><i class="fas fa-tachometer-alt mr-2"></i>Dashboard</a></li>
            <li><a href="<?php echo base_url('admin-gttgn/administrator'); ?>"><i class="fas fa-users-cog mr-2"></i>User Administrator</a></li>
            <li><a href="<?php echo base_url('admin-gttgn/pic'); ?>"><i class="fas fa-users mr-2"></i>User PIC</a></li>
            <li><a href="<?php echo base_url('admin-gttgn/hotel'); ?>"><i class="fas fa-hotel mr-2"></i>Hotel</a></li>
            <li><a href="<?php echo base_url('admin-gttgn/informasi'); ?>"><i class="fas fa-train mr-2"></i>Informasi</a></li>
            <li><a href="<?php echo base_url('admin-gttgn/rundown'); ?>"><i class="fas fa-calendar-alt mr-2"></i>Rundown</a></li>
            <li><a href="<?php echo base_url('admin-gttgn/faq'); ?>"><i class="fas fa-question-circle mr-2"></i>FAQ</a></li>
            <li><a href="<?php echo base_url('admin-gttgn/kontak'); ?>"><i class="fas fa-info-circle mr-2"></i>Kontak</a></li>
            <li><a href="<?php echo base_url('admin-gttgn/kontak/submission'); ?>"><i class="fas fa-envelope mr-2"></i>Pesan Kontak</a></li>
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
            <div class="row">
                <div class="col-md-12">
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
            </div>
        </div>