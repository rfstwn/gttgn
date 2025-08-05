<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - GTTGN CMS</title>
    <link rel="icon" type="image/png" href="<?php echo base_url('assets/icons/favicon-adm.ico'); ?>">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/style/css/main-admin.css'); ?>">
</head>
<body>
    <div class="login-container">
        <div class="card-login">
            <h4 class="title page-sub-title">GTTGN Admin Login</h4>
            <form action="<?php echo base_url('admin/auth/login'); ?>" method="post" class="form-wrapper">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                </div>

                <div class="d-flex justify-content-start align-items-end">
                    <button type="submit" class="btn btn-light">Login</button>
                    <span class="ml-2 d-block">
                        <?php if($this->session->flashdata('error')): ?>
                            <small class="text-danger">
                                <?php echo $this->session->flashdata('error'); ?>
                            </small>
                        <?php endif; ?>
                        
                        <?php if($this->session->flashdata('success')): ?>
                            <small class="text-success">
                                <?php echo $this->session->flashdata('success'); ?>
                            </small>
                        <?php endif; ?>
                    </span>
                </div>
            </form>
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
