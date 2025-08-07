<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-warning text-dark">
                    <h5 class="mb-0">Edit Hotel: <?= htmlspecialchars($hotel->name) ?></h5>
                </div>
                <div class="card-body">
                    <?php if (validation_errors()): ?>
                        <div class="alert alert-danger">
                            <?= validation_errors() ?>
                        </div>
                    <?php endif; ?>
                    
                    <form method="post" action="<?= base_url('admin-gttgn/hotel/edit_process/' . $hotel->id) ?>">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Nama Hotel <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="name" name="name" 
                                           value="<?= set_value('name', $hotel->name) ?>" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="phone" class="form-label">Telepon <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="phone" name="phone" 
                                           value="<?= set_value('phone', $hotel->phone) ?>" required>
                                </div>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="address" class="form-label">Alamat <span class="text-danger">*</span></label>
                            <textarea class="form-control" id="address" name="address" rows="3" required><?= set_value('address', $hotel->address) ?></textarea>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="stars" class="form-label">Rating Bintang <span class="text-danger">*</span></label>
                                    <select class="form-control" id="stars" name="stars" required>
                                        <option value="">Pilih Rating</option>
                                        <option value="1" <?= set_select('stars', '1', $hotel->stars == 1) ?>>1 Bintang</option>
                                        <option value="2" <?= set_select('stars', '2', $hotel->stars == 2) ?>>2 Bintang</option>
                                        <option value="3" <?= set_select('stars', '3', $hotel->stars == 3) ?>>3 Bintang</option>
                                        <option value="4" <?= set_select('stars', '4', $hotel->stars == 4) ?>>4 Bintang</option>
                                        <option value="5" <?= set_select('stars', '5', $hotel->stars == 5) ?>>5 Bintang</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="latitude" class="form-label">Latitude <span class="text-danger">*</span></label>
                                    <input type="number" step="any" class="form-control" id="latitude" name="latitude" 
                                           value="<?= set_value('latitude', $hotel->latitude) ?>" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="longitude" class="form-label">Longitude <span class="text-danger">*</span></label>
                                    <input type="number" step="any" class="form-control" id="longitude" name="longitude" 
                                           value="<?= set_value('longitude', $hotel->longitude) ?>" required>
                                </div>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="image" class="form-label">Path Gambar</label>
                            <input type="text" class="form-control" id="image" name="image" 
                                   value="<?= set_value('image', $hotel->image) ?>" 
                                   placeholder="assets/image/hotel/hotel-name.jpg">
                            <div class="form-text">
                                Masukkan path gambar hotel. Jika kosong, akan menggunakan gambar default.
                            </div>
                        </div>
                        
                        <div class="alert alert-info">
                            <h6><i class="fas fa-info-circle"></i> Tips Mendapatkan Koordinat:</h6>
                            <ol class="mb-0">
                                <li>Buka Google Maps di browser</li>
                                <li>Cari lokasi hotel yang ingin ditambahkan</li>
                                <li>Klik kanan pada lokasi tersebut</li>
                                <li>Pilih koordinat yang muncul (format: -7.123456, 110.123456)</li>
                                <li>Salin angka pertama ke field Latitude dan angka kedua ke field Longitude</li>
                            </ol>
                        </div>
                        
                        <div class="d-flex justify-content-between">
                            <a href="<?= base_url('admin-gttgn/dashboard/hotels') ?>" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> Kembali
                            </a>
                            <button type="submit" class="btn btn-warning">
                                <i class="fas fa-save"></i> Update Hotel
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            
            <!-- Current Hotel Info -->
            <div class="card mt-4">
                <div class="card-header bg-info text-white">
                    <h5 class="mb-0">Informasi Hotel Saat Ini</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h6><i class="fas fa-hotel text-primary"></i> Detail Hotel</h6>
                            <p><strong>Nama:</strong> <?= htmlspecialchars($hotel->name) ?></p>
                            <p><strong>Alamat:</strong> <?= htmlspecialchars($hotel->address) ?></p>
                            <p><strong>Telepon:</strong> <?= htmlspecialchars($hotel->phone) ?></p>
                            <p><strong>Rating:</strong> 
                                <?php for ($i = 1; $i <= 5; $i++): ?>
                                    <i class="fas fa-star <?= $i <= $hotel->stars ? 'text-warning' : 'text-muted' ?>"></i>
                                <?php endfor; ?>
                                (<?= $hotel->stars ?> bintang)
                            </p>
                        </div>
                        <div class="col-md-6">
                            <h6><i class="fas fa-map-marker-alt text-primary"></i> Lokasi</h6>
                            <p><strong>Latitude:</strong> <?= $hotel->latitude ?></p>
                            <p><strong>Longitude:</strong> <?= $hotel->longitude ?></p>
                            <p><strong>Gambar:</strong> <?= $hotel->image ?></p>
                            <a href="https://www.google.com/maps/dir/?api=1&destination=<?= $hotel->latitude ?>,<?= $hotel->longitude ?>" 
                               class="btn btn-sm btn-outline-primary" target="_blank">
                                <i class="fas fa-external-link-alt"></i> Lihat di Google Maps
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
