<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <?php if (validation_errors()): ?>
                <div class="alert alert-danger">
                    <?= validation_errors() ?>
                </div>
            <?php endif; ?>
            
            <form action="<?= base_url('admin-gttgn/hotel/edit_process/' . $hotel->id) ?>" method="post" enctype="multipart/form-data">
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
                    <label for="image_file" class="form-label">Upload Gambar Hotel</label>
                    <input type="file" class="form-control <?= form_error('image_file') ? 'is-invalid' : '' ?>" 
                            id="image_file" name="image_file" accept="image/*" onchange="previewImage(this)">
                    <div class="form-text">Upload gambar baru (JPG, PNG, GIF). Biarkan kosong jika tidak ingin mengubah gambar.</div>
                    <?php if (form_error('image_file')): ?>
                        <div class="invalid-feedback"><?= form_error('image_file') ?></div>
                    <?php endif; ?>
                    
                    <!-- Current image display -->
                    <?php if (!empty($hotel->image)): ?>
                    <div class="mt-2">
                        <label class="form-label">Gambar Saat Ini:</label>
                        <div>
                            <img src="<?= base_url($hotel->image) ?>" 
                                 alt="Current Image" class="img-thumbnail" style="max-width: 300px; max-height: 200px;">
                            <p class="text-muted small mt-1">File: <?= basename($hotel->image) ?></p>
                        </div>
                    </div>
                    <?php endif; ?>
                    
                    <!-- Image preview -->
                    <div class="mt-2" id="image_preview" style="display: none;">
                        <label class="form-label">Preview Gambar Baru:</label>
                        <div>
                            <img id="preview_img" src="" alt="Preview" class="img-thumbnail" style="max-width: 300px; max-height: 200px;">
                        </div>
                    </div>
                    
                    <!-- Hidden field to store current image path -->
                    <input type="hidden" name="current_image" value="<?= $hotel->image ?>">
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
                    <a href="<?= base_url('admin-gttgn/hotel') ?>" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                    <button type="submit" class="btn btn-warning">
                        <i class="fas fa-save"></i> Update Hotel
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function previewImage(input) {
    const preview = document.getElementById('image_preview');
    const previewImg = document.getElementById('preview_img');
    
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        
        reader.onload = function(e) {
            previewImg.src = e.target.result;
            preview.style.display = 'block';
        };
        
        reader.readAsDataURL(input.files[0]);
    } else {
        preview.style.display = 'none';
    }
}
</script>
