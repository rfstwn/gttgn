<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-warning text-dark">
                    <h5 class="mb-0">Edit FAQ</h5>
                </div>
                <div class="card-body">
                    <?php if (validation_errors()): ?>
                        <div class="alert alert-danger">
                            <?= validation_errors() ?>
                        </div>
                    <?php endif; ?>
                    
                    <form method="post" action="<?= base_url('4dm1n/dashboard/update_faq/' . $faq->id) ?>">
                        <div class="mb-3">
                            <label for="question" class="form-label">Pertanyaan <span class="text-danger">*</span></label>
                            <textarea class="form-control" id="question" name="question" rows="3" 
                                      placeholder="Masukkan pertanyaan yang sering ditanyakan..." required><?= set_value('question', $faq->question) ?></textarea>
                        </div>
                        
                        <div class="mb-3">
                            <label for="answer" class="form-label">Jawaban <span class="text-danger">*</span></label>
                            <textarea class="form-control" id="answer" name="answer" rows="5" 
                                      placeholder="Masukkan jawaban yang jelas dan informatif..." required><?= set_value('answer', $faq->answer) ?></textarea>
                        </div>
                        
                        <div class="mb-3">
                            <label for="display_order" class="form-label">Urutan Tampil <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" id="display_order" name="display_order" 
                                   value="<?= set_value('display_order', $faq->display_order) ?>" min="1" required>
                            <div class="form-text">
                                Urutan tampil FAQ di halaman website. Angka yang lebih kecil akan tampil lebih dulu.
                            </div>
                        </div>
                        
                        <div class="d-flex justify-content-between">
                            <a href="<?= base_url('4dm1n/dashboard/faq') ?>" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> Kembali
                            </a>
                            <button type="submit" class="btn btn-warning">
                                <i class="fas fa-save"></i> Update FAQ
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            
            <!-- Current FAQ Info -->
            <div class="card mt-4">
                <div class="card-header bg-info text-white">
                    <h5 class="mb-0">Informasi FAQ Saat Ini</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h6><i class="fas fa-question-circle text-primary"></i> Pertanyaan</h6>
                            <p><?= htmlspecialchars($faq->question) ?></p>
                            
                            <h6><i class="fas fa-lightbulb text-primary"></i> Jawaban</h6>
                            <p><?= nl2br(htmlspecialchars($faq->answer)) ?></p>
                            
                            <h6><i class="fas fa-sort-numeric-up text-primary"></i> Urutan Tampil</h6>
                            <p><?= $faq->display_order ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
