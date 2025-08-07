<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Pesan Kontak dari Website</h5>
                </div>
                <div class="card-body">
                    
                    
                    <?php if (empty($submissions)): ?>
                        <div class="text-center py-5">
                            <i class="fas fa-envelope fa-3x text-muted mb-3"></i>
                            <h5 class="text-muted">Belum ada pesan masuk</h5>
                            <p class="text-muted">Pesan dari formulir kontak akan muncul di sini.</p>
                        </div>
                    <?php else: ?>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="table-dark">
                                    <tr>
                                        <th>Status</th>
                                        <th>Tanggal</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Subjek</th>
                                        <th>Pesan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($submissions as $submission): ?>
                                        <tr class="<?= $submission->status == 'unread' ? 'table-warning' : '' ?>">
                                            <td>
                                                <?php
                                                $status_class = [
                                                    'new' => 'bg-primary',
                                                    'read' => 'bg-info',
                                                ];
                                                $status_text = [
                                                    'new' => 'Baru',
                                                    'read' => 'Dibaca',
                                                ];
                                                ?>
                                                <span class="badge <?= $status_class[$submission->status] ?>">
                                                    <?= $status_text[$submission->status] ?>
                                                </span>
                                            </td>
                                            <td>
                                                <small><?= date('d/m/Y H:i', strtotime($submission->created_at)) ?></small>
                                            </td>
                                            <td><?= htmlspecialchars($submission->name) ?></td>
                                            <td><?= htmlspecialchars($submission->email) ?></td>
                                            <td><?= htmlspecialchars($submission->subject) ?></td>
                                            <td>
                                                <?= htmlspecialchars(substr($submission->message, 0, 50)) ?>
                                                <?= strlen($submission->message) > 50 ? '...' : '' ?>
                                            </td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <a href="<?= base_url('admin-gttgn/kontak/submission_detail/' . $submission->id) ?>" 
                                                       class="btn btn-sm btn-outline-primary" title="Lihat Detail">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <button type="button" class="btn btn-sm btn-outline-danger" 
                                                            onclick="confirmDelete(<?= $submission->id ?>, '<?= htmlspecialchars($submission->name) ?>')" title="Hapus">
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
                <p>Apakah Anda yakin ingin menghapus pesan dari <strong id="senderName"></strong>?</p>
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
    document.getElementById('senderName').textContent = name;
    document.getElementById('deleteLink').href = '<?= base_url('admin-gttgn/kontak/delete_submission/') ?>' + id;
    new bootstrap.Modal(document.getElementById('deleteModal')).show();
}
</script>
