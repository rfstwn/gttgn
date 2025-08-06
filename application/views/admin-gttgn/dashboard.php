<div class="container-fluid">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Dashboard</h5>
        </div>
        <div class="card-body">
            <h5 class="mb-0">Selamat datang di GTTGN Admin CMS</h5>
            <p><small>Gunakan sidebar menu untuk mengelola konten website, dan berikut adalah beberapa informasi sederhana.</small></p>
            
            <div class="shortcut-dashboard">
                <div class="card bg-light">
                    <div class="card-body">
                        <h5 class="card-title">User Registrasi</h5>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="card-text"><?php echo $user_count; ?> <small>user</small></span>
                            <a href="<?php echo base_url('admin-gttgn/user-data'); ?>" class="btn btn-primary">
                                <i class="fa-solid fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card bg-light">
                    <div class="card-body">
                        <h5 class="card-title">Pesan Kontak (new)</h5>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="card-text"><? echo $new_contact_submission_count; ?> <small>Pesan</small></span>
                            <a href="<?php echo base_url('admin-gttgn/contact-submissions'); ?>" class="btn btn-primary">
                                <i class="fa-solid fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
