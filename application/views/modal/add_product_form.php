<!-- Add Product Modal -->
<div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addProductModalLabel">Tambah Produk</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('user/add_product') ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="tenant_id" class="form-label">Pilih Tenant <span class="text-danger">*</span></label>
                            <select class="form-select" id="tenant_id" name="tenant_id" required>
                                <option value="">-- Pilih Tenant --</option>
                                <?php if(!empty($tenants)): ?>
                                    <?php foreach($tenants as $tenant): ?>
                                        <option value="<?= $tenant->id ?>"><?= htmlspecialchars($tenant->nama_tenant) ?></option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="name" class="form-label">Nama Produk <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="description" class="form-label">Deskripsi Produk</label>
                        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                    </div>
                    
                    <div class="mb-3">
                        <label for="video" class="form-label">Video URL (YouTube/Vimeo)</label>
                        <input type="url" class="form-control" id="video" name="video" placeholder="https://www.youtube.com/watch?v=...">
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="image_1" class="form-label">Gambar Utama <span class="text-danger">*</span></label>
                            <input type="file" class="form-control" id="image_1" name="image_1" accept="image/*" required>
                            <div class="form-text">Format: JPG, PNG, GIF. Max: 2MB</div>
                            <div id="preview_1" class="mt-2"></div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="image_2" class="form-label">Gambar 2</label>
                            <input type="file" class="form-control" id="image_2" name="image_2" accept="image/*">
                            <div id="preview_2" class="mt-2"></div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="image_3" class="form-label">Gambar 3</label>
                            <input type="file" class="form-control" id="image_3" name="image_3" accept="image/*">
                            <div id="preview_3" class="mt-2"></div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="image_4" class="form-label">Gambar 4</label>
                            <input type="file" class="form-control" id="image_4" name="image_4" accept="image/*">
                            <div id="preview_4" class="mt-2"></div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="image_5" class="form-label">Gambar 5</label>
                            <input type="file" class="form-control" id="image_5" name="image_5" accept="image/*">
                            <div id="preview_5" class="mt-2"></div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="katalog" class="form-label">Katalog (PDF/DOC)</label>
                            <input type="file" class="form-control" id="katalog" name="katalog" accept=".pdf,.doc,.docx">
                            <div class="form-text">Format: PDF, DOC, DOCX. Max: 2MB</div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-info">Tambah Produk</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
// Image preview functionality
for (let i = 1; i <= 5; i++) {
    document.getElementById('image_' + i).addEventListener('change', function(e) {
        const file = e.target.files[0];
        const preview = document.getElementById('preview_' + i);
        
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.innerHTML = '<img src="' + e.target.result + '" class="img-thumbnail" style="max-width: 100px; max-height: 100px;">';
            };
            reader.readAsDataURL(file);
        } else {
            preview.innerHTML = '';
        }
    });
}
</script>
