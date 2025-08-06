<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-success text-white">
                    <h5 class="mb-0">Tambah FAQ Baru</h5>
                </div>
                <div class="card-body">
                    <?php if (validation_errors()): ?>
                        <div class="alert alert-danger">
                            <?= validation_errors() ?>
                        </div>
                    <?php endif; ?>
                    
                    <form method="post" action="<?= base_url('admin-gttgn/dashboard/save_faq') ?>">
                        <div class="mb-3">
                            <label for="question" class="form-label">Pertanyaan <span class="text-danger">*</span></label>
                            <textarea class="form-control" id="question" name="question" rows="3" 
                                      placeholder="Masukkan pertanyaan yang sering ditanyakan..." required><?= set_value('question') ?></textarea>
                        </div>
                        
                        <div class="mb-3">
                            <label for="answer" class="form-label">Jawaban <span class="text-danger">*</span></label>
                            <textarea class="form-control" id="answer" name="answer" rows="5" 
                                      placeholder="Masukkan jawaban yang jelas dan informatif..." required><?= set_value('answer') ?></textarea>
                        </div>
                        
                        <div class="mb-3">
                            <label for="display_order" class="form-label">Urutan Tampil <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" id="display_order" name="display_order" 
                                   value="<?= set_value('display_order', '1') ?>" min="1" required>
                            <div class="form-text">
                                Urutan tampil FAQ di halaman website. Angka yang lebih kecil akan tampil lebih dulu.
                            </div>
                        </div>
                        
                        <div class="alert alert-info">
                            <h6><i class="fas fa-info-circle"></i> Tips Membuat FAQ yang Baik:</h6>
                            <ul class="mb-0">
                                <li>Gunakan bahasa yang mudah dipahami</li>
                                <li>Jawaban harus jelas dan informatif</li>
                                <li>Pertanyaan sebaiknya yang benar-benar sering ditanyakan</li>
                                <li>Atur urutan tampil berdasarkan prioritas atau tingkat kepentingan</li>
                            </ul>
                        </div>
                        
                        <div class="d-flex justify-content-between">
                            <a href="<?= base_url('admin-gttgn/dashboard/faq') ?>" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> Kembali
                            </a>
                            <button type="submit" class="btn btn-success">
                                <i class="fas fa-save"></i> Simpan FAQ
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
