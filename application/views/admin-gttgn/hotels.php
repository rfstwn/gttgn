<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Kelola Hotel</h5>
                    <a href="<?= base_url('admin-gttgn/dashboard/add_hotel') ?>" class="btn btn-light btn-sm">
                        <i class="fas fa-plus"></i> Tambah Hotel
                    </a>
                </div>
                <div class="card-body">
                    
                    
                    <?php if (empty($hotels)): ?>
                        <div class="text-center py-5">
                            <i class="fas fa-hotel fa-3x text-muted mb-3"></i>
                            <h5 class="text-muted">Belum ada data hotel</h5>
                            <p class="text-muted">Klik tombol "Tambah Hotel" untuk menambahkan hotel pertama.</p>
                        </div>
                    <?php else: ?>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="table-dark">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Hotel</th>
                                        <th>Alamat</th>
                                        <th>Telepon</th>
                                        <th>Rating</th>
                                        <th>Koordinat</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($hotels as $index => $hotel): ?>
                                        <tr>
                                            <td><?= $index + 1 ?></td>
                                            <td>
                                                <strong><?= htmlspecialchars($hotel->name) ?></strong>
                                            </td>
                                            <td><?= htmlspecialchars($hotel->address) ?></td>
                                            <td><?= htmlspecialchars($hotel->phone) ?></td>
                                            <td>
                                                <div class="stars">
                                                    <?php for ($i = 1; $i <= 5; $i++): ?>
                                                        <i class="fas fa-star <?= $i <= $hotel->stars ? 'text-warning' : 'text-muted' ?>"></i>
                                                    <?php endfor; ?>
                                                    <span class="ms-1">(<?= $hotel->stars ?>)</span>
                                                </div>
                                            </td>
                                            <td>
                                                <small>
                                                    Lat: <?= $hotel->latitude ?><br>
                                                    Lng: <?= $hotel->longitude ?>
                                                </small>
                                            </td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <a href="<?= base_url('admin-gttgn/dashboard/edit_hotel/' . $hotel->id) ?>" 
                                                       class="btn btn-sm btn-outline-primary" title="Edit">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <a href="https://www.google.com/maps/dir/?api=1&destination=<?= $hotel->latitude ?>,<?= $hotel->longitude ?>" 
                                                       class="btn btn-sm btn-outline-info" title="Lihat di Maps" target="_blank">
                                                        <i class="fas fa-map-marker-alt"></i>
                                                    </a>
                                                    <button type="button" class="btn btn-sm btn-outline-danger" 
                                                            onclick="confirmDelete(<?= $hotel->id ?>, '<?= htmlspecialchars($hotel->name) ?>')" title="Hapus">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
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

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Konfirmasi Hapus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda yakin ingin menghapus hotel <strong id="hotelName"></strong>?</p>
                <p class="text-danger"><small>Tindakan ini tidak dapat dibatalkan.</small></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <a href="#" id="deleteLink" class="btn btn-danger">Hapus</a>
            </div>
        </div>
    </div>
</div>

<script>
function confirmDelete(id, name) {
    document.getElementById('hotelName').textContent = name;
    document.getElementById('deleteLink').href = '<?= base_url('admin-gttgn/dashboard/delete_hotel/') ?>' + id;
    new bootstrap.Modal(document.getElementById('deleteModal')).show();
}
</script>
