<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - GTTGN CMS</title>
    <link rel="icon" type="image/png" href="<?php echo base_url('assets/icons/favicon-adm.ico'); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <link rel="stylesheet" href="<?php echo base_url('assets/style/css/main-admin.css'); ?>">
</head>
<body>
    <div class="login-container">
        <div class="card-login">
            <h4 class="title page-sub-title">GTTGN Admin Login</h4>
            <form action="<?php echo base_url('admin-gttgn/auth/login'); ?>" method="post" class="form-wrapper">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <div class="password-wrapper">
                        <input type="password" name="password" id="password" class="form-control" required>
                        <button class="btn btn-outline-secondary toggle-password" type="button" tabindex="-1">
                            <i class="fa fa-eye-slash" aria-hidden="true"></i>
                        </button>
                    </div>
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
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>    <script>
        // Password Toggle Functionality
        // =========================================
        $(".toggle-password").click(function() {
            var input = $(this).closest('.password-wrapper').find('input');
            var icon = $(this).find('i');
            
            if (input.attr("type") === "password") {
                input.attr("type", "text");
                icon.removeClass("fa-eye-slash").addClass("fa-eye");
            } else {
                input.attr("type", "password");
                icon.removeClass("fa-eye").addClass("fa-eye-slash");
            }
        });
    </script>
</body>
</html>
