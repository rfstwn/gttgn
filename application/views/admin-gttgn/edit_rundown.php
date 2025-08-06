<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-warning text-dark">
                    <h5 class="mb-0">Edit Jadwal Kegiatan: <?= htmlspecialchars($rundown->event_title) ?></h5>
                </div>
                <div class="card-body">
                    <?php if (validation_errors()): ?>
                        <div class="alert alert-danger">
                            <?= validation_errors() ?>
                        </div>
                    <?php endif; ?>
                    
                    <form method="post" action="<?= base_url('admin-gttgn/dashboard/update_rundown/' . $rundown->id) ?>">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="event_title" class="form-label">Judul Kegiatan <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="event_title" name="event_title" 
                                           value="<?= set_value('event_title', $rundown->event_title) ?>" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="event_date" class="form-label">Tanggal Kegiatan <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" id="event_date" name="event_date" 
                                           value="<?= set_value('event_date', $rundown->event_date) ?>" required>
                                </div>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="description" class="form-label">Deskripsi Kegiatan</label>
                            <textarea class="form-control" id="description" name="description" rows="4" 
                                      placeholder="Masukkan deskripsi detail kegiatan..."><?= set_value('description', $rundown->description) ?></textarea>
                            <div class="form-text">
                                Deskripsi ini akan membantu peserta memahami detail kegiatan yang akan dilaksanakan.
                            </div>
                        </div>
                        
                        <div class="d-flex justify-content-between">
                            <a href="<?= base_url('admin-gttgn/dashboard/rundown') ?>" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> Kembali
                            </a>
                            <button type="submit" class="btn btn-warning">
                                <i class="fas fa-save"></i> Update Jadwal
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            
            <!-- Current Schedule Info -->
            <div class="card mt-4">
                <div class="card-header bg-info text-white">
                    <h5 class="mb-0">Informasi Jadwal Saat Ini</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h6><i class="fas fa-calendar-alt text-primary"></i> Detail Kegiatan</h6>
                            <p><strong>Judul:</strong> <?= htmlspecialchars($rundown->event_title) ?></p>
                            <p><strong>Tanggal:</strong> <?= date('d F Y', strtotime($rundown->event_date)) ?></p>
                        </div>
                        <div class="col-md-6">
                            <h6><i class="fas fa-info-circle text-primary"></i> Deskripsi</h6>
                            <p><?= !empty($rundown->description) ? htmlspecialchars($rundown->description) : '<em>Tidak ada deskripsi</em>' ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
