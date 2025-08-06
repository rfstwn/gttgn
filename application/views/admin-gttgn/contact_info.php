<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Kelola Informasi Kontak</h5>
                </div>
                <div class="card-body">
                    
                    
                    <?php if (validation_errors()): ?>
                        <div class="alert alert-danger">
                            <?= validation_errors() ?>
                        </div>
                    <?php endif; ?>
                    
                    <form method="post" action="<?= base_url('admin-gttgn/dashboard/update_contact_info') ?>">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="website_name" class="form-label">Nama Website</label>
                                    <input type="text" class="form-control" id="website_name" name="website_name" 
                                           value="<?= set_value('website_name', $contact_info->website_name) ?>" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" 
                                           value="<?= set_value('email', $contact_info->email) ?>" required>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="phone" class="form-label">Telepon</label>
                                    <input type="text" class="form-control" id="phone" name="phone" 
                                           value="<?= set_value('phone', $contact_info->phone) ?>" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="fax" class="form-label">Fax</label>
                                    <input type="text" class="form-control" id="fax" name="fax" 
                                           value="<?= set_value('fax', $contact_info->fax) ?>">
                                </div>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="address" class="form-label">Alamat</label>
                            <textarea class="form-control" id="address" name="address" rows="3" required><?= set_value('address', $contact_info->address) ?></textarea>
                        </div>
                        
                        <div class="mb-3">
                            <label for="website" class="form-label">Website URL</label>
                            <input type="url" class="form-control" id="website" name="website" 
                                   value="<?= set_value('website', $contact_info->website) ?>" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="maps_embed" class="form-label">Embed Google Maps</label>
                            <textarea class="form-control" id="maps_embed" name="maps_embed" rows="4" 
                                      placeholder="Masukkan kode embed Google Maps (iframe)..."><?= set_value('maps_embed', $contact_info->maps_embed) ?></textarea>
                            <div class="form-text">
                                Untuk mendapatkan kode embed: Buka Google Maps → Cari lokasi → Klik "Bagikan" → Pilih "Sematkan peta" → Salin kode HTML
                            </div>
                        </div>
                        
                        <div class="d-flex justify-content-between">
                            <a href="<?= base_url('admin-gttgn/dashboard') ?>" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> Kembali
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            
            <!-- Preview Section -->
            <div class="card mt-4">
                <div class="card-header bg-info text-white">
                    <h5 class="mb-0">Preview Informasi Kontak</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <h6><i class="fas fa-map-marker-alt text-primary"></i> Alamat</h6>
                            <p><?= $contact_info->address ?></p>
                        </div>
                        <div class="col-md-4">
                            <h6><i class="fas fa-phone text-primary"></i> Kontak</h6>
                            <p>
                                Telepon: <?= $contact_info->phone ?><br>
                                <?php if (!empty($contact_info->fax)): ?>
                                Fax: <?= $contact_info->fax ?>
                                <?php endif; ?>
                            </p>
                        </div>
                        <div class="col-md-4">
                            <h6><i class="fas fa-envelope text-primary"></i> Online</h6>
                            <p>
                                Email: <?= $contact_info->email ?><br>
                                Website: <a href="<?= $contact_info->website ?>" target="_blank"><?= $contact_info->website ?></a>
                            </p>
                        </div>
                    </div>
                    
                    <?php if (!empty($contact_info->maps_embed)): ?>
                    <div class="mt-3">
                        <h6><i class="fas fa-map text-primary"></i> Lokasi</h6>
                        <div class="maps-container">
                            <?= $contact_info->maps_embed ?>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.maps-container iframe {
    width: 100%;
    height: 300px;
    border: 0;
    border-radius: 8px;
}
</style>
