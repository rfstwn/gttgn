<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Dashboard</h5>
                </div>
                <div class="card-body">
                    <h5>Selamat datang di GTTGN Admin CMS</h5>
                    <p>Gunakan menu di sebelah kiri untuk mengelola user admin.</p>
                    
                    <div class="shortcut-dashboard">
                        <div class="card bg-info text-white">
                            <div class="card-body">
                                <h5 class="card-title">Manajemen User</h5>
                                <small class="card-text">Kelola user admin sistem</small>
                                <a href="<?php echo base_url('admin/users'); ?>" class="btn btn-light">Kelola User</a>
                            </div>
                        </div>
                        <div class="card bg-success text-white">
                            <div class="card-body">
                                <h5 class="card-title">Informasi Registrasi User</h5>
                                <small class="card-text">Saat ini ada <?php echo $user_count; ?> user yang terdaftar.</small>
                                <a href="<?php echo base_url('admin/user-data'); ?>" class="btn btn-light">Kelola User</a>
                            </div>
                        </div>
                        <div class="card bg-info text-white">
                            <div class="card-body">
                                <h5 class="card-title">Contact Info</h5>
                                <small class="card-text">Kelola informasi kontak website</small>
                                <a href="<?= base_url('4dm1n/dashboard/contact_info') ?>" class="btn btn-light">Kelola Kontak</a>
                            </div>
                        </div>
                        <div class="card bg-success text-white">
                            <div class="card-body">
                                <h5 class="card-title">Rundown Events</h5>
                                <small class="card-text">Kelola jadwal acara</small>
                                <a href="<?= base_url('4dm1n/dashboard/rundown') ?>" class="btn btn-light">Kelola Jadwal</a>
                            </div>
                        </div>
                        <div class="card bg-warning text-dark">
                            <div class="card-body">
                                <h5 class="card-title">FAQ Management</h5>
                                <small class="card-text">Kelola pertanyaan yang sering diajukan</small>
                                <a href="<?= base_url('4dm1n/dashboard/faq') ?>" class="btn btn-dark">Kelola FAQ</a>
                            </div>
                        </div>
                        <div class="card bg-danger text-white">
                            <div class="card-body">
                                <h5 class="card-title">Contact Submissions</h5>
                                <small class="card-text">Kelola pesan yang masuk</small>
                                <a href="<?= base_url('4dm1n/dashboard/contact_submissions') ?>" class="btn btn-light">Lihat Pesan</a>
                            </div>
                        </div>
                        <div class="card bg-warning text-dark">
                            <div class="card-body">
                                <h5 class="card-title">Kelola Hotel</h5>
                                <small class="card-text">Kelola informasi hotel yang ditampilkan di website</small>
                                <a href="<?= base_url('4dm1n/dashboard/hotels') ?>" class="btn btn-dark">Kelola Hotel</a>
                            </div>
                        </div>
                        <div class="card bg-primary text-white">
                            <div class="card-body">
                                <h5 class="card-title">Kelola Informasi</h5>
                                <small class="card-text">Kelola konten halaman informasi dan transportasi</small>
                                <a href="<?= base_url('4dm1n/dashboard/informasi_content') ?>" class="btn btn-light">Kelola Informasi</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
