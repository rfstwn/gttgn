<?php 
    ci()->load->view('templates/header', ['title' => 'Dashboard PIC']); 
    ci()->load->view('templates/nav'); 
?>
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Dashboard PIC</h2>
        <span class="me-3">Selamat datang, <strong><?= $user->nama_lengkap ?></strong></span>
    </div>

    <div class="row">
        <!-- User Participants Section -->
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Paserta</h5>
                    <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addParticipantModal">
                        <i class="fas fa-plus"></i> Tambah Participant
                    </button>
                </div>
                <div class="card-body">
                    <?php if(empty($participants)): ?>
                        <p class="text-muted">Belum ada participant yang ditambahkan.</p>
                    <?php else: ?>
                        <div class="table-responsive">
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th>Nama Lengkap</th>
                                        <th>No. WhatsApp</th>
                                        <th>Jabatan</th>
                                        <th>Status</th>
                                        <th>Tanggal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($participants as $participant): ?>
                                        <tr>
                                            <td><?= htmlspecialchars($participant->nama_lengkap) ?></td>
                                            <td><?= htmlspecialchars($participant->no_whatsapp) ?></td>
                                            <td><?= htmlspecialchars($participant->jabatan) ?></td>
                                            <td>
                                                <a href="<?= base_url('user/toggle_participant_presence/' . $participant->id) ?>" 
                                                   class="badge <?= $participant->is_present ? 'bg-success' : 'bg-secondary' ?> text-decoration-none"
                                                   onclick="return confirm('Apakah Anda yakin ingin mengubah status kehadiran?')"
                                                   title="Klik untuk mengubah status kehadiran">
                                                    <?= $participant->is_present ? 'Hadir' : 'Tidak Hadir' ?>
                                                </a>
                                            </td>
                                            <td><?= date('d/m/Y H:i', strtotime($participant->created_at)) ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        
        <!-- Tenants Section -->
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">List Tenant</h5>
                    <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#addTenantModal">
                        <i class="fas fa-plus"></i> Tambah Tenant
                    </button>
                </div>
                <div class="card-body">
                    <?php if(empty($tenants)): ?>
                        <p class="text-muted">Belum ada tenant yang ditambahkan.</p>
                    <?php else: ?>
                        <div class="table-responsive">
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th>Nama Tenant</th>
                                        <th>Tanggal Dibuat</th>
                                        <th width="100px">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($tenants as $tenant): ?>
                                        <tr>
                                            <td><?= htmlspecialchars($tenant->nama_tenant) ?></td>
                                            <td><?= date('d/m/Y H:i', strtotime($tenant->created_at)) ?></td>
                                            <td>
                                                <a type="button" class="badge bg-primary text-decoration-none" 
                                                        data-bs-toggle="modal" 
                                                        data-bs-target="#tenantDetailModal"
                                                        onclick="loadTenantDetail(<?= $tenant->id ?>)">
                                                    <i class="fa fa-eye"></i> Detail
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        
        <!-- Products Section -->
        <div class="col-md-12 mb-4">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">List Produk</h5>
                    <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#addProductModal">
                        <i class="fas fa-plus"></i> Tambah Produk
                    </button>
                </div>
                <div class="card-body">
                    <?php if(empty($products)): ?>
                        <p class="text-muted">Belum ada produk yang ditambahkan.</p>
                    <?php else: ?>
                        <div class="table-responsive">
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th>Gambar</th>
                                        <th>Nama Produk</th>
                                        <th>Tenant</th>
                                        <th>Deskripsi</th>
                                        <th>Video</th>
                                        <th>Katalog</th>
                                        <th>Tanggal</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($products as $product): ?>
                                        <tr>
                                            <td>
                                                <?php if($product->image_1): ?>
                                                    <img src="<?= base_url('assets/image/produk/' . $product->image_1) ?>" 
                                                         alt="<?= htmlspecialchars($product->name) ?>" 
                                                         class="img-thumbnail" style="width: 50px; height: 50px; object-fit: cover;">
                                                <?php else: ?>
                                                    <span class="text-muted">No Image</span>
                                                <?php endif; ?>
                                            </td>
                                            <td><?= htmlspecialchars($product->name) ?></td>
                                            <td><?= htmlspecialchars($product->nama_tenant) ?></td>
                                            <td><?= htmlspecialchars(substr($product->description, 0, 50)) ?><?= strlen($product->description) > 50 ? '...' : '' ?></td>
                                            <td>
                                                <?php if($product->video): ?>
                                                    <a href="<?= htmlspecialchars($product->video) ?>" target="_blank" class="btn btn-sm btn-outline-primary">
                                                        <i class="fas fa-play"></i>
                                                    </a>
                                                <?php else: ?>
                                                    <span class="text-muted">-</span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php if($product->katalog): ?>
                                                    <a href="<?= base_url('assets/image/produk/' . $product->katalog) ?>" target="_blank" class="btn btn-sm btn-outline-success">
                                                        <i class="fas fa-file-pdf"></i>
                                                    </a>
                                                <?php else: ?>
                                                    <span class="text-muted">-</span>
                                                <?php endif; ?>
                                            </td>
                                            <td><?= date('d/m/Y H:i', strtotime($product->created_at)) ?></td>
                                            <td>
                                                <a href="<?= base_url('user/edit_product/' . $product->id) ?>" class="btn btn-sm btn-warning">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a href="<?= base_url('user/delete_product/' . $product->id) ?>" 
                                                   class="btn btn-sm btn-danger" 
                                                   onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php ci()->load->view('templates/footer'); ?>
<?php ci()->load->view('modal/add_tenant_form'); ?>
<?php ci()->load->view('modal/add_participant_form'); ?>
<?php ci()->load->view('modal/add_product_form'); ?>
<?php ci()->load->view('modal/tenant_detail_modal'); ?>