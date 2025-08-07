<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Kelola FAQ (Frequently Asked Questions)</h5>
                    <a href="<?= base_url('admin-gttgn/faq/add') ?>" class="btn btn-light btn-sm">
                        <i class="fas fa-plus"></i> Tambah FAQ
                    </a>
                </div>
                <div class="card-body">
                    
                    
                    <?php if (empty($faqs)): ?>
                        <div class="text-center py-5">
                            <i class="fas fa-question-circle fa-3x text-muted mb-3"></i>
                            <h5 class="text-muted">Belum ada FAQ</h5>
                            <p class="text-muted">Klik tombol "Tambah FAQ" untuk menambahkan pertanyaan pertama.</p>
                        </div>
                    <?php else: ?>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="table-dark">
                                    <tr>
                                        <th>Urutan</th>
                                        <th>Pertanyaan</th>
                                        <th>Jawaban</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($faqs as $faq): ?>
                                        <tr>
                                            <td>
                                                <span class="badge bg-secondary"><?= $faq->display_order ?></span>
                                            </td>
                                            <td>
                                                <strong><?= htmlspecialchars($faq->question) ?></strong>
                                            </td>
                                            <td>
                                                <?= htmlspecialchars(substr($faq->answer, 0, 100)) ?>
                                                <?= strlen($faq->answer) > 100 ? '...' : '' ?>
                                            </td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <a href="<?= base_url('admin-gttgn/faq/edit/' . $faq->id) ?>" 
                                                       class="btn btn-sm btn-outline-primary" title="Edit">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <button type="button" class="btn btn-sm btn-outline-danger" 
                                                            onclick="confirmDelete(<?= $faq->id ?>, '<?= htmlspecialchars($faq->question) ?>')" title="Hapus">
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
                <p>Apakah Anda yakin ingin menghapus FAQ <strong id="faqQuestion"></strong>?</p>
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
function confirmDelete(id, question) {
    document.getElementById('faqQuestion').textContent = question.substring(0, 50) + '...';
    document.getElementById('deleteLink').href = '<?= base_url('admin-gttgn/faq/delete/') ?>' + id;
    new bootstrap.Modal(document.getElementById('deleteModal')).show();
}
</script>
