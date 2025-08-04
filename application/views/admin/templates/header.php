<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?> - GTTGN CMS</title>
    <link rel="icon" type="image/png" href="<?php echo base_url('assets/icons/favicon-adm.ico'); ?>">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/style/css/main-admin.css'); ?>">
</head>
<body>
    <div class="sidebar">
        <div class="sidebar-header">
            <h4>GTTGN Admin</h4>
        </div>
        <ul class="sidebar-menu">
            <li><a href="<?php echo base_url('admin/dashboard'); ?>"><i class="fas fa-tachometer-alt mr-2"></i> Dashboard</a></li>
            <li><a href="<?php echo base_url('admin/user-admin'); ?>"><i class="fas fa-users-cog mr-2"></i> Manajemen Admin</a></li>
            <li><a href="<?php echo base_url('admin/user-data'); ?>"><i class="fas fa-users mr-2"></i> Data Registrasi User</a></li>
            <li class="divider"></li>
            <li><a href="<?php echo base_url('admin/auth/logout'); ?>"><i class="fas fa-sign-out-alt mr-2"></i> Logout</a></li>
        </ul>
    </div>
    
    <div class="content">
        <nav class="navbar navbar-expand-lg navbar-light mb-4">
            <h4 class="mb-0"><?php echo $title; ?></h4>
            <div class="ml-auto user-info">
                <i class="fas fa-user"></i>
                <span>Selamat datang, <?php echo $admin_name; ?></span>
            </div>
        </nav>
        
        <?php if($this->session->flashdata('error')): ?>
            <div class="alert alert-danger">
                <?php echo $this->session->flashdata('error'); ?>
            </div>
        <?php endif; ?>
        
        <?php if($this->session->flashdata('success')): ?>
            <div class="alert alert-success">
                <?php echo $this->session->flashdata('success'); ?>
            </div>
        <?php endif; ?>
