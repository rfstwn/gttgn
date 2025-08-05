<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title">Kelola Transportasi</h3>
                    <a href="<?= base_url('4dm1n/dashboard/add_transportation') ?>" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Tambah Transportasi
                    </a>
                </div>
                
                <div class="card-body">
                    
                    
                    <div class="mb-3">
                        <a href="<?= base_url('admin/informasi') ?>" class="btn btn-info">
                            <i class="fas fa-edit"></i> Kelola Konten Informasi
                        </a>
                    </div>
                    
                    <?php if (empty($transportation)): ?>
                        <div class="text-center py-5">
                            <i class="fas fa-bus fa-3x text-muted mb-3"></i>
                            <h5 class="text-muted">Belum ada data transportasi</h5>
                            <p class="text-muted">Klik tombol "Tambah Transportasi" untuk menambah data baru</p>
                        </div>
                    <?php else: ?>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th width="5%">No</th>
                                        <th width="15%">Nama</th>
                                        <th width="10%">Icon</th>
                                        <th width="15%">Gambar</th>
                                        <th width="25%">Deskripsi</th>
                                        <th width="8%">Urutan</th>
                                        <th width="8%">Status</th>
                                        <th width="14%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($transportation as $index => $item): ?>
                                        <tr>
                                            <td><?= $index + 1 ?></td>
                                            <td><?= htmlspecialchars($item['name']) ?></td>
                                            <td>
                                                <i class="<?= htmlspecialchars($item['icon']) ?>"></i>
                                                <small class="d-block text-muted"><?= htmlspecialchars($item['icon']) ?></small>
                                            </td>
                                            <td>
                                                <img src="<?= base_url('assets/image/' . $item['image']) ?>" 
                                                     alt="<?= htmlspecialchars($item['name']) ?>" 
                                                     class="img-thumbnail" style="max-width: 60px; max-height: 60px;">
                                                <small class="d-block text-muted"><?= htmlspecialchars($item['image']) ?></small>
                                            </td>
                                            <td>
                                                <div class="text-truncate" style="max-width: 200px;" title="<?= htmlspecialchars($item['description_1']) ?>">
                                                    <?= htmlspecialchars(substr($item['description_1'], 0, 100)) ?><?= strlen($item['description_1']) > 100 ? '...' : '' ?>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="badge bg-secondary"><?= $item['order_position'] ?></span>
                                            </td>
                                            <td>
                                                <?php if ($item['is_active']): ?>
                                                    <span class="badge bg-success">Aktif</span>
                                                <?php else: ?>
                                                    <span class="badge bg-danger">Nonaktif</span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <a href="<?= base_url('4dm1n/dashboard/edit_transportation/' . $item['id']) ?>" 
                                                       class="btn btn-sm btn-warning" title="Edit">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <a href="<?= base_url('4dm1n/dashboard/toggle_transportation/' . $item['id']) ?>" 
                                                       class="btn btn-sm <?= $item['is_active'] ? 'btn-secondary' : 'btn-success' ?>" 
                                                       title="<?= $item['is_active'] ? 'Nonaktifkan' : 'Aktifkan' ?>"
                                                       onclick="return confirm('Yakin ingin mengubah status transportasi ini?')">
                                                        <i class="fas fa-<?= $item['is_active'] ? 'eye-slash' : 'eye' ?>"></i>
                                                    </a>
                                                    <a href="<?= base_url('4dm1n/dashboard/delete_transportation/' . $item['id']) ?>" 
                                                       class="btn btn-sm btn-danger" title="Hapus"
                                                       onclick="return confirm('Yakin ingin menghapus transportasi ini?')">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </div>
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
