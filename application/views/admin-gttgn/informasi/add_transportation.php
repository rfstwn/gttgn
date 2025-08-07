<div class="container-fluid">
    <div class="card">
        
        <div class="card-body">
            <form action="<?= base_url('admin-gttgn/informasi/add_transportation_process') ?>" method="post">
                <div class="row">
                    <div class="col-md-8">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Transportasi <span class="text-danger">*</span></label>
                            <input type="text" class="form-control <?= form_error('name') ? 'is-invalid' : '' ?>" 
                                    id="name" name="name" value="<?= set_value('name') ?>" placeholder="Contoh: Pribadi, Bus, Kereta">
                            <?php if (form_error('name')): ?>
                                <div class="invalid-feedback"><?= form_error('name') ?></div>
                            <?php endif; ?>
                        </div>
                        
                        <div class="mb-3">
                            <label for="icon" class="form-label">Icon FontAwesome <span class="text-danger">*</span></label>
                            <input type="text" class="form-control <?= form_error('icon') ? 'is-invalid' : '' ?>" 
                                    id="icon" name="icon" value="<?= set_value('icon') ?>" placeholder="Contoh: fa-car">
                            <div class="form-text">Gunakan class FontAwesome. Contoh: fa-car</div>
                            <?php if (form_error('icon')): ?>
                                <div class="invalid-feedback"><?= form_error('icon') ?></div>
                            <?php endif; ?>
                        </div>
                        
                        <div class="mb-3">
                            <label for="image" class="form-label">Nama File Gambar <span class="text-danger">*</span></label>
                            <input type="text" class="form-control <?= form_error('image') ? 'is-invalid' : '' ?>" 
                                    id="image" name="image" value="<?= set_value('image') ?>" placeholder="Contoh: rute-pribadi.png">
                            <div class="form-text">Nama file gambar (tanpa path). File harus ada di folder assets/image/</div>
                            <?php if (form_error('image')): ?>
                                <div class="invalid-feedback"><?= form_error('image') ?></div>
                            <?php endif; ?>
                        </div>
                        
                        <div class="mb-3">
                            <label for="description_1" class="form-label">Deskripsi Pertama <span class="text-danger">*</span></label>
                            <textarea class="form-control <?= form_error('description_1') ? 'is-invalid' : '' ?>" 
                                        id="description_1" name="description_1" rows="4" placeholder="Deskripsi utama transportasi"><?= set_value('description_1') ?></textarea>
                            <?php if (form_error('description_1')): ?>
                                <div class="invalid-feedback"><?= form_error('description_1') ?></div>
                            <?php endif; ?>
                        </div>
                        
                        <div class="mb-3">
                            <label for="description_2" class="form-label">Deskripsi Kedua</label>
                            <textarea class="form-control <?= form_error('description_2') ? 'is-invalid' : '' ?>" 
                                        id="description_2" name="description_2" rows="3" placeholder="Deskripsi tambahan (opsional)"><?= set_value('description_2') ?></textarea>
                            <?php if (form_error('description_2')): ?>
                                <div class="invalid-feedback"><?= form_error('description_2') ?></div>
                            <?php endif; ?>
                        </div>
                        
                        <div class="mb-3">
                            <label for="schedule_note" class="form-label">Catatan Jadwal</label>
                            <textarea class="form-control <?= form_error('schedule_note') ? 'is-invalid' : '' ?>" 
                                        id="schedule_note" name="schedule_note" rows="2" placeholder="Catatan tentang jadwal atau informasi tambahan (opsional)"><?= set_value('schedule_note') ?></textarea>
                            <div class="form-text">Mendukung HTML sederhana seperti &lt;a&gt;, &lt;small&gt;, dll.</div>
                            <?php if (form_error('schedule_note')): ?>
                                <div class="invalid-feedback"><?= form_error('schedule_note') ?></div>
                            <?php endif; ?>
                        </div>
                        
                        <div class="mb-3">
                            <label for="order_position" class="form-label">Urutan Tampil <span class="text-danger">*</span></label>
                            <input type="number" class="form-control <?= form_error('order_position') ? 'is-invalid' : '' ?>" 
                                    id="order_position" name="order_position" value="<?= set_value('order_position', '1') ?>" min="1">
                            <div class="form-text">Urutan tampil di halaman (angka kecil akan tampil lebih dulu)</div>
                            <?php if (form_error('order_position')): ?>
                                <div class="invalid-feedback"><?= form_error('order_position') ?></div>
                            <?php endif; ?>
                        </div>
                        
                        <div class="d-flex justify-content-between">
                            <a href="<?= base_url('admin-gttgn/informasi') ?>" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> Kembali
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Simpan Transportasi
                            </button>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0">Panduan</h5>
                            </div>
                            <div class="card-body">
                                <h6>Icon FontAwesome:</h6>
                                <ul class="small list-unstyled">
                                    <li>- <code>fa-car</code> - Mobil</li>
                                    <li>- <code>fa-bus</code> - Bus</li>
                                    <li>- <code>fa-train</code> - Kereta</li>
                                    <li>- <code>fa-plane</code> - Pesawat</li>
                                    <li>- <code>fa-ship</code> - Kapal</li>
                                    <li>or visit : <a href="https://fontawesome.com/v6/search?ic=free&o=r" target="_blank">Icon List</a></li>
                                </ul>
                                
                                
                                <h6 class="mt-3">Format Gambar:</h6>
                                <ul class="small list-unstyled">
                                    <li>- Format: JPG, PNG, WebP</li>
                                    <li>- Ukuran optimal: 400x300px</li>
                                </ul>
                                
                                <h6 class="mt-3">Catatan:</h6>
                                <p class="small text-muted">
                                    Transportasi yang ditambahkan akan langsung aktif dan tampil di halaman informasi.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
