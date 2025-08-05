<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-warning d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Edit Transportasi</h5>
                </div>
                
                <div class="card-body">
                    <form action="<?= base_url('4dm1n/dashboard/update_transportation/' . $transportation['id']) ?>" method="post">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Nama Transportasi <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control <?= form_error('name') ? 'is-invalid' : '' ?>" 
                                           id="name" name="name" value="<?= set_value('name', $transportation['name']) ?>" placeholder="Contoh: Pribadi, Bus, Kereta">
                                    <?php if (form_error('name')): ?>
                                        <div class="invalid-feedback"><?= form_error('name') ?></div>
                                    <?php endif; ?>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="icon" class="form-label">Icon FontAwesome <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control <?= form_error('icon') ? 'is-invalid' : '' ?>" 
                                           id="icon" name="icon" value="<?= set_value('icon', $transportation['icon']) ?>" placeholder="Contoh: fa-solid fa-car fa-2xl">
                                    <div class="form-text">Gunakan class FontAwesome. Contoh: fa-solid fa-car fa-2xl</div>
                                    <?php if (form_error('icon')): ?>
                                        <div class="invalid-feedback"><?= form_error('icon') ?></div>
                                    <?php endif; ?>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="image" class="form-label">Nama File Gambar <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control <?= form_error('image') ? 'is-invalid' : '' ?>" 
                                           id="image" name="image" value="<?= set_value('image', $transportation['image']) ?>" placeholder="Contoh: rute-pribadi.png">
                                    <div class="form-text">Nama file gambar (tanpa path). File harus ada di folder assets/image/</div>
                                    <?php if (form_error('image')): ?>
                                        <div class="invalid-feedback"><?= form_error('image') ?></div>
                                    <?php endif; ?>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="description_1" class="form-label">Deskripsi Pertama <span class="text-danger">*</span></label>
                                    <textarea class="form-control <?= form_error('description_1') ? 'is-invalid' : '' ?>" 
                                              id="description_1" name="description_1" rows="4" placeholder="Deskripsi utama transportasi"><?= set_value('description_1', $transportation['description_1']) ?></textarea>
                                    <?php if (form_error('description_1')): ?>
                                        <div class="invalid-feedback"><?= form_error('description_1') ?></div>
                                    <?php endif; ?>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="description_2" class="form-label">Deskripsi Kedua</label>
                                    <textarea class="form-control <?= form_error('description_2') ? 'is-invalid' : '' ?>" 
                                              id="description_2" name="description_2" rows="3" placeholder="Deskripsi tambahan (opsional)"><?= set_value('description_2', $transportation['description_2']) ?></textarea>
                                    <?php if (form_error('description_2')): ?>
                                        <div class="invalid-feedback"><?= form_error('description_2') ?></div>
                                    <?php endif; ?>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="schedule_note" class="form-label">Catatan Jadwal</label>
                                    <textarea class="form-control <?= form_error('schedule_note') ? 'is-invalid' : '' ?>" 
                                              id="schedule_note" name="schedule_note" rows="2" placeholder="Catatan tentang jadwal atau informasi tambahan (opsional)"><?= set_value('schedule_note', $transportation['schedule_note']) ?></textarea>
                                    <div class="form-text">Mendukung HTML sederhana seperti &lt;a&gt;, &lt;small&gt;, dll.</div>
                                    <?php if (form_error('schedule_note')): ?>
                                        <div class="invalid-feedback"><?= form_error('schedule_note') ?></div>
                                    <?php endif; ?>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="order_position" class="form-label">Urutan Tampil <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control <?= form_error('order_position') ? 'is-invalid' : '' ?>" 
                                           id="order_position" name="order_position" value="<?= set_value('order_position', $transportation['order_position']) ?>" min="1">
                                    <div class="form-text">Urutan tampil di halaman (angka kecil akan tampil lebih dulu)</div>
                                    <?php if (form_error('order_position')): ?>
                                        <div class="invalid-feedback"><?= form_error('order_position') ?></div>
                                    <?php endif; ?>
                                </div>
                                
                                <div class="d-flex justify-content-between">
                                    <a href="<?= base_url('admin/informasi') ?>" class="btn btn-secondary">
                                        <i class="fas fa-arrow-left"></i> Kembali
                                    </a>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save"></i> Update Transportasi
                                    </button>
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="mb-0">Preview</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="text-center mb-3">
                                            <div class="mb-2">
                                                <i class="<?= htmlspecialchars($transportation['icon']) ?>"></i>
                                            </div>
                                            <h6><?= htmlspecialchars($transportation['name']) ?></h6>
                                        </div>
                                        
                                        <div class="mb-3">
                                            <img src="<?= base_url('assets/image/' . $transportation['image']) ?>" 
                                                 alt="<?= htmlspecialchars($transportation['name']) ?>" 
                                                 class="img-fluid rounded">
                                        </div>
                                        
                                        <p class="small"><?= htmlspecialchars($transportation['description_1']) ?></p>
                                        
                                        <?php if (!empty($transportation['description_2'])): ?>
                                            <p class="small"><?= htmlspecialchars($transportation['description_2']) ?></p>
                                        <?php endif; ?>
                                        
                                        <?php if (!empty($transportation['schedule_note'])): ?>
                                            <div class="small text-muted">
                                                <?= $transportation['schedule_note'] ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                
                                <div class="card mt-3">
                                    <div class="card-header">
                                        <h5 class="mb-0">Status</h5>
                                    </div>
                                    <div class="card-body">
                                        <p class="mb-1">
                                            <strong>Status:</strong> 
                                            <?php if ($transportation['is_active']): ?>
                                                <span class="badge bg-success">Aktif</span>
                                            <?php else: ?>
                                                <span class="badge bg-danger">Nonaktif</span>
                                            <?php endif; ?>
                                        </p>
                                        <p class="mb-1">
                                            <strong>Urutan:</strong> <?= $transportation['order_position'] ?>
                                        </p>
                                        <p class="mb-0">
                                            <strong>Dibuat:</strong> <?= date('d/m/Y H:i', strtotime($transportation['created_at'])) ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
