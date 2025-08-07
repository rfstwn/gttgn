<div class="container-fluid">
    <div class="card mb-4">
        <div class="card-body">
            <form action="<?= base_url('admin-gttgn/informasi/edit_informasi_process') ?>" method="post">
                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="address" class="form-label">Alamat</label>
                            <textarea class="form-control <?= form_error('address') ? 'is-invalid' : '' ?>" 
                                        id="address" name="address" rows="3"><?= set_value('address', $content['address'] ?? '') ?></textarea>
                            <?php if (form_error('address')): ?>
                                <div class="invalid-feedback"><?= form_error('address') ?></div>
                            <?php endif; ?>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Deskripsi Informasi</label>
                            <textarea class="form-control <?= form_error('description') ? 'is-invalid' : '' ?>" 
                                        id="description" name="description" rows="3"><?= set_value('description', $content['description'] ?? '') ?></textarea>
                            <?php if (form_error('description')): ?>
                                <div class="invalid-feedback"><?= form_error('description') ?></div>
                            <?php endif; ?>
                        </div>
                        <button type="submit" class="btn btn-primary">
                            Simpan Perubahan
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    
    <div class="d-flex justify-content-between align-items-end mb-3">
        <h2 class="title page-sub-title mb-0">List Transportasi</h2>
        <a href="<?= base_url('admin-gttgn/informasi/add_transportation') ?>" class="btn btn-primary btn-sm">
            Tambah Transportasi
        </a>
    </div>
    <div class="card">
        <div class="card-body">
            <?php if (empty($transportation)): ?>
                <div class="text-center py-5">
                    <i class="fas fa-bus fa-3x text-muted mb-3"></i>
                    <h5 class="text-muted">Belum ada data transportasi</h5>
                    <p class="text-muted">Klik tombol "Tambah Transportasi" untuk menambah data baru</p>
                </div>
            <?php else: ?>
                <div class="table-responsive mt-0">
                    <table class="table table-bordered table-hover mb-0">
                        <thead class="thead-dark">
                            <tr>
                                <th width="15px" style="text-align: center;">No</th>
                                <th width="15%">Nama</th>
                                <th width="10%">Icon</th>
                                <th width="15%">Gambar</th>
                                <th width="25%">Deskripsi</th>
                                <th width="8%">Urutan</th>
                                <th width="8%">Status</th>
                                <th width="150px" style="text-align: center;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($transportation as $index => $item): ?>
                                <tr>
                                    <td style="text-align: center;"><?= $index + 1 ?></td>
                                    <td><?= htmlspecialchars($item['name']) ?></td>
                                    <td>
                                        <i class="fa <?= htmlspecialchars($item['icon']) ?>"></i>
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
                                        <span class="badge bg-secondary text-white"><?= $item['order_position'] ?></span>
                                    </td>
                                    <td>
                                        <?php if ($item['is_active']): ?>
                                            <span class="badge bg-success text-white">Aktif</span>
                                        <?php else: ?>
                                            <span class="badge bg-danger text-white">Nonaktif</span>
                                        <?php endif; ?>
                                    </td>
                                    <td style="text-align: center;">
                                        <div class="btn-group" role="group">
                                            <a href="<?= base_url('admin-gttgn/informasi/edit_transportation/' . $item['id']) ?>" 
                                                class="btn btn-sm btn-outline-warning" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="<?= base_url('admin-gttgn/informasi/toggle_transportation/' . $item['id']) ?>" 
                                                class="btn btn-sm <?= $item['is_active'] ? 'btn-outline-secondary' : 'btn-outline-success' ?>" 
                                                title="<?= $item['is_active'] ? 'Nonaktifkan' : 'Aktifkan' ?>"
                                                onclick="return confirm('Yakin ingin mengubah status transportasi ini?')">
                                                <i class="fas fa-<?= $item['is_active'] ? 'eye-slash' : 'eye' ?>"></i>
                                            </a>
                                            <a href="<?= base_url('admin-gttgn/informasi/delete_transportation/' . $item['id']) ?>" 
                                                class="btn btn-sm btn-outline-danger" title="Hapus"
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
