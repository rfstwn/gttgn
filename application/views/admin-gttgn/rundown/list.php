<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <?php if (empty($rundown)): ?>
                <div class="text-center py-5">
                    <i class="fas fa-calendar-alt fa-3x text-muted mb-3"></i>
                    <h5 class="text-muted">Belum ada jadwal kegiatan</h5>
                    <p class="text-muted">Klik tombol "Tambah Jadwal" untuk menambahkan jadwal pertama.</p>
                </div>
            <?php else: ?>
                <div class="table-responsive mt-0">
                    <table class="table table-bordered table-hover mb-0">
                        <thead class="thead-dark">
                            <tr>
                                <th width="15px" style="text-align:center;">No</th>
                                <th>Tanggal</th>
                                <th>Judul Kegiatan</th>
                                <th>Deskripsi</th>
                                <th width="150px" style="text-align:center;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($rundown as $index => $item): ?>
                                <tr>
                                    <td style="text-align:center;"><?= $index + 1 ?></td>
                                    <td>
                                        <span class="badge bg-info text-white">
                                            <?= date('d M Y', strtotime($item->event_date)) ?>
                                        </span>
                                    </td>
                                    <td>
                                        <strong><?= htmlspecialchars($item->event_title) ?></strong>
                                    </td>
                                    <td>
                                        <?= !empty($item->description) ? htmlspecialchars(substr($item->description, 0, 100)) . '...' : '<em>Tidak ada deskripsi</em>' ?>
                                    </td>
                                    <td style="text-align:center;">
                                        <div class="btn-group" role="group">
                                            <a href="<?= base_url('admin-gttgn/rundown/edit/' . $item->id) ?>" 
                                                class="btn btn-sm btn-outline-primary" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <button type="button" class="btn btn-sm btn-outline-danger" 
                                                    onclick="confirmDelete(<?= $item->id ?>, '<?= htmlspecialchars($item->event_title) ?>')" title="Hapus">
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

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Konfirmasi Hapus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda yakin ingin menghapus jadwal kegiatan <strong id="eventTitle"></strong>?</p>
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
function confirmDelete(id, title) {
    document.getElementById('eventTitle').textContent = title;
    document.getElementById('deleteLink').href = '<?= base_url('admin-gttgn/rundown/delete/') ?>' + id;
    new bootstrap.Modal(document.getElementById('deleteModal')).show();
}
</script>
