<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-success text-white">
                    <h5 class="mb-0">Tambah Jadwal Kegiatan</h5>
                </div>
                <div class="card-body">
                    <?php if (validation_errors()): ?>
                        <div class="alert alert-danger">
                            <?= validation_errors() ?>
                        </div>
                    <?php endif; ?>
                    
                    <form method="post" action="<?= base_url('4dm1n/dashboard/save_rundown') ?>">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="event_title" class="form-label">Judul Kegiatan <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="event_title" name="event_title" 
                                           value="<?= set_value('event_title') ?>" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="event_date" class="form-label">Tanggal Kegiatan <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" id="event_date" name="event_date" 
                                           value="<?= set_value('event_date') ?>" required>
                                </div>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="description" class="form-label">Deskripsi Kegiatan</label>
                            <textarea class="form-control" id="description" name="description" rows="4" 
                                      placeholder="Masukkan deskripsi detail kegiatan..."><?= set_value('description') ?></textarea>
                            <div class="form-text">
                                Deskripsi ini akan membantu peserta memahami detail kegiatan yang akan dilaksanakan.
                            </div>
                        </div>
                        
                        <div class="d-flex justify-content-between">
                            <a href="<?= base_url('4dm1n/dashboard/rundown') ?>" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> Kembali
                            </a>
                            <button type="submit" class="btn btn-success">
                                <i class="fas fa-save"></i> Simpan Jadwal
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
