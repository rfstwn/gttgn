<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h6><i class="fas fa-user text-primary"></i> Informasi Pengirim</h6>
                    <table class="table table-borderless">
                        <tr>
                            <td width="30%"><strong>Nama:</strong></td>
                            <td><?= htmlspecialchars($submission->name) ?></td>
                        </tr>
                        <tr>
                            <td><strong>Email:</strong></td>
                            <td>
                                <a href="mailto:<?= htmlspecialchars($submission->email) ?>">
                                    <?= htmlspecialchars($submission->email) ?>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Telepon:</strong></td>
                            <td>
                                <?php if (!empty($submission->phone)): ?>
                                    <a href="tel:<?= htmlspecialchars($submission->phone) ?>">
                                        <?= htmlspecialchars($submission->phone) ?>
                                    </a>
                                <?php else: ?>
                                    <em>Tidak disediakan</em>
                                <?php endif; ?>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-6">
                    <h6><i class="fas fa-info-circle text-primary"></i> Informasi Pesan</h6>
                    <table class="table table-borderless">
                        <tr>
                            <td width="30%"><strong>Subjek:</strong></td>
                            <td><?= htmlspecialchars($submission->subject) ?></td>
                        </tr>
                        <tr>
                            <td><strong>Tanggal:</strong></td>
                            <td><?= date('d F Y H:i', strtotime($submission->created_at)) ?> WIB</td>
                        </tr>
                        <tr>
                            <td><strong>Status:</strong></td>
                            <td>
                                <?php if ($submission->status == 'new'): ?>
                                    <span class="badge bg-primary">Baru</span>
                                <?php else: ?>
                                    <span class="badge bg-info">Dibaca</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            
            <hr>
            
            <div class="row">
                <div class="col-md-12">
                    <h6><i class="fas fa-envelope text-primary"></i> Isi Pesan</h6>
                    <div class="card bg-light">
                        <div class="card-body">
                            <p class="mb-0"><?= nl2br(htmlspecialchars($submission->message)) ?></p>
                        </div>
                    </div>
                </div>
            </div>
            
            <hr>
            
            <div class="d-flex justify-content-between align-items-center">
                <a href="<?= base_url('admin-gttgn/kontak/submission') ?>" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Kembali ke Daftar
                </a>
                
                <div class="btn-group">
                    <?php if ($submission->status == 'new'): ?>
                        <a href="<?= base_url('admin-gttgn/kontak/update_submission_status/' . $submission->id . '/read') ?>" 
                            class="btn btn-info">
                            <i class="fas fa-eye"></i> Tandai Dibaca
                        </a>
                    <?php endif; ?>
                    
                    <button type="button" class="btn btn-danger" onclick="confirmDelete()" title="Hapus">
                        <i class="fas fa-trash"></i> Hapus
                    </button>
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
                <p>Apakah Anda yakin ingin menghapus pesan dari <strong><?= htmlspecialchars($submission->name) ?></strong>?</p>
                <p class="text-muted">Tindakan ini tidak dapat dibatalkan.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <a href="<?= base_url('admin-gttgn/kontak/delete_submission/' . $submission->id) ?>" 
                   class="btn btn-danger">Ya, Hapus</a>
            </div>
        </div>
    </div>
</div>

<script>
function confirmDelete() {
    new bootstrap.Modal(document.getElementById('deleteModal')).show();
}
</script>